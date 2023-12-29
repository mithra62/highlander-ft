<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Highlander_ft_ft extends EE_Fieldtype
{
    public $info = [
        'name' => 'Highlander_ft',
        'version' => HIGHLANDER_FIELDTYPE_VERSION,
    ];

    /**
     * The available "types" of fields the FT will make available
     * @var array
     */
    protected array $field_types = [
        'input' => 'Input',
        'textarea' => 'Textarea',
        'password' => 'Password',
    ];

    /**
     * @var array|string[]
     */
    protected array $unique_to = [
        'all' => 'All',
        'Entry\'s Channel',
    ];

    public function install()
    {
        return [
            'display_field_type' => 'input',
            'field_max_length' => '128',
            'unique_to' => 'all',
        ];
    }

    public function display_global_settings()
    {
        $val = array_merge($this->settings, $_POST);

        $form = '';

        return $form;
    }

    public function save_global_settings()
    {
        return array_merge($this->settings, $_POST);
    }

    public function display_settings($data)
    {
        $selected = element('display_field_type', $data);
        $field_max_length = !empty($data['field_max_length']) ? $data['field_max_length'] : 128 ;
        $settings = [
            [
                'title' => 'display_type',
                'desc' => 'display_type_instructions',
                'fields' => [
                    'display_field_type' => [
                        'name' => 'display_field_type',
                        'type' => 'select',
                        'choices' => $this->field_types,
                        'value' => $selected,
                    ],
                ],
            ],
            [
                'title' => 'field_max_length',
                'fields' => [
                    'field_max_length' => [
                        'name' => 'field_max_length',
                        'type' => 'text',
                        'value' => $field_max_length,
                    ],
                ],
            ],
            [
                'title' => 'unique_to',
                'fields' => [
                    'unique_to' => [
                        'name' => 'unique_to',
                        'type' => 'select',
                        'value' => $field_max_length,
                        'choices' => $this->unique_to,
                    ],
                ],
            ],
        ];

        return ['field_options_highlander_fieldtype' => [
            'label' => 'field_options',
            'group' => 'highlander_fieldtype',
            'settings' => $settings,
        ],
        ];
    }

    public function save_settings($data)
    {
        return [];
    }

    public function display_field($data)
    {
        return form_input([
            'name' => $this->field_name,
            'id' => $this->field_id,
            'value' => $data,
        ]);
    }

    public function replace_tag($data, $params = [], $tagdata = false)
    {
        return 'Magic!';
    }

    public function validate($data)
    {
        return "you failed";
    }
}
