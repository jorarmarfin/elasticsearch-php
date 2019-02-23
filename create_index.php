<?php
require 'vendor/autoload.php';


$hosts = ['http://search-jamc-w4uaio3yhujwk5k5gxofhlai5e.us-east-1.es.amazonaws.com:80'];

$client = Elasticsearch\ClientBuilder::create()->setHosts($hosts)->build();

$url="http://padron.sahost.com.pe/api/v1/postulante/rango/5001/5513";
$json=file_get_contents($url);
$array = json_decode($json);

$data = [];
$i=0;
foreach ($array as $key => $obj) {
    $data['id']=$obj->id;
    $data['nroins']=$obj->nroins;
    if ($obj->codigo) {
        $data['codigo']=$obj->codigo;
    }
    $data['paterno']=$obj->paterno;
    $data['materno']=$obj->materno;
    $data['nombre']=$obj->nombre;
    $data['sexo']=$obj->sexo;
    $data['fecha_nacimiento']=$obj->fecha_nacimiento;
    $data['pais_nacimiento']=$obj->pais_nacimiento;
    if ($obj->departamento_nacimiento) {
        $data['departamento_nacimiento']=$obj->departamento_nacimiento;
    }
    if ($obj->provincia_nacimiento) {
        $data['provincia_nacimiento']=$obj->provincia_nacimiento;
    }
    if ($obj->distrito_nacimiento) {
        $data['distrito_nacimiento']=$obj->distrito_nacimiento;
    }
    $data['pais_residencia']=$obj->pais_residencia;
    $data['departamento_residencia']=$obj->departamento_residencia;
    $data['provincia_residencia']=$obj->provincia_residencia;
    $data['distrito_residencia']=$obj->distrito_residencia;
    $data['inicio_estudios']=$obj->inicio_estudios;
    $data['fin_estudios']=$obj->fin_estudios;
    $data['canal']=$obj->canal;
    $data['primera_modalidad']=$obj->primera_modalidad;
    $data['primera_opcion']=$obj->primera_opcion;
    if ($obj->segunda_modalidad) {
        $data['segunda_modalidad']=$obj->segunda_modalidad;
    }
    if ($obj->segunda_opcion) {
        $data['segunda_opcion']=$obj->segunda_opcion;
    }
    if ($obj->espeing) {
        $data['espeing']=$obj->espeing;
    }
    $data['tipo_ie']=$obj->tipo_ie;
    $data['nombre_ie']=$obj->nombre_ie;
    $data['pais_ie']=$obj->pais_ie;
    if ($obj->departamento_ie) {
        $data['departamento_ie']=$obj->departamento_ie;
    }
    if ($obj->provincia_ie) {
        $data['provincia_ie']=$obj->provincia_ie;
    }
    if ($obj->distrito_ie) {
        $data['distrito_ie']=$obj->distrito_ie;
    }
    $data['academia']=$obj->academia;
    $data['ingreso_familiar']=$obj->ingreso_familiar;
    $data['veces_postula']=$obj->veces_postula;
    $data['preparacion']=$obj->preparacion;
    $data['siglas']=$obj->siglas;
    $data['facultad']=$obj->facultad;
    $data['created_at']=$obj->created_at;
    $data['updated_at']=$obj->updated_at;

    $params = [
        'index' => 'postulantes_index',
        'type' => 'sql',
        'body' => $data,
       ];
    
    $response = $client->index($params);
    $i++;
}

echo'listo:'.$i;
