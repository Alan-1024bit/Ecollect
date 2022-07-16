<?php
    require("geral_header_main.php");

    if(isset($_SESSION["usuario_logado"])){
        if($_SESSION["perfil"] == 0){
            $main = "coletor_main.php";
            $alterar = "coletor_altera.php";

        }else{
            $main = "descartador_main.php";
            $alterar = "descartador_altera.php";
        }

        echo'
            <ul class="nav system-status Roboto-LightItalic justify-content-center mb-5">   
                <li class="nav-item">
                    <a class="nav-link active" href="' .$main. '">Página Principal /</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Ajustes da conta</a>
                </li>
            </ul>
        ';

        if(isset($_GET["flag"])){
            echo'
            <div class="message-error mt-3 mb-3 Roboto-Medium">Algo deu errado. Tente novamente!</div>
            ';
        }

        echo'
            <div class="row mb-5">
                <h1 class="Roboto-Bold titleCadastrar">Quero:</h1>
            </div>

            <div class="form-group">
                <form action="' .$alterar. '" method="POST">
                    <div class="row">
                        <div class="col-2 col-sm-2 col-md-4 col-lg-4 col-xl-4"></div>
                        <input type="submit" class="Roboto-Bold verde btn border-dark col-8 col-sm-8 col-md-4 col-lg-4 col-xl-4 btnSelecaoPerfilCadastro" value="Alterar dados">
                        <div class="col-2 col-sm-2 col-md-4 col-lg-4 col-xl-4"></div>
                    </div>
                </form>

                <div class="row mt-4">
                    <div class="col-2 col-sm-2 col-md-4 col-lg-4 col-xl-4"></div>
                    
                    <button type="button" class="Roboto-Bold vermelho btn border-dark col-8 col-sm-8 col-md-4 col-lg-4 col-xl-4 btnSelecaoPerfilCadastro" data-toggle="modal" data-target="#modalExemplo">
                        Excluir conta
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">

                            <div class="modal-content border-dark">
                                <div class="modal-header verde_escuro border-dark">
                                    <h3 class="modal-title m-auto Roboto-Bold text-light" id="exampleModalLabel">Atenção! Você tem certeza?</h3>
                                </div>

                                <div class="modal-body m-auto Roboto-Medium">
                                    Excluir sua conta desmarcará suas coletas e excluirá todas suas informações permanentemente!
                                </div>
                                <hr>
                                <div class="m-auto container">
                                    <form action="geral_delete.php" method="POST">
                                        <div class="row">
                                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>

                                            <button class="mb-2 text-light btn border-dark Roboto-Bold azul col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" data-dismiss="modal">Cancelar</button>
                                            
                                            <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"></div>
                                            
                                            <button type="submit" class="mb-2 text-light btn border-dark Roboto-Bold vermelho col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">Confirmar</button>
                                            
                                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-2 col-sm-2 col-md-4 col-lg-4 col-xl-4"></div>
                </div>
            </div>
        ';

    }else {
        header("Location: ../public/login.php");
    }

    require("../template/footer.html");
?>