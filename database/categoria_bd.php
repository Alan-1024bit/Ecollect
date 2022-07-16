<?php
require("conecta_bd.php");

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


function insereColetorBairro($conexao, $emailColetor, $idBairro){
    $sql =
"INSERT INTO COLETOR_BAIRRO
  (emailColetor, idBairro) 
VALUES 
  ('$emailColetor',
  '$idBairro')";

  mysqli_query($conexao, $sql);
}

function insereColetorMaterial($conexao, $emailColetor, $idMaterial){
    $sql =
"INSERT INTO COLETOR_MATERIAL
  (idMaterial, emailColetor) 
VALUES 
  ('$idMaterial',
  '$emailColetor')";

  mysqli_query($conexao, $sql);
}

?>