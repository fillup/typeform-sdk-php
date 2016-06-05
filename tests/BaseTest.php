<?php
namespace TypeformTests;

include __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Command\Exception\CommandClientException;
use Typeform\Base;
use Typeform\BaseClient;

class BaseTest extends \PHPUnit_Framework_Testcase
{

    public $config = [];
    public $proxy = null;
    //public $proxy = 'tcp://localhost:8888';
    public $verifySsl = false;
    public $env = BaseClient::ENV_MOCK;
    public $debugOutput = false;

    public function __construct()
    {
        $this->config = [
            'max_retries' => 0,
            'http_client_options' => [
                'defaults' => [
                    'proxy' => $this->proxy,
                    'verify' => $this->verifySsl,
                ]
            ],
            'apiToken' => getenv('TYPEFORM_API_TOKEN'),
        ];

        parent::__construct();
    }

    public function testInfo()
    {
        $client = $this->getClient();
        try {
            $info = $client->info([]);
            $this->debug($info);

            $this->assertEquals(200, $info['statusCode']);
            $this->assertEquals('typeform.io/docs', $info['documentation']);
        } catch (CommandClientException $e) {
            $error = $e->getResponse()->getHeader('X-Error');
            $this->fail($e->getMessage() . 'Error: ' . $error);
        } catch (\Exception $e) {
            $this->fail($e->getMessage());
        }
    }

    private function getClient($extraConfig = [])
    {
        $config = array_merge_recursive($this->config, $extraConfig);
        return new Base($config, $this->env);
    }

    private function debug($output)
    {
        if ($this->debugOutput) {
            fwrite(STDERR, print_r($output, true));
        }
    }
}