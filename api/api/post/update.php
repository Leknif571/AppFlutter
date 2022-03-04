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
    $post->pseudo = $data->pseudo;
    $post->email = $data->email;
    $post->pass = $data->pass;
    $post->firstName = $data->firstName;
    $post->lastName = $data->lastName;
    $post->pass = $data->pass;
    $post->localisation = $data->localisation;

    
    

    if($post->updateUser()){
        echo 'Employee created successfully.';
        echo json_encode($post);
    } else{
        echo 'Employee could not be created.';
    }
?>    