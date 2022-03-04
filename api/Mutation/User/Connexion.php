<?php

use  Api\Database\Bdd;

$pseudo = $_POST['pseudo'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$lastName = $_POST['lastName'];
$firstName = $_POST['firstName'];
$localHost = $_POST['localHost'];

try{
        $pdo = Bdd::getInstance();

        // $verifExist = $pdo->prepare('SELECT * FROM User WHERE email = :email');
        //     $verifExist->bindParam(':email', $email);
        // $verifExist->execute();


        if(true){
            $userCreate = $pdo->prepare('INSERT INTO User (pseudo, email, pass, lastName, firstName, localHost) VALUES (:pseudo, :email, :pass, :lastName, :firstName, :localHost)');
                $userCreate->bindParam(':pseudo', $pseudo);
                $userCreate->bindParam(':email',$email);
                $userCreate->bindParam(':pass',$pass);

                $userCreate->bindParam(':lastName', $lastName);
                $userCreate->bindParam(':firstName',$firstName);
                $userCreate->bindParam(':localHost',$localHost);
            $userCreate->execute();
            
            json_encode('Votre compte a bien été créer');

        }else{

        json_encode('Un compte existe déjà avec cette adresse');
        }



}catch(e){

    json_encode('Erreur:'.e);
}







?>