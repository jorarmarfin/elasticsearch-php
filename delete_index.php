<?php
require 'vendor/autoload.php';


$hosts = ['http://search-jamc-w4uaio3yhujwk5k5gxofhlai5e.us-east-1.es.amazonaws.com:80'];
$client = Elasticsearch\ClientBuilder::create()->setHosts($hosts)->build();



$params = ['index' => 'my_index'];
$response = $client->indices()->delete($params);

