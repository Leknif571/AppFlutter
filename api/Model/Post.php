<?php


class Post{

    private $connect;
 


    public $id;
    public $email;
    public $pseudo;
    public $pass;
    public $firstName;
    public $lastName;
    public $localHost;


    public function __construct($db){
        $this->connect = $db;
    }

    public function read(){
        $query = 'SELECT * FROM User';
        $stmt = $this->connect->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function create(){

        $query = 'INSERT INTO User (email, pseudo, pass, firstName, lastName, localHost) VALUES (:email,:pseudo,:pass,:firstName, :lastName, :localisation)';
        $stmt = $this->connect->prepare($query);

            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':pseudo',$this->pseudo);
            $stmt->bindParam(':pass', $this->pass);
            $stmt->bindParam(':firstName',$this->firstName);
            $stmt->bindParam(':lastName', $this->lastName);
            $stmt->bindParam(':localisation',$this->localisation);

        $stmt->execute();

        return $stmt;
    }

    public function updateUser(){

        $query = 'UPDATE `user` SET email = :email, `pseudo`=:pseudo, `pass`=:pass, `firstName`=:firstName, `lastName`=:lastName, `localHost`=:localh WHERE id = :idU ';
            $stmt = $this->connect->prepare($query);
            
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':pseudo',$this->pseudo);
            $stmt->bindParam(':pass', $this->pass);
            $stmt->bindParam(':firstName',$this->firstName);
            $stmt->bindParam(':lastName', $this->lastName);
            $stmt->bindParam(':localh',$this->localisation);

            $stmt->bindParam(':idU', $this->id);

        $stmt->execute();

        return $stmt;
    }

    public function deleteUser(){

        $query = 'DELETE FROM user WHERE id = :idU';
        $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':idU', $this->id);
        $stmt->execute();

        return $stmt;
    }

    public function getByEmailOrUserAndPass(){

        $query = 'SELECT * FROM User WHERE email = :email AND pass = :pass OR pseudo = :pseudo AND pass = :pass';

        $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':pseudo', $this->email);
            $stmt->bindParam(':pass', $this->pass);
        $stmt->execute();

        return $stmt;
    }

    
    public function getByEmailOrUser(){

        $query = 'SELECT * FROM User WHERE email = :email AND pass = :pass OR pseudo = :pseudo';

        $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':pseudo', $this->email);
        $stmt->execute();

        return $stmt;
    }


}

?>