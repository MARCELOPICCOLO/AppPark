<?php
include_once('../Models/Vehicle.php');
include_once('../Models/Client.php');
include_once('../DAO/VehicleDao.php');
include_once('../DAO/ClientDao.php');

$veic = new Vehicle();
$veicDao = new VehicleDao();
$cliDao = new ClientDao();

if($_GET['id']){
    $res = $veicDao->getVehicle($_GET['id']);
    $client = $cliDao->getClient($res['client_id']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/Style.css?v=2">
    <title>Parking</title>
</head>
<body>
    <div class="container">
        <header>
            <div class="title"> 
                 <h4>CONTROLE ESTACIONAMENTO DA FATEC</h4>  
            </div>
        </header>
            <div class="add">
               <h4>Deletar Cadastro</h4> 
        <form action="../Controllers/DeleteVehicle.php" method="GET">
                <input type="hidden" class="form-control" id="" name="idPark" maxlength="7" value="<?php echo $res['id']?>">
                <input type="hidden" class="form-control" id="" name="idCli" maxlength="7" value="<?php echo $res['client_id']?>">
                PLaca : <?php echo $res['plate'];?><br>
                Model : <?php echo $res['model'];?><br>
                COR : <?php echo $res['color'];?><br>
                PROPRIETÁRIO : <?php echo $client['nome']?><br>
                <hr>
    
                <div class="del" style="backgroud-color:red">
                    <a href="../Views/index.php">Home</a>
                    <button type="submit" class="btn btn-dark">Confirmar</button>
                </div> 
            <div> 
        </form>
        <footer>
        </footer>
    </div>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
