<?php
    require("geral_header_main.php");
    require("../database/usuario_bd.php");

    if(isset($_SESSION["usuario_logado"])){
        echo'
            <ul class="nav system-status Roboto-LightItalic justify-content-center mb-5">   
                <li class="nav-item">
                    <a class="nav-link active" href="../src/descartador_main.php">Página Principal /</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Solicitar Coleta</a>
                </li>
            </ul>

            <div class="row mt-1 mb-5">

                <div class="col-1 col-sm-2 col-md-3 col-lg-4 col-xl-4"></div>

                <div class="col-10 col-sm-8 col-md-6 col-lg-4 col-xl-4">

                    <div class="card text-center card-login">
                        <div class="card-header">
                            <div class="text-center">
                                <h3 id="LoginTitle" class="Roboto-Bold">Solicitar Coleta</h3>
                            </div>
                        </div>

                        <div class="card-body form-group">
        ';

        if(isset($_GET["flag"])){
            if ($_GET["flag"] == 0) {
                echo'
                            <div class="error mt-3 mb-3 Roboto-Medium">Verifique se preencheu todos os campos e tente novamente.</div>            
                ';
            }
        }

        echo'
                            <form action="descartador_valida_coleta.php" method="POST" id="cadastrar_Desc">

                                <div class="text-center mt-2">
                                    <h5 id="LoginTitle" class="Roboto-LightItalic">Material e Quantidade</em></h5>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                    <select class="custom-select col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6  border-dark mr-2" name="Material" required="required">
                                        <option value="0">Selecione um material*</option>
        ';

        $listaMaterias = listarMateriais($conexao);

        foreach($listaMaterias as $item){
            echo'
                                        <option value="' .$item["idMaterial"]. '">' .$item["tipoMaterial"]. '</option>
            ';
        }
        
        echo'
                                    </select>
                                    <input type="number" class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" placeholder="Peso (Kg.)*" name="qtdd" step="0.1" required="required">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                </div>

                                <div class="text-center mt-4">
                                    <h5 id="LoginTitle" class="Roboto-LightItalic">Data e Hora para Retirada</em></h5>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                    <input type="date" class="form-control col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 border-dark mr-2" name="dataColeta" required="required">
                                    <input type="time" class="form-control col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 border-dark" name="horaColeta" required="required">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                </div>

                                <div class="text-center mt-4">
                                    <h5 id="LoginTitle" class="Roboto-LightItalic">Prazo para Aceitação de Coleta</em></h5>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                    <input type="date" class="form-control col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 border-dark mr-2" name="dataPrazo" required="required">
                                    <input type="time" class="form-control col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 border-dark" name="horaPrazo" required="required">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-2 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                    <input type="submit" class="btn border-dark col-8 col-sm-10 col-md-10 col-lg-10 col-xl-10 verde Roboto-Bold" value="Solicitar" id="ButtonEntrar">
                                    <div class="col-2 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

                <div class="col-1 col-sm-2 col-md-3 col-lg-4 col-xl-4"></div>
            </div>
        ';
    }else{
        header("Location: ../public/login.php");
        die();
    }

    require("../template/footer.html");
?>