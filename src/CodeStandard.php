<?php

declare(strict_types = 1);

namespace Nayleen;

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

/**
 * @see https://mlocati.github.io/php-cs-fixer-configurator/#version:3.38|configurator
 */
class CodeStandard extends Config
{
    /**
     * @var array<string, array<string, mixed>|bool>
     */
    private array $rules = [
        '@PSR12' => true,
        'align_multiline_comment' => true,
        'array_indentation' => true,
        'array_push' => true,
        'array_syntax' => true,
        'assign_null_coalescing_to_coalesce_equal' => true,
        'backtick_to_shell_exec' => true,
        'binary_operator_spaces' => [
            'default' => 'single_space',
        ],
        'blank_line_before_statement' => [
            'statements' => [
                'return',
            ],
        ],
        'blank_line_between_import_groups' => true,
        'braces_position' => [
            'allow_single_line_anonymous_functions' => true,
            'allow_single_line_empty_anonymous_classes' => true,
            'anonymous_classes_opening_brace' => 'same_line',
            'anonymous_functions_opening_brace' => 'same_line',
            'classes_opening_brace' => 'next_line_unless_newline_at_signature_end',
            'control_structures_opening_brace' => 'same_line',
            'functions_opening_brace' => 'next_line_unless_newline_at_signature_end',
        ],
        'cast_spaces' => [
            'space' => 'single',
        ],
        'class_attributes_separation' => true,
        'class_definition' => true,
        'class_reference_name_casing' => true,
        'clean_namespace' => true,
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'combine_nested_dirname' => true,
        'comment_to_phpdoc' => true,
        'compact_nullable_type_declaration' => true,
        'concat_space' => [
            'spacing' => 'one',
        ],
        'constant_case' => [
            'case' => 'lower',
        ],
        'control_structure_braces' => true,
        'control_structure_continuation_position' => [
            'position' => 'same_line',
        ],
        'date_time_create_from_format_call' => true,
        'date_time_immutable' => true,
        'declare_equal_normalize' => [
            'space' => 'single',
        ],
        'declare_parentheses' => true,
        'declare_strict_types' => true,
        'dir_constant' => true,
        'echo_tag_syntax' => [
            'format' => 'short',
        ],
        'empty_loop_body' => true,
        'empty_loop_condition' => true,
        'ereg_to_preg' => true,
        'error_suppression' => true,
        'escape_implicit_backslashes' => true,
        'explicit_indirect_variable' => true,
        'explicit_string_variable' => true,
        'final_internal_class' => false,
        'fopen_flag_order' => true,
        'fopen_flags' => true,
        'fully_qualified_strict_types' => true,
        'function_to_constant' => true,
        'general_phpdoc_tag_rename' => true,
        'get_class_to_class_keyword' => true,
        'global_namespace_import' => [
            'import_classes' => true,
            'import_constants' => false,
            'import_functions' => false,
        ],
        'heredoc_to_nowdoc' => true,
        'implode_call' => true,
        'include' => true,
        'integer_literal_case' => true,
        'is_null' => true,
        'lambda_not_used_import' => true,
        'linebreak_after_opening_tag' => true,
        'list_syntax' => true,
        'logical_operators' => true,
        'magic_constant_casing' => true,
        'magic_method_casing' => true,
        'method_chaining_indentation' => true,
        'modernize_strpos' => true,
        'modernize_types_casting' => true,
        'multiline_comment_opening_closing' => true,
        'multiline_whitespace_before_semicolons' => [
            'strategy' => 'no_multi_line',
        ],
        'native_function_casing' => true,
        'native_function_invocation' => [
            'include' => [],
        ],
        'native_type_declaration_casing' => true,
        'no_alias_functions' => true,
        'no_alias_language_construct_call' => true,
        'no_alternative_syntax' => true,
        'no_binary_string' => true,
        'no_blank_lines_after_phpdoc' => true,
        'no_empty_comment' => true,
        'no_empty_phpdoc' => true,
        'no_empty_statement' => true,
        'no_extra_blank_lines' => [
            'tokens' => [
                'attribute',
                'case',
                'continue',
                'curly_brace_block',
                'default',
                'extra',
                'parenthesis_brace_block',
                'square_brace_block',
                'switch',
                'throw',
                'use',
            ],
        ],
        'no_homoglyph_names' => true,
        'no_leading_namespace_whitespace' => true,
        'no_mixed_echo_print' => true,
        'no_multiline_whitespace_around_double_arrow' => true,
        'no_multiple_statements_per_line' => true,
        'no_php4_constructor' => true,
        'no_short_bool_cast' => true,
        'no_singleline_whitespace_before_semicolons' => true,
        'no_spaces_around_offset' => true,
        'no_superfluous_elseif' => true,
        'no_superfluous_phpdoc_tags' => [
            'allow_mixed' => true,
            'allow_unused_params' => true,
        ],
        'no_trailing_comma_in_singleline' => true,
        'no_trailing_whitespace_in_string' => true,
        'no_unneeded_control_parentheses' => true,
        'no_unneeded_final_method' => true,
        'no_unneeded_import_alias' => true,
        'no_unreachable_default_argument_value' => true,
        'no_unset_cast' => true,
        'no_unused_imports' => true,
        'no_useless_concat_operator' => true,
        'no_useless_else' => true,
        'no_useless_nullsafe_operator' => true,
        'no_useless_return' => true,
        'no_useless_sprintf' => true,
        'no_whitespace_before_comma_in_array' => true,
        'non_printable_character' => true,
        'normalize_index_brace' => true,
        'nullable_type_declaration' => [
            'syntax' => 'question_mark',
        ],
        'nullable_type_declaration_for_default_null_value' => true,
        'object_operator_without_whitespace' => true,
        'operator_linebreak' => true,
        'ordered_class_elements' => [
            'case_sensitive' => false,
            'order' => [
                'use_trait',
                'case',
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
            'case_sensitive' => false,
            'imports_order' => [
                'class',
                'function',
                'const',
            ],
            'sort_algorithm' => 'alpha',
        ],
        'ordered_interfaces' => [
            'case_sensitive' => false,
            'direction' => 'ascend',
            'order' => 'alpha',
        ],
        'ordered_traits' => [
            'case_sensitive' => false,
        ],
        'ordered_types' => [
            'null_adjustment' => 'always_last',
            'sort_algorithm' => 'alpha',
        ],
        'php_unit_construct' => true,
        'php_unit_dedicate_assert' => true,
        'php_unit_dedicate_assert_internal_type' => true,
        'php_unit_expectation' => true,
        'php_unit_internal_class' => true,
        'php_unit_method_casing' => [
            'case' => 'snake_case',
        ],
        'php_unit_mock' => true,
        'php_unit_mock_short_will_return' => true,
        'php_unit_namespaced' => true,
        'php_unit_no_expectation_annotation' => true,
        'php_unit_set_up_tear_down_visibility' => true,
        'php_unit_test_annotation' => [
            'style' => 'annotation',
        ],
        'php_unit_test_case_static_method_calls' => [
            'call_type' => 'self',
        ],
        'phpdoc_align' => [
            'align' => 'left',
        ],
        'phpdoc_annotation_without_dot' => true,
        'phpdoc_indent' => true,
        'phpdoc_inline_tag_normalizer' => true,
        'phpdoc_line_span' => [
            'const' => 'multi',
            'method' => 'multi',
            'property' => 'multi',
        ],
        'phpdoc_no_alias_tag' => true,
        'phpdoc_no_empty_return' => true,
        'phpdoc_no_package' => true,
        'phpdoc_no_useless_inheritdoc' => true,
        'phpdoc_order' => true,
        'phpdoc_param_order' => true,
        'phpdoc_return_self_reference' => true,
        'phpdoc_scalar' => true,
        'phpdoc_single_line_var_spacing' => true,
        'phpdoc_summary' => true,
        'phpdoc_tag_casing' => true,
        'phpdoc_to_comment' => false,
        'phpdoc_trim' => true,
        'phpdoc_types' => true,
        'phpdoc_types_order' => [
            'sort_algorithm' => 'alpha',
            'null_adjustment' => 'always_last',
        ],
        'phpdoc_var_annotation_correct_order' => true,
        'phpdoc_var_without_name' => true,
        'pow_to_exponentiation' => true,
        'psr_autoloading' => true,
        'random_api_migration' => true,
        'regular_callable_call' => true,
        'return_type_declaration' => [
            'space_before' => 'none',
        ],
        'self_accessor' => true,
        'self_static_accessor' => true,
        'semicolon_after_instruction' => true,
        'set_type_to_cast' => true,
        'simple_to_complex_string_variable' => true,
        'simplified_null_return' => true,
        'single_line_comment_spacing' => true,
        'single_line_comment_style' => [
            'comment_types' => [
                'hash',
            ],
        ],
        'single_line_empty_body' => true,
        'single_quote' => true,
        'single_space_around_construct' => true,
        'space_after_semicolon' => true,
        'standardize_increment' => true,
        'standardize_not_equals' => true,
        'statement_indentation' => true,
        'strict_comparison' => true,
        'strict_param' => true,
        'string_length_to_empty' => true,
        'string_line_ending' => true,
        'switch_continue_to_break' => true,
        'ternary_to_elvis_operator' => true,
        'ternary_to_null_coalescing' => true,
        'trailing_comma_in_multiline' => [
            'elements' => [
                'arrays',
                'arguments',
                'parameters',
                'match',
            ],
        ],
        'trim_array_spaces' => true,
        'type_declaration_spaces' => true,
        'types_spaces' => true,
        'unary_operator_spaces' => true,
        'use_arrow_functions' => true,
        'void_return' => true,
        'whitespace_after_comma_in_array' => true,
        'yoda_style' => [
            'equal' => false,
            'identical' => false,
            'less_and_greater' => false,
        ],
    ];

    public function __construct(string $basePath, string $name = 'Nayleen')
    {
        parent::__construct($name);

        $this->applyDefaults($basePath);
    }

    private function applyDefaults(string $basePath): void
    {
        $this
            ->setFinder($this->createFinder($basePath))
            ->setIndent(str_repeat(' ', 4))
            ->setRiskyAllowed(true)
            ->setRules($this->rules)
            ->setUsingCache(false);
    }

    private function createFinder(string $basePath): Finder
    {
        $projectDir = $this->getProjectDir($basePath);

        return Finder::create()
            ->files()
            ->name('*.php')
            ->in($projectDir)
            ->exclude('vendor')
            ->ignoreDotFiles(true)
            ->ignoreUnreadableDirs()
            ->ignoreVCS(true)
            ->ignoreVCSIgnored(true);
    }

    private function getProjectDir(string $basePath): string
    {
        $directory = is_file($basePath)
            ? dirname($basePath)
            : $basePath;

        while (!is_file($directory . '/composer.json')) {
            $directory = dirname($directory);
        }

        return $directory;
    }
}
