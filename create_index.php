<?php
require 'vendor/autoload.php';


$hosts = ['94.130.73.248:9200'];

$client = Elasticsearch\ClientBuilder::create()->setHosts($hosts)->build();

$url="http://padron.sahost.com.pe/api/v1/postulante/rango/1/10";
$json=file_get_contents($url);
$array = json_decode($json);

$data = [];
$i=0;
foreach ($array as $key => $obj) {
    $data['nroins']=$obj->nroins;
    $data['codigo']=$obj->codigo;
    $data['paterno']=$obj->paterno;
    $data['materno']=$obj->materno;
    $data['nombre']=$obj->nombre;

    $params = [
        'index' => 'postulantes_index',
        'type' => 'my_type',
        'body' => $data,
       ];
    
    
    $response = $client->index($params);
    $i++;
}

echo'listo:'.$i;