<?php

use Mithra62\HighlanderFt\Services\Field;

const HIGHLANDER_FIELDTYPE_VERSION = '1.0.1';


return [
    'name' => 'Highlander FieldType',
    'description' => 'Ensures every value, across Entries, are unique.',
    'version' => HIGHLANDER_FIELDTYPE_VERSION,
    'author' => 'mithra62',
    'author_url' => 'https://mithra62.com/',
    'namespace' => 'Mithra62\HighlanderFt',
    'settings_exist' => false,
    'fieldtypes' => [
        'highlander_ft' => [
            'name' => 'Highlander',
            'compatibility' => 'text',
        ],
    ],
    'services' => [
        'Field' => function ($addon) {
            return new Field();
        },
    ],
];
