<?php
    include_once('../Models/Vehicle.php');
    include_once('../DAO/VehicleDao.php');

if(isset($_POST)){
    $vehicle = new Vehicle();
    $VeicDao = new VehicleDao();

    $vehicle->setPlate(strtoUpper($_POST['Plate']));
    $vehicle->setModel(strtoUpper($_POST['Model']));
    $vehicle->setColor(strtoUpper($_POST['Color']));
    $vehicle->setOwner(strtoUpper($_POST['nameCli']));
    $vehicle->setPhone($_POST['phone']);


    try{
        $res = $VeicDao->Post($vehicle);
        if($res){
            header("location: ../Views/Index.php");
        }

    }catch(Exception $e){
        echo "not saved";
    }

}