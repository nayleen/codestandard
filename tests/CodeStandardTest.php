<?php

declare(strict_types = 1);

namespace Nayleen;

use Composer\InstalledVersions;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use ReflectionProperty;

/**
 * @phpstan-type ComposerRootPackage array{name: string, pretty_version: string, version: string, reference: string|null, type: string, install_path: string, aliases: array<string>, dev: bool}
 * @phpstan-type ComposerInstalledVersion array{pretty_version?: string, version?: string, reference?: string|null, type?: string, install_path?: string, aliases?: array<string>, dev_requirement: bool, replaced?: array<string>, provided?: array<string>}
 * @phpstan-type ComposerInstalledVersions array{root: ComposerRootPackage, versions: array<string, ComposerInstalledVersion>}
 *
 * @internal
 */
final class CodeStandardTest extends TestCase
{
    private CodeStandard $codeStandard;

    protected function setUp(): void
    {
        $projectDirectory = dirname(__DIR__);
        assert($projectDirectory !== '' && is_dir($projectDirectory));

        $this->codeStandard = new CodeStandard(projectDirectory: $projectDirectory);
    }

    protected function tearDown(): void
    {
        $installedVersions = require dirname(__DIR__) . '/vendor/composer/installed.php';
        assert(is_array($installedVersions));

        /** @var ComposerInstalledVersions $installedVersions */
        InstalledVersions::reload($installedVersions);
        $this->setComposerCanGetVendors(null);
    }

    /**
     * @param array<string, ComposerInstalledVersion> $versions
     *
     * @return ComposerInstalledVersions
     */
    private function installedVersionsData(array $versions): array
    {
        return [
            'root' => [
                'name' => 'test/project',
                'pretty_version' => 'dev-main',
                'version' => 'dev-main',
                'reference' => null,
                'type' => 'library',
                'install_path' => dirname(__DIR__),
                'aliases' => [],
                'dev' => true,
            ],
            'versions' => $versions,
        ];
    }

    private function phpUnitTarget(): string
    {
        $projectDirectory = dirname(__DIR__);
        assert($projectDirectory !== '' && is_dir($projectDirectory));

        $rules = new CodeStandard(projectDirectory: $projectDirectory)->getRules();
        $rule = $rules['php_unit_test_case_static_method_calls'];
        assert(is_array($rule));
        assert(is_string($rule['target']));

        return $rule['target'];
    }

    private function reloadInstalledPhpUnitVersion(string $version): void
    {
        InstalledVersions::reload($this->installedVersionsData([
            'phpunit/phpunit' => [
                'pretty_version' => $version,
                'version' => $version,
                'dev_requirement' => true,
            ],
        ]));
        $this->setComposerCanGetVendors(false);
    }

    private function setComposerCanGetVendors(?bool $canGetVendors): void
    {
        $property = new ReflectionProperty(InstalledVersions::class, 'canGetVendors');
        $property->setValue(null, $canGetVendors);
    }

    #[Test]
    public function allows_risky_fixers(): void
    {
        self::assertTrue($this->codeStandard->getRiskyAllowed());
    }

    #[Test]
    public function config_is_named_correctly(): void
    {
        self::assertSame('Nayleen', $this->codeStandard->getName());
    }

    #[Test]
    public function indents_with_four_spaces(): void
    {
        self::assertSame('    ', $this->codeStandard->getIndent());
    }

    #[Test]
    public function phpunit_test_case_static_method_calls_target_defaults_to_newest_without_phpunit(): void
    {
        InstalledVersions::reload($this->installedVersionsData([]));
        $this->setComposerCanGetVendors(false);

        self::assertSame('newest', $this->phpUnitTarget());
    }

    #[Test]
    public function phpunit_test_case_static_method_calls_target_matches_installed_phpunit(): void
    {
        foreach ([
            '9.6.0.0' => '10.0',
            '10.5.0.0' => '10.0',
            '11.5.0.0' => '11.0',
            '12.0.0.0' => 'newest',
            '13.2.4.0' => 'newest',
            'dev-main' => 'newest',
        ] as $version => $target) {
            $this->reloadInstalledPhpUnitVersion($version);

            self::assertSame($target, $this->phpUnitTarget());
        }
    }

    #[Test]
    public function rules_are_based_on_psr_twelve(): void
    {
        self::assertArrayHasKey('@PSR12', $this->codeStandard->getRules());
    }
}
