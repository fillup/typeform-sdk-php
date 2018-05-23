<?php return [
    'baseUrl' => 'https://api.typeform.com',
    'operations' => [
        'Create' => [
            'httpMethod' => 'POST',
            'uri' => '/forms',
            'responseModel' => 'Result',
            'parameters' => [
                'title' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'settings' => [
                    'required' => false,
                    'type' => 'array',
                    'location' => 'json',
                ],
                'theme' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'workspace' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'hidden' => [
                    'required' => false,
                    'type' => 'array',
                    'location' => 'json',
                ],
                'variables' => [
                    'required' => false,
                    'type' => 'array',
                    'location' => 'json',
                ],
                'welcome_screens' => [
                    'required' => false,
                    'type' => 'array',
                    'location' => 'json',
                ],
                'thankyou_screens' => [
                    'required' => false,
                    'type' => 'array',
                    'location' => 'json',
                ],
                'logic' => [
                    'required' => false,
                    'type' => 'array',
                    'location' => 'json',
                ],
                'fields' => [
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                ],

            ],
        ],
        'GetInternal' => [
            'httpMethod' => 'GET',
            'uri' => '/forms/{form_id}',
            'responseModel' => 'Result',
            'parameters' => [
                'form_id' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
            ],
        ],
        'CreateWebhook' => [
            'httpMethod' => 'PUT',
            'uri' => '/forms/{form_id}/webhooks/{tag}',
            'responseModel' => 'Result',
            'parameters' => [
                'form_id' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'tag' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'url' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'json',
                ],
                'enabled' => [
                    'required' => false,
                    'type'     => 'boolean',
                    'location' => 'json',
                    'default'  => true
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