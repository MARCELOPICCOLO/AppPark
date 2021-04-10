<?php
include_once('../Config/ConnectDb.php');

class ClientDao{
    private $query;

    public function getClient($cliId){
        $this->query = "SELECT * FROM clients WHERE id = :id";
        $con = new ConnectDb();
        $stmt = $con->getCon()->prepare($this->query);
        
        $this->setParams($stmt, array( ":id"      =>     $cliId));

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getClientName($name){
        $this->query = "SELECT * FROM clients WHERE nome = :name";
        $con = new ConnectDb();
        $stmt = $con->getCon()->prepare($this->query);
        
        $this->setParams($stmt, array( ":name"      =>     $name));

        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function POST($client){
        if($client){
            try{
                
                if(!$client->getId()){
                    $this->query = 'INSERT INTO clients(nome,phone)
                    values(:name,:phone)';
                }
                else{
                    $this->query = "UPDATE clients SET nome = :name, phone = :phone WHERE id = :id";
                }
               
                $con = new ConnectDb();
                $stmt = $con->getCon()->prepare($this->query);
                $params = array(":name"      =>     strtoupper($client->getName()),
                                ":phone"     =>     strtoupper($client->getPhone()));


                if($client->getId()){
                    $params[':id'] = $client->getId();
        
                }
       
                $this->setParams($stmt, $params);
                

            return $stmt->execute();

            }catch(PDOException $e){
                echo "Pdo Error ".$e->getMessage();
            }catch(Exeption $e){
                echo "generic error ".$e->getMessage();
            }
        }else{
            echo "object can't is null";
        }
    }


    function setParams($stmt, $params = array()){
        foreach($params  as $key => $val){
            $stmt->bindValue($key,$val);
        }
    }
}