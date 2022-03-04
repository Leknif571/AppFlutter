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

    // $post->id = $data->id;

    $post->pseudo = $data->pseudo;
    $post->email = $data->email;
    $post->pass = $data->pass;
    $post->firstName = $data->firstName;
    $post->lastName = $data->lastName;
    $post->localisation = $data->localisation;

    $result = $post->getByEmailOrUser();
    $num = $result->rowCount();
    
    if($num==0){
        if($post->create()){
            $arr = array('flag' => true,
                         'message' => 'compte creer');
            echo json_encode($arr);
        } else{
            $arr = array('flag' => false,
            'message' => 'Une erreur est survenu, réessayer plus tard');
             echo json_encode($arr);
        }
    }else{
        $arr = array('flag' => false,
        'message' => 'Utilisateur déjà existant');
        echo json_encode($arr);
    }
    
?>    