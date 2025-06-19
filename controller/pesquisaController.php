<?php
//importando o arquivo de conexao
include_once('conexao.php');
include_once('validar.php');

//pegando dados do formulario
$opcao = $_POST['opcao'];


if ($opcao == 'criar') {
    //pegando dados do formulario registrar pesquisa

    $tema = $_POST['tema'];
    $tipo = $_POST['tipo'];
    $problematica = $_POST['problematica'];
    $userId = $_SESSION['id'];
    $obectivo = $_POST['objectivo'];

    $dataregistro=date('Y-m-d');

    $sql = "INSERT INTO pesquisas (tema,tipo,ploblematica,objectivo,user_id,dataregistro) VALUE('$tema','$tipo','$problematica','$obectivo',$userId,'$dataregistro');";
    //executando comando sql para enserir na tabela pesquisas  
    $verificar = mysqli_query($conexao, $sql);

    mysqli_close($conexao);
    header('Location: ../view/pesquisa.php?info=Pesquisa registada.');
    exit;
} elseif ($opcao == 'apagar') {

    $idpesquisa = $_POST['idcode'];



    $sql = "DELETE FROM pesquisas WHERE id=$idpesquisa;";
    $verificar = mysqli_query($conexao, $sql);

    mysqli_close($conexao);
    header('Location: ../view/pesquisa.php?info=Pesquisa apagada.');
    exit;
} elseif ($opcao == 'actualizar') {

    $tema = $_POST['tema'];
    $tipo = $_POST['tipo'];
    $problematica = $_POST['problematica'];

    $obectivo = $_POST['objectivo'];

    $idpesquisa = $_POST['idcode'];

    $sql = "UPDATE pesquisas SET tema='$tema',tipo='$tipo',objectivo='$obectivo',ploblematica='$problematica'  WHERE id=$idpesquisa;";

    $verificar = mysqli_query($conexao, $sql);

    mysqli_close($conexao);
    header('Location: ../view/pesquisa.php?info=Dados da pesquisa actualizado.');
    exit;
}
