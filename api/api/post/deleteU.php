<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../../bddConnexion/bdd.php';
include_once '../../Model/Post.php';

$dbase = new Bdd();
$db = $dbase->getConnection();

$post = new Post($db);
$data = json_decode(file_get_contents("php://input"));

$post->id = $data->id;

$result = $post->deleteUser();



// if($num > 0){
    // $post_arr['data'] = array();


    echo json_encode("Utilisateur supprimer" . $post->id);

// }

// echo json_encode('Api fonctionnel');
?>