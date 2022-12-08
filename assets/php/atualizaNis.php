<?php
require_once('conexaoDb.php');
$banco = new db();
$conexao = $banco->conexaoDb();

$id = $_POST['id'];
$nis = $_POST['nis'];

$sqlConsulta = "SELECT * FROM formulario_cliente WHERE id = $id";
$updateNis = "UPDATE formulario_cliente SET nis = '$nis' WHERE id = $id";

//BUSCA CLIENTE
if ($resultadoConsulta = mysqli_query($conexao, $sqlConsulta)) {

    $registroConsulta = mysqli_fetch_array($resultadoConsulta);

    //VERIFICA SE ESTA EM BRANCO
    if ($registroConsulta['nis'] == '') {

        //ATUALIZA O NIS
        if (mysqli_query($conexao, $updateNis)) {

            echo 'sucesso';
        } else {

            echo 'erroQuery';
        }
    } else {

        echo 'jaCadastrado';
    }
} else {

    echo 'erroQuery';
}
