<?php

class ConnectDb{
    private $conn;

    public function __construct(){
            try{
                $this->conn = new PDO("mysql:host=localhost;dbname=AppParking","root","mysql");
            }catch(PDOException $e){
                echo $e->getMessage();
            }          
    }
    public function getCon(){
        return $this->conn;
    }
}