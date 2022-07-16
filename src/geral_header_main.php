<?php
    require("../src/geral_usuario_logica.php");   
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="imagex/png" href="../assets/images/favicon.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/style.css">
        <title>ECOLLECT</title>
    </head>
    <body>
        <div class="container-fluid">
            <header>
                <div class="row">
                    <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-center">
                        <i class="material-icons icones-main">account_circle</i>
                        <br>
                        <p class="Roboto-Bold text-light text-nav"><?php echo'' .$_SESSION["nome"]. ''; ?></p>
                    </div>

                    <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-center">
                        <a href="geral_ajustes.php">
                            <i class="material-icons icones-main">settings</i>
                            <br>
                            <p class="Roboto-Bold text-light text-nav">ajustes</p>
                        </a>
                    </div>

                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
                        <div class="logo">
                            <lettering>E</lettering>
                            <lettering>C</lettering>
                            <lettering>
                                <img src="../assets/images/ciclo.png" alt="imagem de um ciclo">
                            </lettering>
                            <lettering>L</lettering>
                            <lettering>L</lettering>
                            <lettering>E</lettering>
                            <lettering>C</lettering>
                            <lettering>T</lettering>
                        </div>
                    </div>
                    
                    <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-center">
                        <a href="historico.php">
                            <i class="material-icons icones-main">history</i>
                            <br>
                            <p class="Roboto-Bold text-light text-nav">histórico</p>
                        </a>
                    </div>

                    <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-center">
                        <a href="geral_logout.php">
                            <i class="material-icons icones-main">logout</i>
                                                        <br>
                            <p class="Roboto-Bold text-light text-nav">sair</p>
                        </a>
                    </div>
                </div>
            </header>
            <hr>
