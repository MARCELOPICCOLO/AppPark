<?php
include_once('../Config/ConnectDb.php');

class ClientDao{
    private $query;

    public function GetClient($id){
        $this->query = "SELECT * FROM clients WHERE $id = :id";
        $con = new ConnectDb();
        $stmt = $con->getCon()->prepare($this->query);
        
        $this->setParams($stmt, array( ":id"      =>     $id));

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function setParams($stmt, $params = array()){
        foreach($params  as $key => $val){
            $stmt->bindValue($key,$val);
        }
    }
}