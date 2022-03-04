<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../../bddConnexion/bdd.php';
include_once '../../Model/Troc.php';

$dbase = new Bdd();
$db = $dbase->getConnection();

$troc = new Troc($db);
$data = json_decode(file_get_contents("php://input"));

$troc->id = $data->id;

$result = $troc->deleteTroc();



// if($num > 0){
    // $troc_arr['data'] = array();


    echo json_encode("Utilisateur supprimer" . $troc->id);

// }

// echo json_encode('Api fonctionnel');
?>