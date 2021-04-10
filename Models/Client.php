<?php

Class Client{
    private $id;
    private $name;
    private $phone;

    public function getID(){
        return $this->id;
    }

    public function setID($value){
        $this->id=$value;
    }
    
    public function getName(){
        return $this->name;
    }

    public function setName($value){
        $this->name=$value;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function setPhone($value){
        $this->id=$phone;
    }
}