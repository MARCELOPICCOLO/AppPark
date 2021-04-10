<?php
include_once('../Models/Vehicle.php');
include_once('../Models/Client.php');
include_once('../DAO/VehicleDao.php');
include_once('../DAO/ClientDao.php');

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

            <div class="filter">
                <a href="create.php">
                    <button type="button">
                        <i class="fas fa-plus"></i>
                        <i class='fas fa-car' style='font-size:24px'></i>
                </button></a>
            </div>

        </header>

        <section class="secTable">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Placa</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Cor</th>
                    <th scope="col">Proprietário</th>
                    <th scope="col">Telefone</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                   //open php

                   $vehicleDao = new VehicleDao();
                   $cliDao = new ClientDao();
                   $client = new Client();
                    $items = $vehicleDao->Get();

                       foreach($items as $i){
                                                 
                            $client = $cliDao->getClient($i['client_id']);


                            echo "<tr>
                                      <td>".$i['plate']."</td>
                                      <td>".$i['model']."</td>
                                      <td>".$i['color']."</td>
                                      <td>".$client['nome']."</td>
                                      <td>".$client['phone']."</td>
                                      <td style='text-align:center'>
                                       <a href=edit.php?id=".$i['id']."><i class='far fa-edit' style='font-size:24px; margin-left:15px'></i></a>
                                       <a href=delete.php?id=".$i['id']."><i class='far fa-trash-alt' style='font-size:24px; margin-left:15px'></i></a>";

                                        if($i['isFavorite']==0){
                                            echo "<i class='far fa-star' style='font-size:24px; margin-left:15px'></i></td></tr>";
                                        }
                                        else{
                                            echo "<i class='fas fa-star' style='font-size:24px; color:orange;margin-left:15px'></i></i></td></tr>";
                                        }
                       }
                       //endforeach
                    //end Php
                    ?>
                </tbody>
            </table>
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
