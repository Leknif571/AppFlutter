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

$result = $post->read();
$num = $result->rowCount();


// if($num > 0){
    $posts_arr = array();
    // $post_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $post_item = array(
            'id' => $id,
            'label' => $label,
            'description' => $description,
            'imageBase64' => $pics,
            'idUser' => $idUser,
     
        );

        array_push($posts_arr, $post_item);
    }
    echo json_encode($posts_arr);

// }

// echo json_encode('Api fonctionnel');
?>