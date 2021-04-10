<?php
include_once('../Config/ConnectDb.php');

class VehicleDao{
    private $query;

    public function Get(){
        $this->query = "SELECT * FROM vehicles";
        $con = new ConnectDb();
        $stmt = $con->getCon()->prepare($this->query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    

    public function POST($vehicle){
        if($vehicle){
            try{
                    
                $this->query = 'INSERT INTO vehicles(model,plate,color,nameCli,phone)
                                values(:model,:plate,:color,:name,:phone)';

                $con = new ConnectDb();
                $stmt = $con->getCon()->prepare($this->query);
                $this->setParams($stmt, array(
                                              ":model"      =>     strtoupper($vehicle->getModel()),
                                              ":plate"      =>     strtoupper($vehicle->getPlate()),
                                              ":color"      =>     strtoupper($vehicle->getColor()),
                                              ":name"       =>     strtoupper($vehicle->getOwner()),
                                              ":phone"      =>     $vehicle->getPhone()));

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

    function getVehicle($id){
        try{
            $con = new ConnectDb();
            $this->query = "SELECT * FROM vehicles WHERE id = :id";
            $stmt = $con->getCon()->prepare($this->query);
            $this->setParams($stmt, array(":id"      =>     $id));
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            return "error ".$e->getMessage();
        }
    }

    function setParams($stmt, $params = array()){
        foreach($params  as $key => $val){
            $stmt->bindValue($key,$val);
        }
    }
}