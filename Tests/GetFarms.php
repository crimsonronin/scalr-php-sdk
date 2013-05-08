<?php

require '../vendor/autoload.php';
   error_reporting(E_ALL);
    ini_set('display_errors', '1');
use Zoop\Scalr\Farm\FarmClient;

$client = FarmClient::factory([
            'key' => '',
            'secret' => ''
        ]);

$command = $client->getCommand('GetFarms');
try {
    $responseModel = $client->execute($command);
} catch (Guzzle\Http\Exception\BadResponseException $e) {
    echo 'Error: ' . $e->getMessage();
}
