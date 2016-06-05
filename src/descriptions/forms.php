<?php return [
    'baseUrl' => 'https://api.typeform.io',
    'apiVersion' => 'v0.4',
    'operations' => [
        'Create' => [
            'httpMethod' => 'POST',
            'uri' => '/{ApiVersion}/forms',
            'responseModel' => 'Result',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'title' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'fields' => [
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                ],
                'tags' => [
                    'required' => false,
                    'type' => 'array',
                    'location' => 'json',
                ],
                'design_id' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'webhook_submit_url' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'url_ids' => [
                    'required' => false,
                    'type' => 'array',
                    'location' => 'json',
                ],
                'branding' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => ['true', 'false'],
                ],

            ],
        ],
        'Get' => [
            'httpMethod' => 'GET',
            'uri' => '/{ApiVersion}/forms/{form_id}',
            'responseModel' => 'Result',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'form_id' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
            ],
        ]
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