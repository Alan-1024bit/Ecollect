<?php
require("../database/usuario_bd.php");

$perfil = $_POST["perfil"];

if($perfil == 1){//CADASTRO DE DESCARTADOR

    $emailDescartador = $_POST["email"];
    $senha = $_POST["senha"];
    $nomeDescartador = $_POST["nome"];
    $sbrnomeDescartador = $_POST["sbrnome"];
    $telDescartador = $_POST["tel"];
    $ruaCasa = $_POST["ruaCasa"];
    $nmrCasa = $_POST["nmrCasa"];
    $idBairro = $_POST["Bairro"];
    
    if(buscarUsuario($conexao, $emailDescartador, $senha, $perfil) == null){//VERIFICAÇÃO PARA GARANTIR QUE UM USUÁRIO NÃO SE CADASTRE DUAS VEZES
        $resultado = cadastrarDescartador($conexao, $emailDescartador, $senha,
            $nomeDescartador, $sbrnomeDescartador, $telDescartador, $ruaCasa, $nmrCasa, $idBairro);
    
        if($resultado == TRUE){
            header("Location: ../public/login.php?flag=3");
        }else {
            header("Location: descartador_cadastro.php?flag=0");
        }
    }else{
        header("Location: descartador_cadastro.php?flag=1");
    }

}elseif ($perfil == 0) {//CADASTRO DE COLETOR
    if($_POST["qtddBairros"] == 0 || $_POST["qtddMateriais"] == 0){//NÃO CADASTRA
        header("Location: coletor_cadastro.php?flag=0");

    }else{//CADASTRA
        if(buscarUsuario($conexao, $emailColetor, $senha, $perfil) == null){//NÃO CADASTRADO

            $emailColetor = $_POST["email"];

            $senha = $_POST["senha"];
            
            $nomeColetor = $_POST["nome"];
        
            $sbrnomeColetor = $_POST["sbrnome"];
        
            $telColetor = $_POST["tel"];

            //CADASTRAR USANDO INSERT
            $resultado = cadastrarColetor($conexao, $emailColetor, $senha, $nomeColetor, $sbrnomeColetor, $telColetor);

            //RESULTADO DA QUERY INSERT
            if($resultado == TRUE){//COLETOR TEVE SEU CADASTRO REALIZADO
            
                //obter a quantidade de bairros selecionados
                $qtddBairros = $_POST["qtddBairros"];

                //obter a quantidade de materiais selecionados
                $qtddMateriais = $_POST["qtddMateriais"];

                //obter os bairros selecionados. o número 10 vai ser substituído assim que o banco de dados estiver mais povoado.
                for ($i=1, $insertBairro=0; $i <= 10; $i++) {//$i <= a quantidade de Bairros cadastrados no Banco de Dados
                    if($insertBairro == $qtddBairros){
                        break;
                    }else{
                        if(isset($_POST['Bairro' .$i. ''])){
                            insereColetorBairro($conexao, $emailColetor, $_POST['Bairro' .$i. '']);
                            $insertBairro++;
                        }
                    }
                }

                //obter os materiais selecionados. o número 7 vai ser substituído assim que o banco de dados estiver mais povoado.
                for ($i=1, $insertMaterial=0; $i <= 7; $i++) {//$i <= a quantidade de Materiais cadastrados no Banco de Dados
                    if(isset($_POST['Material' .$i. ''])){
                        insereColetorMaterial($conexao, $emailColetor, $_POST['Material' .$i. '']);
                    }
                }

                header("Location: ../public/login.php?flag=2");

            }else {//CADASTRO NÃO REALIZADO
                header("Location: coletor_cadastro.php?flag=1");
            }
        }else{//JÁ CADASTRADO
            header("Location: coletor_cadastro.php?flag=1");
        }

    }
}


?>