<?php
require("conecta_bd.php");

function buscarUsuario($conexao, $usuario, $senha, $perfil) {
  $usuario = mysqli_real_escape_string($conexao, $usuario);
  $senha = mysqli_real_escape_string($conexao, $senha);
  $senha_md5 = md5($senha);

  if($perfil == 0){//COLETOR
    $sql = "SELECT emailColetor, senha, nomeColetor, sbrnomeColetor, telColetor FROM COLETOR
    WHERE emailColetor = '$usuario' AND senha ='$senha_md5'";
  }else{//DESCARTADOR
    $sql = "SELECT emailDescartador, senha, nomeDescartador, sbrnomeDescartador, telDescartador, ruaCasa, nmrCasa, idBairro FROM DESCARTADOR
    WHERE emailDescartador = '$usuario' AND senha ='$senha_md5'";
}

  $resultado = mysqli_query($conexao, $sql);
  return mysqli_fetch_assoc($resultado);
}

function cadastrarDescartador($conexao, $emailDescartador, $senha, 
$nomeDescartador,$sbrnomeDescartador, $telDescartador, $ruaCasa, $nmrCasa, $idBairro){
  
  $emailDescartador = mysqli_real_escape_string($conexao, $emailDescartador);
  $senha = mysqli_real_escape_string($conexao, $senha);
  $senha_md5 = md5($senha);
  
  $sql = 
"INSERT INTO DESCARTADOR
  (emailDescartador, senha, nomeDescartador, sbrnomeDescartador, telDescartador, ruaCasa, nmrCasa, idBairro) 
VALUES 
  ('$emailDescartador',
  '$senha_md5',
  '$nomeDescartador',
  '$sbrnomeDescartador',
  '$telDescartador',
  '$ruaCasa',
  '$nmrCasa',
  '$idBairro')";

$resultado = mysqli_query($conexao, $sql);
return $resultado;
}

function cadastrarColetor($conexao, $emailColetor, $senha, $nomeColetor, $sbrnomeColetor, $telColetor){
  
  $emailColetor = mysqli_real_escape_string($conexao, $emailColetor);
  $senha = mysqli_real_escape_string($conexao, $senha);
  $senha_md5 = md5($senha);
  
  $sql = 
"INSERT INTO COLETOR
  (emailColetor, senha, nomeColetor, sbrnomeColetor, telColetor) 
VALUES 
  ('$emailColetor',
  '$senha_md5',
  '$nomeColetor',
  '$sbrnomeColetor',
  '$telColetor')";

$resultado = mysqli_query($conexao, $sql);
return $resultado;
}

function insereColetorBairro($conexao, $emailColetor, $idBairro){
  $sql =
"INSERT INTO COLETOR_BAIRRO
(emailColetor, idBairro) 
VALUES 
('$emailColetor',
'$idBairro')";

return mysqli_query($conexao, $sql);
}

function LerColetorBairro($conexao, $emailColetor){
  $listaBairros = [];

  $sql = "SELECT idBairro FROM COLETOR_BAIRRO WHERE emailColetor = '$emailColetor'";

  $resultado = mysqli_query($conexao, $sql);
  while ($bairro = mysqli_fetch_assoc($resultado)) {
    array_push($listaBairros, $bairro);
  }

  return $listaBairros;
}

function insereColetorMaterial($conexao, $emailColetor, $idMaterial){
  $sql =
"INSERT INTO COLETOR_MATERIAL
(idMaterial, emailColetor) 
VALUES 
('$idMaterial',
'$emailColetor')";

return mysqli_query($conexao, $sql);
}

function LerColetorMaterial($conexao, $emailColetor){
  $listaMateriais = [];

  $sql = "SELECT idMaterial FROM COLETOR_MATERIAL WHERE emailColetor = '$emailColetor'";

  $resultado = mysqli_query($conexao, $sql);
  while ($material = mysqli_fetch_assoc($resultado)) {
    array_push($listaMateriais, $material);
  }

  return $listaMateriais;
}

