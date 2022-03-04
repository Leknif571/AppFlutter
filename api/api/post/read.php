<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../bddConnexion/bdd.php';
include_once '../../Model/Post.php';

$dbase = new Bdd();
$db = $dbase->getConnection();

$post = new Post($db);

$result = $post->read();
$num = $result->rowCount();


// if($num > 0){
    $posts_arr = array();
    // $post_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $post_item = array(
            'id' => $id,
            'email' => $email,
            'pseudo' => $pseudo,
            'pass' => $pass,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'localisation' => $localHost,
        );

        array_push($posts_arr, $post_item);
    }
    echo json_encode($posts_arr);

// }

// echo json_encode('Api fonctionnel');
?>