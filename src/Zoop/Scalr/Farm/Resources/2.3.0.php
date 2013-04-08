<?php

return array(
    'apiVersion' => '2.3.0',
    'serviceFullName' => 'Amazon Simple Storage Service',
    'serviceAbbreviation' => 'Amazon S3',
    'serviceType' => 'rest-xml',
    'timestampFormat' => 'rfc822',
    'globalEndpoint' => 's3.amazonaws.com',
    'signatureVersion' => 's3',
    'namespace' => 'S3',
    'operations' => array(
        'FarmsList' => array(
            'httpMethod' => 'GET',
            'uri' => '/?Action={Action}',
            'class' => 'Zoop\\S3\\Command\\S3Command',
            'responseClass' => 'GetBucketAclOutput',
            'responseType' => 'model',
            'summary' => 'Gets the access control policy for the bucket.',
            'parameters' => array(
                'Action' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'acl',
                    'default' => '_guzzle_blank_',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
    ),
);