<?php
include_once('../Models/CLient.php');

class Vehicle{
    private $id;
    private $clientId;
    private $model;
    private $plate;
    private $color;
    private $isFavorite;
    private $createdAt;
    private $client;

    public function __CONSTRUC(){
        $this->client = new Client();
    }

    //value
    public function getId(){
        return $this->id;
    }
    public function setId($value){
        if($value){
            $this->id = $value;       
        }else{
            echo "the value can't null";
        }    
    }

    //CLIENT value
    public function getCLientID(){
        return $this->clientId;
    }

    public function setClientId($value){
        if($value){
            $this->clientId = $value;       
        }else{
            echo "the value can't null";
        }    
    }
   
    //MODEL
    public function getModel(){
        return $this->model;
    }
    public function setModel($value){
        if($value){
            $this->model = $value;       
        }else{
            echo "the value can't null";
        }    
    }
  
    //PLATE
    public function getPlate(){
        return $this->plate;
    }
    public function setPlate($value){
        if($value){
            $this->plate = $value;       
        }else{
            echo "the value can't null";
        }    
    }
  
    //COLOR
    public function getColor(){
        return $this->color;
    }
    public function setColor($value){
        if($value){
            $this->color = $value;       
        }else{
            echo "the value can't null";
        }    
    }
       
    //ISFAVORITE
    public function getFavorite(){
        return $this->isFavorite;
    }
    public function setFavorite($value){
        if($value){
            $this->isFavorite = $value;       
        }else{
            echo "the value can't null";
        }    
    }
    
    public function getClient(){
        return $this->client;
    }
    public function setClient($c){
        if($c){
            $this->client = $c;
        }else{
            echo "this object can' null";
        }
    }

     //CREATEDAT
     public function getDateCreate(){
        return $this->createdAt;
    }
    public function setDateUpdated($value){
        if($value){
            $this->createdAt = $value;       
        }else{
            echo "the value can't null";
        }    
    }

}