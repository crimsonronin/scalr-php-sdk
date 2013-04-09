<?php

namespace Zoop\Scalr\Common\Signature;

use Guzzle\Common\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Listener used to sign requests before they are sent over the wire
 */
class SignatureListener implements EventSubscriberInterface {

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents() {
        return array(
            'request.before_send' => array('onRequestBeforeSend', -255)
        );
    }

    /**
     * Signs requests before they are sent
     *
     * @param Event $event Event emitted
     */
    public function onRequestBeforeSend(Event $event) {
        var_dump($event['request']->getParams());
        var_dump($event['request']->getQuery());
        die();
    }

    private function createSignature($params) {
        $request = null;
        foreach ($params as $k => $v) {
            $request .= $k . $v;
        }
        return base64_encode(hash_hmac('SHA256', $request, $this->secret, 1));
    }

    protected function buildQuery($action, $params = []) {
        $defaultParams = array(
            'Action' => $action,
            'Version' => self::API_VERSION,
            'Timestamp' => date("c"),
            'KeyID' => $this->key
        );
        $params = array_merge($defaultParams, $params);
        ksort($params);

        $params['Signature'] = $this->getSignature($params);
        $request = http_build_query($params);
    }

}
