<?php

declare(strict_types = 1);

namespace Nayleen;

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

    /**
     * @test
     */
    public function allows_risky_fixers(): void
    {
        self::assertTrue($this->codeStandard->getRiskyAllowed());
    }

    /**
     * @test
     */
    public function config_is_named_correctly(): void
    {
        self::assertSame('Nayleen', $this->codeStandard->getName());
    }

    /**
     * @test
     */
    public function indents_with_four_spaces(): void
    {
        self::assertSame('    ', $this->codeStandard->getIndent());
    }

    /**
     * @test
     */
    public function rules_are_based_on_psr_twelve(): void
    {
        self::assertArrayHasKey('@PSR12', $this->codeStandard->getRules());
    }
}
