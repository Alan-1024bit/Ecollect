<?php
    require("../database/usuario_bd.php");
    require("geral_usuario_logica.php");

    $resultado = deletarSolicitacaoColeta($conexao, $_POST["idColeta"]);

    if($resultado == null){
        header("Location: descartador_main.php?flag=1");
    }else{
        header("Location: descartador_main.php");
    }
?>