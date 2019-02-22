<?php
require 'vendor/autoload.php';


$hosts = [
    '94.130.73.248:9200',         // IP + Port
];

$client = Elasticsearch\ClientBuilder::create()           // Instantiate a new ClientBuilder
                    ->setHosts($hosts)      // Set the hosts
                    ->build();
if ($client) {
    echo 'connected';
}

// $params = [
//     'index' => 'my_index',
//     'type' => 'my_type',
//     'body' => [
//         'nombre' => 'Bianca Valery',
//         'apellido' => 'Mayta campos',
//         'edad' => '40',
//     ],
//    ];
#$response = $client->index($params);
#print_r($response);

$params['index'] = 'my_index';
$params['type'] = 'my_type';
$params['body']['query']['match']['nombre'] = 'bianca';

$result = $client->search($params);
print_r($result);