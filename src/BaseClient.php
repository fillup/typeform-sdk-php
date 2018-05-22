<?php
namespace Typeform;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;
use Typeform\middleware\MockSubscriber;

/**
 * Typeform.io API client implemented with Guzzle.
 * BaseClient class to implement common features
 */
class BaseClient extends GuzzleClient
{
    const ENV_PROD = 'prod';
    const ENV_MOCK = 'mock';

    const BASE_URL_PROD = 'https://api.typeform.com';

    public $env;

    /**
     * @param array $config
     * @param string $env
     * @throws \Exception
     */
    public function __construct(array $config = [], $env = self::ENV_PROD)
    {
        if ( ! in_array($env, [self::ENV_PROD, self::ENV_MOCK])) {
            throw new \Exception('Invalid environment', 1462566788);
        }

        $this->env = $env;


        // Apply some defaults.
        $config = array_merge_recursive($config, [
            'max_retries' => 3,
        ]);

        // If an override base url is not provided, determine proper baseurl from env
        if ( ! isset($config['description_override']['baseUrl'])) {
            $config = array_merge_recursive($config , [
                'description_override' => [
                    'baseUrl' => $this->getEnvBaseUrl($env),
                ],
            ]);
        }

        // Create the client.
        parent::__construct(
            $this->getHttpClientFromConfig($config),
            $this->getDescriptionFromConfig($config),
            $config
        );

        // Add auth header
        $this->applyCredentials($config);

        // Ensure that ApiVersion is set.
        $this->setConfig(
            'defaults/ApiVersion',
            $this->getDescription()->getApiVersion()
        );

    }

    /**
     * Get baseUrl for given environment
     * @param string $env
     * @return null|string
     */
    public function getEnvBaseUrl($env)
    {
        switch ($env) {
            case self::ENV_PROD:
                return self::BASE_URL_PROD;
            case self::ENV_MOCK:
                return null;
        }
    }

    private function getHttpClientFromConfig(array $config)
    {
        // If a client was provided, return it.
        if (isset($config['http_client'])) {
            return $config['http_client'];
        }

        // Create a Guzzle HttpClient.
        $clientOptions = isset($config['http_client_options'])
            ? $config['http_client_options']
            : [];
        $client = new HttpClient($clientOptions);

        // Attach request retry logic.
        $client->getEmitter()->attach(new RetrySubscriber([
            'max' => $config['max_retries'],
            'filter' => RetrySubscriber::createChainFilter([
                RetrySubscriber::createStatusFilter(),
                RetrySubscriber::createCurlFilter(),
            ]),
        ]));

        /*
         * If mock env, attach MockSubscriber
         */
        if($this->env === self::ENV_MOCK) {
            $client->getEmitter()->attach(new MockSubscriber());
        }

        return $client;
    }

    private function getDescriptionFromConfig(array $config)
    {
        // If a description was provided, return it.
        if (isset($config['description'])) {
            return $config['description'];
        }

        // Load service description data.
        $data = is_readable($config['description_path'])
            ? include $config['description_path']
            : null;

        // Override description from local config if set
        if(isset($config['description_override'])){
            $data = array_merge($data, $config['description_override']);
        }

        return new Description($data);
    }

    private function applyCredentials(array $config)
    {
        // Ensure that the credentials have been provided.
        if (!isset($config['apiToken'])) {
            throw new \InvalidArgumentException(
                'You must provide an API Token.'
            );
        }
        // Set credentials for authentication based on requirements.
        $this->getHttpClient()->setDefaultOption('headers', [
            'X-API-TOKEN' => $config['apiToken'],
        ]);
    }

}