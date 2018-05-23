<?php
namespace TypeformTests;

include __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Command\Exception\CommandClientException;
use Typeform\Form;
use Typeform\BaseClient;

class FormTest extends \PHPUnit_Framework_Testcase
{

    public $config = [];
    public $proxy = null;
//    public $proxy = 'tcp://localhost:8888';
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

    public function testCreate()
    {
        $client = $this->getClient();
        try {
            $info = $client->create([
                'title' => 'My new Typeform',
                'fields' => [
                    "type" => "short_text",
                    "question" => "How is the weather down in Barcelona today?",
                ],
            ]);
            $this->debug($info);

            $this->assertEquals(201, $info['statusCode']);
            $this->assertEquals('en', $info['settings']['language']);
        } catch (CommandClientException $e) {
            $error = $e->getResponse()->getHeader('X-Error');
            $this->fail($e->getMessage() . 'Error: ' . $error);
        } catch (\Exception $e) {
            $this->fail($e->getMessage());
        }
    }

    public function testGet()
    {
        $client = $this->getClient();
        try {
            $info = $client->get('JJDINER');
            $this->debug($info);

            $this->assertEquals(200, $info['statusCode']);
            $this->assertEquals('en', $info['settings']['language']);
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
        return new Form($config, $this->env);
    }

    private function debug($output)
    {
        if ($this->debugOutput) {
            fwrite(STDERR, print_r($output, true));
        }
    }
}