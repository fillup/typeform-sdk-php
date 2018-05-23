<?php
namespace Typeform;

use Typeform\BaseClient;

/**
 * Typeform API client implemented with Guzzle.
 *
 * @method array create(array $config = [])
 * @method array getInternal(array $config = [])
 * @method array createWebhook(array $config = [])
 */
class Form extends BaseClient
{
    /**
     * @param array $config
     * @param string $env
     */
    public function __construct(array $config = [], $env = self::ENV_PROD)
    {
        // Apply some defaults.
        $config += [
            'description_path' => __DIR__ . '/descriptions/forms.php',
        ];

        // Create the client.
        parent::__construct(
            $config,
            $env
        );
    }

    public function get(string $formId)
    {
        $data = [
            'form_id' => $formId,
        ];

        return $this->getInternal($data);
    }

    public function createWithWebhook(array $formData, string $webhookUrl, string $webhookTag = 'default')
    {
        $form = $this->create($formData);
        $this->createWebhook([
            'form_id' => $form['id'],
            'tag' => $webhookTag,
            'url' => $webhookUrl,
            'enabled' => true,
        ]);

        return $form;
    }
}
