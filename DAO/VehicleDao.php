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
  
    public function Post($vehicle){
        if($vehicle){
            try{
                if(!$vehicle->getId()){
                    $this->query = 'INSERT INTO vehicles(client_id,plate,model,color)
                    values(:cli,:plate,:model,:color)';
                }  
                else{
                    $this->query = "UPDATE vehicles SET plate=:plate, model=:model, color=:color WHERE id =:id";
                }
              
                $obj = $vehicle->getClient();
    
                $con = new ConnectDb();
                $stmt = $con->getCon()->prepare($this->query);
                $params = array(
                                ":cli"        =>     (int)$obj->id,
                                ":plate"      =>     strtoupper($vehicle->getPlate()),
                                ":model"      =>     strtoupper($vehicle->getModel()),                                 
                                ":color"      =>     strtoupper($vehicle->getColor()));

                if($vehicle->getId()){
                    $params[':id'] = (int)$vehicle->getId();
                    echo $this->query."<br>";
                    unset($params[":cli"]);
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

    public function getVehicle($id){
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

    public function delete($id){
        try{
            $this->query = "DELETE FROM vehicles WHERE id = :id";
            $con = new ConnectDb();
            $stmt = $con->getCon()->prepare($this->query);
            $this->setParams($stmt,array(":id" => $id));
            return $stmt->execute();

        }catch(PDOException $e){
            echo "error on delete -> ".$e->getMessage();
        }
    }

    public function setFavorite($id,$value){
        $this->query = "UPDATE vehicles SET isFavorite=:value WHERE id=:id";
        $con = new ConnectDb();
        $stmt = $con->getCon()->prepare($this->query);
        $this->setParams($stmt, array(":id"      =>    $id,
                                      ":value"   =>    (int)$value));
        return $stmt->execute();
    }

    private function setParams($stmt, $params = array()){
        foreach($params  as $key => $val){
            $stmt->bindValue($key,$val);
        }
    }
}