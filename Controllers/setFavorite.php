<?php
 
 include_once('../Models/Client.php');
 include_once('../DAO/VehicleDao.php');


if(isset($_GET['id'])){
   $veicDao = new VehicleDao();
   $veic = $veicDao->getVehicle($_GET['id']);
   $value = !(int)$veic['isFavorite'];

   $res = $veicDao->setFavorite($_GET['id'],$value);
   
   if($res){
       header("location: ../Views/index.php");
   }
}