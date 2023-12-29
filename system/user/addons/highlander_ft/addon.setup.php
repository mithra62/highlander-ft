<?php

const HIGHLANDER_FIELDTYPE_VERSION = '1.0.0';


return [
    'name'              => 'highlander_ft',
    'description'       => 'highlander_ft description',
    'version'           => HIGHLANDER_FIELDTYPE_VERSION,
    'author'            => 'mithra62',
    'author_url'        => 'fdsa',
    'namespace'         => 'Mithra62\HighlanderFt',
    'settings_exist'    => false,
    'fieldtypes'        => [
        'highlander_ft' => [
            'name' => 'Highlander_ft',
            'compatibility' => 'text',
        ],
    ], 
];
