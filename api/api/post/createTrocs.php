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
    $post = new Troc($db);

    $data = json_decode(file_get_contents("php://input"));

    $post->label = $data->label;
    $post->description = $data->description;
    $post->pics = $data->pics;
    $post->idUser = $data->idUser;


    
    

    if($post->create()){
        echo json_encode($post);
    } else{
        echo 'Employee could not be created.';
    }
?>    