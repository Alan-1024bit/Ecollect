<?php
    require("geral_header_main.php");
    require("../database/usuario_bd.php");

    if(isset($_SESSION["usuario_logado"])){
        echo'
            <ul class="nav system-status Roboto-LightItalic justify-content-center mb-5">   
                <li class="nav-item">
                    <a class="nav-link active" href="../src/coletor_main.php">Página Principal /</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="../src/geral_ajustes.php">Ajustes da conta /</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Alterar Dados</a>
                </li>
            </ul>
            
            <div class="row mt-1  mb-5">

                <div class="col-1 col-sm-2 col-md-3 col-lg-4 col-xl-4"></div>

                <div class="col-10 col-sm-8 col-md-6 col-lg-4 col-xl-4">

                    <div class="card text-center card-login">
                        <div class="card-header">
                            <div class="text-center">
                                <h3 id="LoginTitle" class="Roboto-Bold"><em>Para iniciar suas</em> coletas, <em>faça o</em> cadastro</h3>
                            </div>
                        </div>

                        <div class="card-body form-group">
        ';

        if(isset($_GET["flag"])){
            if ($_GET["flag"] == 0) {
                echo'
                            <div class="error mt-3 mb-3 Roboto-Medium">Verifique se preencheu todos os campos e tente novamente.</div>            
                ';
            }elseif($_GET["flag"] == 1) {
                echo'
                            <div class="error mt-3 mb-3 Roboto-Medium">Hpuve algum problema ao alterar os dados pessoais. Por favor, tente novamente!</div>            
                ';
            }elseif($_GET["flag"] == 2) {
                echo'
                            <div class="error mt-3 mb-3 Roboto-Medium">Não foi possível alterar todos os bairros selecionados. Por favor, tente novamente!</div>            
                ';
            }elseif($_GET["flag"] == 3) {
                echo'
                            <div class="error mt-3 mb-3 Roboto-Medium">Não foi possível alterar todos os materiais selecionados. Por favor, tente novamente!</div>            
                ';
            }elseif($_GET["flag"] == 4) {
                echo'
                            <div class="text-success mt-3 mb-3 Roboto-Medium">Alteração realizada com sucesso</div>            
                ';
            }
        }

        unset($_GET["flag"]);

        echo'
                            <form action="geral_valida_altera.php" method="POST" id="cadastrar_Desc">

                                <div class="row">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                    <input type="email" class="form-control col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 border-dark" placeholder="E-mail*" name="email" value="' .$_SESSION["usuario_logado"]. '" disabled=disabled>
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                    <input type="password" class="form-control col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 border-dark mr-1" placeholder="Senha*" name="senha"  value="' .$_SESSION["senha"]. '">
                                    <input type="password" class="form-control col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 border-dark" placeholder="Confirmar senha*" name="confirmarSenha"  value="' .$_SESSION["senha"]. '">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                </div>

                                <div class="text-center mt-4">
                                    <h5 id="LoginTitle" class="Roboto-LightItalic">Dados Pessoais</em></h5>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                    <input type="text" class="form-control col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 border-dark mr-1" placeholder="Nome*" name="nome" value="' .$_SESSION["nome"]. '" disabled=disabled>
                                    <input type="text" class="form-control col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 border-dark" placeholder="Sobrenome*" name="sbrnome" value="' .$_SESSION["sbrnome"]. '" disabled=disabled>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                    <input type="text" class="form-control col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 border-dark" placeholder="Telefone ou Celular*" name="tel" id="id_tel" value="' .$_SESSION["tel"]. '">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                </div>

                                <div class="text-center mt-4">
                                    <h5 id="LoginTitle" class="Roboto-LightItalic">Seleção de Bairros</h5>
                                </div>

                                <div class="row mt-1" id="divSelectBairro">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>

                                    <select class="custom-select col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10  border-dark" name="Bairro" id="SelectBairro">
                                        <option value="0">Selecione bairros para trabalhar*</option>
        ';

        $listaBairros = listarBairros($conexao);

        foreach($listaBairros as $item){
            for ($i=1, $flag = 0; $i <= sizeof($_SESSION["bairros"]) && $flag != 1; $i++) { 
                if($_SESSION["bairros"][$i] == $item["idBairro"]){
                    echo'
                                        <option value="' .$item["idBairro"]. '" disabled="disabled">' .$item["nomeBairro"]. '</option>
                    ';
                    $flag = 1;
                }
            }

            if($flag == 0){
                echo'
                                    <option value="' .$item["idBairro"]. '">' .$item["nomeBairro"]. '</option>
                ';
            }
        }

        echo'
                                    </select>
                                    
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                </div>

                                <div class="mt-2 row">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>

                                    <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10" id="divBairro">
        ';

        foreach($listaBairros as $item){
            for ($i=1; $i <= sizeof($_SESSION["bairros"]); $i++) { 
                if($item["idBairro"] == $_SESSION["bairros"][$i]){
                    echo'
                                        <div class="btn-group mt-1 mb-1" role="group" aria-label="Exemplo básico" id="InputBairroHidden' .$item["idBairro"]. '">
                                            <button type="button" class="btn btn-danger disable">' .$item["nomeBairro"]. '</button>
                                            <button type="button" class="btn btn-danger material-icons" id="buttonDeleteBairro' .$item["idBairro"]. '" onclick="DeleteBairro(' .$item["idBairro"]. ')">close</button>
                            
                                            <input type="hidden" name="Bairro' .$item["idBairro"]. '" value="' .$item["idBairro"]. '">
                                        </div>
                    ';
                }
            }
        }

        echo'
                                    </div>

                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                </div>

                                <div class="text-center mt-4">
                                    <h5 id="LoginTitle" class="Roboto-LightItalic">Seleção de Materiais</h5>
                                </div>

                                <div class="row mt-2" id="divSelectMaterial">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>

                                    <select class="custom-select col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10  border-dark" name="Bairro" id="SelectMaterial">
                                        <option value="0">Selecione materiais para coletar*</option>
        ';

        $listaMateriais = listarMateriais($conexao);

        foreach($listaMateriais as $item){
            for ($i=1, $flag = 0; $i <= sizeof($_SESSION["materiais"]) && $flag != 1; $i++) { 
                if($_SESSION["materiais"][$i] == $item["idMaterial"]){
                    echo'
                                        <option value="' .$item["idMaterial"]. '" disabled="disabled">' .$item["tipoMaterial"]. '</option>
                    ';
                    $flag = 1;
                }
            }

            if($flag == 0){
                echo'
                                        <option value="' .$item["idMaterial"]. '">' .$item["tipoMaterial"]. '</option>
                ';
            }
        }

        echo'
                                    </select>
                                    
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                </div>

                                <div class="mt-2 row">
                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>

                                    <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10" id="divMaterial">
        ';

        foreach($listaMateriais as $item){
            for ($i=1; $i <= sizeof($_SESSION["materiais"]); $i++) { 
                if($item["idMaterial"] == $_SESSION["materiais"][$i]){
                    echo'
                                        <div class="btn-group mt-1 mb-1" role="group" aria-label="Exemplo básico" id="InputMaterialHidden' .$item["idMaterial"]. '">
                                            <button type="button" class="btn btn-danger disable">' .$item["tipoMaterial"]. '</button>
                                            <button type="button" class="btn btn-danger material-icons" id="buttonDeleteMaterial' .$item["idMaterial"]. '" onclick="DeleteMaterial(' .$item["idMaterial"]. ')">close</button>
                                
                                            <input type="hidden" name="Material' .$item["idMaterial"]. '" value="' .$item["idMaterial"]. '">
                                        </div>
                    ';
                }
            }
        }

        echo'
                                    </div>

                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-2 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                    <input type="hidden" name="qtddBairros" value="' .sizeof($_SESSION["bairros"]). '" id="id_qtddBairros">
                                    <input type="hidden" name="qtddMateriais" value="' .sizeof($_SESSION["materiais"]). '" id="id_qtddMateriais">
                                    <input type="hidden" name="perfil" value="0">
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