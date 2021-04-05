<?php

declare(strict_types = 1);

namespace Bakabot;

use PHPUnit\Framework\TestCase;

class CodeStandardTest extends TestCase
{
    /** @test */
    public function provides_correct_defaults(): void
    {
        $codestandard = new CodeStandard();

        self::assertTrue($codestandard->getRiskyAllowed());
        self::assertFalse($codestandard->getUsingCache());

        $rules = $codestandard->getRules();
        self::assertArrayHasKey('@PSR12', $rules);
    }
}
