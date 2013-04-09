<?php

require '../vendor/autoload.php';
   error_reporting(E_ALL);
    ini_set('display_errors', '1');
use Zoop\Scalr\Farm\FarmClient;

$client = FarmClient::factory([
            'key' => '417e5b524fd4268d',
            'secret' => 'pteq00Suw3J/6/ZMJk6jFb2G9jBBruwxU41dnlANAmCVhWUrOoY9uvp1KBJ+Q1Utz7UMP5cbknNRGdLBlQUoIUvoIq4/AsRByfc/EGWmBo5yGc/AMVXfEYg0Czn60vnKpr29HfN6V+XXSdhgZfBBplQrBMSZkVW2aWJRK6oI3pk='
        ]);

$command = $client->getCommand('GetFarms');
try {
    $responseModel = $client->execute($command);
} catch (Guzzle\Http\Exception\BadResponseException $e) {
    echo 'Error: ' . $e->getMessage();
}