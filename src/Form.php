<?php
namespace Typeform;

use Typeform\BaseClient;

/**
 * Typeform API client implemented with Guzzle.
 *
 * @method array info(array $config = [])
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
}
