<?php

return [
    'apiVersion' => '2.3.0',
    'serviceFullName' => 'Scalr Farms',
    'serviceAbbreviation' => '',
    'serviceType' => 'rest-xml',
    'timestampFormat' => 'rfc822',
    'namespace' => 'Zoop\Scalr\Farm',
    'operations' => [
        'GetFarms' => [
            'httpMethod' => 'GET',
            'uri' => '/?Action={Action}&',
            'responseClass' => 'GetFarmsOutput',
            'summary' => 'Gets all server farms',
            'parameters' => [
                'Action' => [
                    'location' => 'uri',
                    'type' => 'string',
                    'static' => true,
                    'default' => 'FarmList'
                ]
            ]
        ],
    ],
    "models" => [
        "GetFarmsOutput" => [
            "type" => "array",
            "items" => [
                "type" => "object",
                "properties" => [
                    "name" => [
                        "location" => "json",
                        "type" => "string"
                    ],
                    "age" => [
                        "location" => "json",
                        "type" => "integer"
                    ]
                ]
            ]
        ],
    ]
];