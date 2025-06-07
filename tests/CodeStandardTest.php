<?php

declare(strict_types = 1);

namespace Nayleen;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
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
    public function rules_are_based_on_psr_twelve(): void
    {
        self::assertArrayHasKey('@PSR12', $this->codeStandard->getRules());
    }
}
