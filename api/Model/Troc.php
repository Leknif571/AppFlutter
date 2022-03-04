<?php


class Troc{

    private $connect;

    public $id;
    public $label;
    public $description;
    public $pics;
    public $idUser;



    public function __construct($db){
        $this->connect = $db;
    }

    public function read(){

        $query = 'SELECT * FROM Troc';
        $stmt = $this->connect->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function getAllById(){

        $query = 'SELECT * FROM troc WHERE idUser = :idU';
        $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':idU', $this->idUser);
        $stmt->execute();

        return $stmt;
    }

    
    public function deleteTroc(){

        $query = 'DELETE FROM troc WHERE id = :idT';
        $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':idT', $this->id);
        $stmt->execute();

        return $stmt;
    }


    public function create(){

        $query = 'INSERT INTO Troc (label, description, pics, idUser) VALUES (:label,:description,:pics,:idUser)';
        $stmt = $this->connect->prepare($query);

            $stmt->bindParam(':label', $this->label);
            $stmt->bindParam(':description',$this->description);
            $stmt->bindParam(':pics', $this->pics);
            $stmt->bindParam(':idUser',$this->idUser);


        $stmt->execute();

        return $stmt;
    }


}

?>