<?php
    require("../src/geral_usuario_logica.php");
    require("../database/usuario_bd.php");

    $concluida = 0;

    $resultado = insereColeta($conexao, $_SESSION["usuario_logado"], $_POST["Material"], $_POST["dataColeta"],
    $_POST["horaColeta"], $concluida, $_POST["dataPrazo"], $_POST["horaPrazo"], $_POST["qtdd"]);

    if($resultado == null){
        header("Location: descartador_coleta.php?flag=0");
    }else{
        header("Location: descartador_main.php");
    }

?>
