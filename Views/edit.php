<?php
include_once('../Models/Vehicle.php');
include_once('../DAO/VehicleDao.php');

$veic = new Vehicle();
$veicDao = new VehicleDao();

if($_GET['id']){
    $res = $veicDao->getVehicle($_GET['id']); 
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
    <link rel="stylesheet" href="../styles/Style.css">
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
               <h4>Editar Cadastros</h4> 
                <form action="../Controllers/SaveVehicle.php" method="POST">
                    <div class="form-group">
                        <label for="Plate">Placa</label>
                        <input type="text" class="form-control" id="" name="Plate" maxlength="7" value="<?php echo $res['plate']?>" style="width:20%; height:25px">
                    </div>

                    <div class="form-group">
                        <label for="Model">Modelo</label>
                        <input type="text" class="form-control" id="" name="Model" maxlength="45" value="<?php echo $res['model']?>" style="width:60%; height:25px">
                    </div>

                    <div class="form-group">
                        <label for="Color">Cor do Veiculo</label>
                        <select class="form-control" id="color" name="Color" value="<?php echo $res['color']?>" style="width:20%; height:25px">
                        <option>Prata</option>
                        <option>Preto</option>
                        <option>Vermelho</option>
                        <option>Branco</option>
                        <option>Verde</option>
                        <option>Azul</option>
                        <option>Verde</option>
                        <option>Amarelo</option>
                        <option>Rosa</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="client">Proprietário</label>
                        <input type="text" class="form-control" name="nameCli" id="" maxlength="45" value="<?php echo $res['nameCli']?>" style="width:60%; height:25px">
                    </div>

                    <div class="form-group">
                        <label for="phone">Contato</label>
                        <input type="text" class="form-control" id="" name="phone" maxlength="14" value="<?php echo $res['phone']?>" placeholder="(00) 00000-0000" style="width:30%; height:25px">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-dark mt-3">Salvar</button>
                    </div>

               </form>
            <div>
        <section>
        </section>
        
        <footer>
        </footer>
    </div>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
