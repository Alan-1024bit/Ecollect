<?php
$servidor = "localhost";
$usuario = "tcc";//DEFINIR
$senha = "tcc";//DEFINIR
$banco = "ECOLLECT";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

mysqli_set_charset($conexao, "utf8");

if (mysqli_connect_errno($conexao)) {
  echo "Não foi possível conectar ao banco. Erro: " . mysqli_connect_error();
  die();  
}
?>