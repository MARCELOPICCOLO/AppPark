<?php
 include_once('../Models/Vehicle.php');
 include_once('../DAO/VehicleDao.php');

    if(isset($_GET['idPark'])){

        $veicDao = new VehicleDao();
        $res = $veicDao->delete($_GET['idPark']);
        if($res){
            echo "CADASTRO DELETADO<BR>";
        }else{         
            echo "NÃO FOI POSSÌVEL DELETAR O CADASTRO<BR>";
        }

    }
?>

<a href="../Views/index.php">Home</a>