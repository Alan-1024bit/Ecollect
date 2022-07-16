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
                    <a class="nav-link active" href="../src/geral_ajustes.php">Ajustes da conta /</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Alterar Dados</a>
                </li>
            </ul>

            <div class="row mt-1 mb-5">

                <div class="col-1 col-sm-2 col-md-3 col-lg-4 col-xl-4"></div>

                <div class="col-10 col-sm-8 col-md-6 col-lg-4 col-xl-4">

                    <div class="card text-center card-login">
                        <div class="card-header">
                            <div class="text-center">
                                <h3 id="LoginTitle" class="Roboto-Bold">Alterações</h3>
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
                            <form action="geral_valida_altera.php" method="POST" id="cadastrar_Desc">

                                <div class="row">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                    <input type="email" class="form-control col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 border-dark text-muted" placeholder="E-mail*" name="email" value="' .$_SESSION["usuario_logado"]. '" disabled=disabled>
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                    <input type="password" class="form-control col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 border-dark mr-1" placeholder="Senha*" name="senha" value=" '.$_SESSION["senha"].'">
                                    <input type="password" class="form-control col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 border-dark" placeholder="Confirmar senha*" name="confirmarSenha" value="' .$_SESSION["senha"]. '">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                </div>

                                <div class="text-center mt-4">
                                    <h5 id="LoginTitle" class="Roboto-LightItalic">Dados Pessoais</em></h5>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                    <input type="text" class="form-control col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 border-dark mr-1 text-muted" placeholder="Nome*" name="nome" value="' .$_SESSION["nome"]. '" disabled=disabled>
                                    <input type="text" class="form-control col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 border-dark text-muted" placeholder="Sobrenome*" name="sbrnome" value="' .$_SESSION["sbrnome"]. '" disabled=disabled>
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                    <input type="text" class="form-control col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 border-dark" placeholder="Telefone ou Celular*" name="tel" id="id_tel" value="' .$_SESSION["tel"]. '">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                </div>

                                <div class="text-center mt-4">
                                    <h5 id="LoginTitle" class="Roboto-LightItalic">Endereço</em></h5>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                    <select class="custom-select col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10  border-dark" name="Bairro" id="Bairro">
                                        <option value="0">Selecione o bairro*</option>
        ';

            $listaBairros = listarBairros($conexao);

            foreach($listaBairros as $item){
                if($item["idBairro"] == $_SESSION["idBairro"]){
                echo'     
                    <option value="' .$item["idBairro"]. '" selected>' .$item["nomeBairro"]. '</option>
                ';
                }else{
                    echo'     
                        <option value="' .$item["idBairro"]. '">' .$item["nomeBairro"]. '</option>
                    ';
                }
            }

        echo'
                                    </select>
                                    
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                    <input type="text" class="form-control col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 border-dark mr-1" placeholder="Logradouro*" name="ruaCasa" value="' .$_SESSION["ruaCasa"]. '">
                                    <input type="text" class="form-control col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 border-dark" placeholder="N°*" name="nmrCasa" value="' .$_SESSION["nmrCasa"]. '">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-2 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                    <input type="hidden" name="perfil" value="1">
                                    <input type="submit" class="btn border-dark col-8 col-sm-10 col-md-10 col-lg-10 col-xl-10 verde Roboto-Bold" value="Alterar" id="ButtonEntrar">
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