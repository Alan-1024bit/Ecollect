<?php
    require("geral_header_main.php");
    require("../database/usuario_bd.php");

    if(!isset($_SESSION["usuario_logado"])){
        header("Location: ../public/login.php");
        die();
    }
?>
            <ul class="nav system-status Roboto-LightItalic justify-content-center mb-5">
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Página Principal /</a>
                </li>
            </ul>
<?php
    if(isset($_GET["flag"])){
        if ($_GET["flag"] == 0) {
            echo'
                <div class="text-success mt-2 mb-3 Roboto-Medium text-center">Alteração realizada com sucesso!</div>            
            ';

        }elseif ($_GET["flag"] == 1) {
            echo'
                <div class="text-danger mt-2 mb-3 Roboto-Medium text-center">Exclusão não realizada! Tente novamente</div>            
            ';

        }
    }

    unset($_GET["flag"]);
?>

                <div class="row">
                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>

                    <div class=" col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 text-center mr-2">
                        <h4 class="Roboto-Bold titleCadastrar mb-3">Solicitações de Coletas</h4>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="descartador_coleta.php">
                                    <span class="material-icons">add</span>                                
                                </a>

                            </li>
                        <?php
                            $listaSolicitacao = listarSolicitacaoColeta($conexao, $_SESSION["usuario_logado"]);
                            $listaMateriais = listarMateriais($conexao);

                            foreach ($listaSolicitacao as $coleta) {

                                foreach ($listaMateriais as $material) {
                                    if($material["idMaterial"] == $coleta["idMaterial"]){
                                        $tipoMaterial = $material["tipoMaterial"];
                                    }
                                }

                                if($coleta["emailColetor"] == NULL){
                                    echo'
                            <li class="list-group-item text-left">
                                <div class="row">
                                    <div class="col-4"><strong>' .$tipoMaterial. ': </strong>' .$coleta["qtddMaterial"]. ' kg </div>
                                    <div class="col-4"><small>' .date('j M, D', strtotime ($coleta["dataPrazo"])). ' às ' .(new DateTime($coleta["horaPrazo"]))->format('H:i'). '</small></div>
                                    <div class="col-2"></div>
                                    <div class="col-2">
                                        <button
                                            type="submit"
                                            class="border-0 bg-light"
                                            data-toggle="modal"
                                            data-target="#modalExemplo"
                                            onclick="incluirInputValue(' .$coleta["idColeta"]. ')"
                                        >
                                            <span class="material-icons text-danger">delete</span>
                                        </button>
                                    </div>
                                </div>
                            </li>
                                        ';
                                }

                            }
                        ?>
                        
                        </ul>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 text-center">
                        <h4 class="Roboto-Bold titleCadastrar mb-3">Coletas Agendadas</h4>
                    </div>
                        
                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">

                        <div class="modal-content border-dark">
                            <div class="modal-header verde_escuro border-dark">
                                <h3 class="modal-title m-auto Roboto-Bold text-light" id="exampleModalLabel">Atenção! Você tem certeza?</h3>
                            </div>

                            <div class="modal-body m-auto Roboto-Medium">
                                Excluir sua solicitação de coleta impossibilitará seu atendimento!
                            </div>
                            <hr>
                            <div class="m-auto container">
                                <form action="descartador_delSolicita.php" method="POST">
                                    <div class="row">
                                        <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>

                                        <button class="mb-2 text-light btn border-dark Roboto-Bold azul col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" data-dismiss="modal">Cancelar</button>
                                        
                                        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"></div>
                                        
                                        <button type="submit" class="mb-2 text-light btn border-dark Roboto-Bold vermelho col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">Confirmar</button>
                                        
                                        <input type="hidden" name="idColeta" id="input_idColeta">

                                        <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php
    require("../template/footer.html");
?>