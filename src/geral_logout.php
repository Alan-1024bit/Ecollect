<?php
require("geral_usuario_logica.php");

realizarLogout();
header("Location: ../public/login.php");
die();

?>