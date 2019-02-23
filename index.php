<?php
require 'vendor/autoload.php';


$hosts = [
    'http://search-jamc-w4uaio3yhujwk5k5gxofhlai5e.us-east-1.es.amazonaws.com:80',         // IP + Port
];

$client = Elasticsearch\ClientBuilder::create()           // Instantiate a new ClientBuilder
                    ->setHosts($hosts)      // Set the hosts
                    ->build();
// if ($client) {
//     echo 'connected';
// }

$params = [
    'index' => 'my_index',
    'type' => 'my_type',
    'body' => [
        'nombre' => 'Bianca Valery',
        'apellido' => 'Mayta campos',
        'edad' => '40',
    ],
   ];
$response = $client->index($params);
print_r($response);

// $params['index'] = 'my_index';
// $params['type'] = 'my_type';
// $params['body']['query']['match']['nombre'] = 'bianca';

// $result = $client->search($params);
// print_r($result);