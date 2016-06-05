<?php return [
    'baseUrl' => 'https://api.typeform.io',
    'apiVersion' => 'v0.4',
    'operations' => [
        'Info' => [
            'httpMethod' => 'GET',
            'uri' => '/{ApiVersion}/',
            'responseModel' => 'Result',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
            ],
        ],
    ],
    'models' => [
        'Result' => [
            'type' => 'object',
            'properties' => [
                'statusCode' => ['location' => 'statusCode'],
            ],
            'additionalProperties' => [
                'location' => 'json'
            ],
        ]
    ]

];