function deletarUsuario($usuario, $perfil, $conexao){

  if($perfil == 0){

    $sql = "DELETE FROM coletor WHERE emailColetor = '$usuario'";

  }elseif($perfil == 1){

    $sql = "DELETE FROM descartador WHERE emailDescartador = '$usuario'";
  }
  
  return mysqli_query($conexao, $sql);
}

function listarBairros($conexao){
  $listaBairros = [];
  $sql = "SELECT idBairro, nomeBairro FROM BAIRRO";

  $resultado = mysqli_query($conexao, $sql);
  while ($bairro = mysqli_fetch_assoc($resultado)) {
      array_push($listaBairros, $bairro);
  }

  return $listaBairros;
}

function listarMateriais($conexao){
  $listaMateriais = [];
  $sql = "SELECT idMaterial, tipoMaterial FROM MATERIAL";

  $resultado = mysqli_query($conexao, $sql);
  while ($material = mysqli_fetch_assoc($resultado)) {
      array_push($listaMateriais, $material);
  }

  return $listaMateriais;
}

function alterarDescartador($conexao, $emailDescartador, $senha,
$telDescartador, $ruaCasa, $nmrCasa, $idBairro){

  $senha = mysqli_real_escape_string($conexao, $senha);
  $senha_md5 = md5($senha);
  
  $sql = 
  "UPDATE
    DESCARTADOR
  SET
    senha = '$senha_md5',
    telDescartador = '$telDescartador',
    ruaCasa = '$ruaCasa',
    nmrCasa = '$nmrCasa',
    idBairro = '$idBairro'
  WHERE
    emailDescartador = '$emailDescartador'
  ";

  $resultado = mysqli_query($conexao, $sql);
  return $resultado;
}

function alterarColetor($conexao, $emailColetor, $senha, $telColetor){

  $senha = mysqli_real_escape_string($conexao, $senha);
  $senha_md5 = md5($senha);
  
  $sql = 
  "UPDATE
    COLETOR
  SET
    senha = '$senha_md5',
    telColetor = '$telColetor'
  WHERE
    emailColetor = '$emailColetor'
  ";

  $resultado = mysqli_query($conexao, $sql);
  return $resultado;
}


function deleteColetorBairro($conexao, $emailColetor){
  $sql =
"DELETE FROM
  COLETOR_BAIRRO
WHERE
  emailColetor = '$emailColetor'";

return mysqli_query($conexao, $sql);
}

function deleteColetorMaterial($conexao, $emailColetor){
  $sql =
"DELETE FROM
  COLETOR_MATERIAL
WHERE
  emailColetor = '$emailColetor'";

return mysqli_query($conexao, $sql);
}

function insereColeta($conexao, $emailDescartador, $idMaterial, $dataColeta,
    $horaColeta, $concluida, $dataPrazo, $horaPrazo, $qtddMaterial){

  $sql =
  "INSERT INTO COLETA
    (emailDescartador,
    idMaterial,
    dataColeta,
    horaColeta,
    concluida,
    dataPrazo,
    horaPrazo,
    qtddMaterial) 
  VALUES 
  ('$emailDescartador',
  '$idMaterial',
  '$dataColeta',
  '$horaColeta',
  '$concluida',
  '$dataPrazo',
  '$horaPrazo',
  '$qtddMaterial')";
  
  return mysqli_query($conexao, $sql);
}


function listarSolicitacaoColeta($conexao, $emailDescartador){
  $listaColetas = [];

  $sql = "SELECT idMaterial, dataColeta, horaColeta, dataPrazo, horaPrazo, qtddMaterial, emailColetor, idColeta FROM coleta WHERE emailDescartador = '$emailDescartador'";

  $resultado = mysqli_query($conexao, $sql);
  while ($coleta = mysqli_fetch_assoc($resultado)) {
      array_push($listaColetas, $coleta);
  }

  return $listaColetas;
}

function deletarSolicitacaoColeta($conexao, $idColeta){

    $sql = "DELETE FROM coleta WHERE idColeta = '$idColeta'";
  
  return mysqli_query($conexao, $sql);
}
/**/

?>