<?php

declare(strict_types = 1);

namespace Nayleen;

use PhpCsFixer\Config;
use PhpCsFixer\Finder;
use ReflectionObject;

// https://mlocati.github.io/php-cs-fixer-configurator/#version:2.18.2|configurator
final class CodeStandard extends Config
{
    /**
     * @var array<string, bool|array<string, mixed>>
     */
    private array $rules = [
        '@PSR12' => true,
        'blank_line_before_statement' => [
            'statements' => [
                'return',
            ],
        ],
        'cast_spaces' => [
            'space' => 'single',
        ],
        'concat_space' => [
            'spacing' => 'one',
        ],
        'constant_case' => [
            'case' => 'lower',
        ],
        'declare_equal_normalize' => [
            'space' => 'single',
        ],
        'declare_strict_types' => true,
        'function_to_constant' => true,
        'multiline_whitespace_before_semicolons' => [
            'strategy' => 'no_multi_line',
        ],
        'no_extra_blank_lines' => true,
        'no_unused_imports' => true,
        'ordered_class_elements' => [
            'order' => [
                'use_trait',
                'property_private',
                'property_protected',
                'property_public',
                'constant_private',
                'constant_protected',
                'constant_public',
                'construct',
                'destruct',
                'method_public_static',
                'phpunit',
                'method_private',
                'method_protected',
                'method_public',
                'magic',
            ],
            'sort_algorithm' => 'alpha',
        ],
        'ordered_imports' => [
            'imports_order' => [
                'class',
                'function',
                'const',
            ],
            'sort_algorithm' => 'alpha',
        ],
        'php_unit_test_case_static_method_calls' => [
            'call_type' => 'self',
        ],
        'php_unit_method_casing' => [
            'case' => 'snake_case',
        ],
        'phpdoc_line_span' => [
            'const' => 'multi',
            'method' => 'multi',
            'property' => 'multi',
        ],
        'phpdoc_no_empty_return' => false,
        'single_line_comment_style' => [
            'comment_types' => [
                'hash',
            ],
        ],
        'trailing_comma_in_multiline' => [
            'elements' => [
                'arrays',
                'arguments',
                'parameters',
                'match',
            ],
        ],
    ];

    public function __construct(string $name = 'default')
    {
        parent::__construct($name);

        $this->applyDefaults();
    }

    private function applyDefaults(): void
    {
        $this
            ->setFinder($this->createFinder())
            ->setRiskyAllowed(true)
            ->setUsingCache(false)
            ->setRules($this->rules);
    }

    private function createFinder(): Finder
    {
        return Finder::create()
            ->files()
            ->in($this->getProjectDir())
            ->ignoreDotFiles(true)
            ->ignoreUnreadableDirs(true)
            ->ignoreVCS(true);
    }

    private function getProjectDir(): string
    {
        $directory = dirname((new ReflectionObject($this))->getFileName());

        while (!is_file($directory . '/composer.json')) {
            $directory = dirname($directory);
        }

        return $directory;
    }
}
