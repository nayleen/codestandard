<?php

declare(strict_types = 1);

namespace Nayleen;

use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class CodeStandardTest extends TestCase
{
    /**
     * @test
     */
    public function provides_correct_defaults(): void
    {
        $codestandard = new CodeStandard(__DIR__);

        self::assertTrue($codestandard->getRiskyAllowed());
        self::assertFalse($codestandard->getUsingCache());

        $rules = $codestandard->getRules();
        self::assertArrayHasKey('@PhpCsFixer', $rules);
        self::assertArrayHasKey('@PSR12', $rules);
    }
}
