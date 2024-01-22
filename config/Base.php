<?php

namespace Mygento\Symfony\Config;

use PhpCsFixer\Config;
use PhpCsFixer\ConfigInterface;

class Base extends Config
{
    /**
     * @var string
     */
    private $header;

    /**
     * @var array
     */
    private $customRules;

    /**
     * @param string $header
     */
    public function __construct($header = null, array $customRules = [])
    {
        parent::__construct('Mygento (Symfony)');
        $this->header = $header;
        $this->customRules = $customRules;
    }

    public function setFinder(iterable $finder): ConfigInterface
    {
        $finder->exclude('dev/tests/functional/generated')
            ->exclude('dev/tests/functional/var')
            ->exclude('dev/tests/functional/vendor')
            ->exclude('dev/tests/integration/tmp')
            ->exclude('dev/tests/integration/var')
            ->exclude('lib/internal/Cm')
            ->exclude('lib/internal/Credis')
            ->exclude('lib/internal/Less')
            ->exclude('lib/internal/LinLibertineFont')
            ->exclude('pub/media')
            ->exclude('pub/static')
            ->exclude('setup/vendor')
            ->exclude('var');

        return parent::setFinder($finder);
    }

    public function getRules(): array
    {
        $rules = [
            '@PSR12' => true,
            'array_syntax' => ['syntax' => 'short'],
            'concat_space' => ['spacing' => 'one'],
            'include' => true,
            'no_empty_statement' => true,
            'no_leading_import_slash' => true,
            'no_leading_namespace_whitespace' => true,
            'no_multiline_whitespace_around_double_arrow' => true,
            'multiline_whitespace_before_semicolons' => true,
            'no_singleline_whitespace_before_semicolons' => true,
            'no_trailing_comma_in_singleline' => true,
            'no_unused_imports' => true,
            'no_whitespace_in_blank_line' => true,
            'object_operator_without_whitespace' => true,
            'ordered_imports' => true,
            'standardize_not_equals' => true,
            'ternary_operator_spaces' => true,
            // mygento
            'phpdoc_order' => true,
            'phpdoc_types' => true,
            'phpdoc_add_missing_param_annotation' => true,
            'single_quote' => true,
            'ternary_to_null_coalescing' => true,
            'lowercase_cast' => true,
            'no_empty_comment' => true,
            'no_empty_phpdoc' => true,
            'return_type_declaration' => true,
            'no_useless_return' => true,
            // mygento 2
            'align_multiline_comment' => true,
            'array_indentation' => true,
            'binary_operator_spaces' => true,
            'blank_line_after_opening_tag' => true,
            'blank_line_before_statement' => ['statements' => ['return', 'throw', 'try']],
            'cast_spaces' => true,
            'class_attributes_separation' => ['elements' => ['const' => 'none', 'method' => 'one', 'property' => 'none', 'trait_import' => 'none']],
            'explicit_indirect_variable' => true,
            'explicit_string_variable' => true,
            'lowercase_static_reference' => true,
            'method_chaining_indentation' => true,
            'multiline_comment_opening_closing' => true,
            'native_function_casing' => true,
            'no_blank_lines_after_class_opening' => true,
            'no_blank_lines_after_phpdoc' => true,
            'no_extra_blank_lines' => [
                'tokens' => ['break', 'continue', 'curly_brace_block', 'extra', 'parenthesis_brace_block', 'return', 'square_brace_block', 'throw', 'use'],
            ],
            'no_short_bool_cast' => true,
            'no_spaces_around_offset' => true,
            'no_superfluous_elseif' => true,
            'no_useless_else' => true,
            'ordered_class_elements' => [
                'order' => ['use_trait', 'constant_public', 'constant_protected', 'constant_private', 'property_public', 'property_protected', 'property_private', 'construct', 'destruct', 'magic', 'phpunit', 'method_public', 'method_protected', 'method_private'],
            ],
            'phpdoc_align' => ['align' => 'left'],
            'phpdoc_indent' => true,
            'phpdoc_return_self_reference' => true,
            'phpdoc_scalar' => true,
            'phpdoc_single_line_var_spacing' => true,
            'phpdoc_trim' => true,
            'phpdoc_types_order' => [
                'null_adjustment' => 'always_last',
            ],
            // 'phpdoc_var_without_name' => false,
            'return_assignment' => true,
            // 'single_line_comment_style' => false,
            'trailing_comma_in_multiline' => true,
            'trim_array_spaces' => true,
            'unary_operator_spaces' => true,
            'whitespace_after_comma_in_array' => true,
            // v7
            'type_declaration_spaces' => true,
            'new_with_parentheses' => true,
        ];

        if (null !== $this->header) {
            $rules['header_comment'] = [
                'header' => $this->header,
                'commentType' => 'PHPDoc',
            ];
        }

        if (!empty($this->customRules)) {
            $rules = array_replace($rules, $this->customRules);
        }

        return $rules;
    }
}
