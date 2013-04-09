<?php

namespace Zoop\Scalr\Farm;

use Guzzle\Common\Collection;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;
use Zoop\Scalr\Common\Signature\SignatureListener;

/**
 * My example web service client
 */
class FarmClient extends Client {

    /**
     * Factory method to create a new MyServiceClient
     *
     * The following array keys and values are available options:
     * - base_url: Base URL of web service
     * - scheme:   URI scheme: http or https
     * - username: API username
     * - password: API password
     *
     * @param array|Collection $config Configuration data
     *
     * @return self
     */
    public static function factory($config = array()) {
        $default = array(
            'base_url' => '{scheme}://api.scalr.net/',
            'scheme' => 'https'
        );
        $required = array('key', 'secret', 'base_url');
        $config = Collection::fromConfig($config, $default, $required);

        $client = new self($config->get('base_url'), $config);
        // Attach a service description to the client
        $description = ServiceDescription::factory(__DIR__ . '/Resources/2.3.0.php');

        $client->setDescription($description);

        $client->addSubscriber(new SignatureListener());

        return $client;
    }

}