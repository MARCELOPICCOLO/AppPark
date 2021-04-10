<?php
  include_once('../Models/Vehicle.php');
  include_once('../Models/Client.php');
  include_once('../DAO/VehicleDao.php');
  include_once('../DAO/ClientDao.php');

if(isset($_POST)){
    $vehicle = new Vehicle();
    
    $cliDao = new ClientDao();
    $VeicDao = new VehicleDao();

    //search exists client in database
    $res = $cliDao->getClient($_POST['idCli']);
    $cli = new Client();
    $cli->setName(strtoUpper($_POST['nameCli']));
    $cli->setPhone($_POST['phone']);
  
    if(isset($_POST['idPark'])){
       $cli->setId($_POST['idCli']);   
    }
    
    $res = $cliDao->POST($cli);   
 
    $res = $cliDao->getClientName($_POST['nameCli']);
    
 
    $vehicle->setClientId($res->id);
    $vehicle->setPlate(strtoUpper($_POST['Plate']));
    $vehicle->setModel(strtoUpper($_POST['Model']));
    $vehicle->setColor(strtoUpper($_POST['Color']));
    $vehicle->setClient($res);

    if(isset($_POST['idPark']))
    {
        $vehicle->setId((int)$_POST['idPark']);
    }

    try{
        $res = $VeicDao->Post($vehicle);
        if($res){
           header("location: ../Views/index.php");      
        }

    }catch(Exception $e){
        echo "not saved";
    }

}

