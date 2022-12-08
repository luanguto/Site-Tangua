<?php
session_start();

//CONEXÃO COM O BANCO
require_once('conexaoDb.php');
$banco = new db();
$conexao = $banco->conexaoDb();

//VARIAVEIS RECEBIDAS NA REQUISIÇÃO
$cpf = $_POST['cpf'];
$senha = md5($_POST['senha']);

$selectCliente = "SELECT * FROM clientes WHERE cpf = '$cpf' AND  senha = '$senha'";

if ($resultadoCliente = mysqli_query($conexao, $selectCliente)) {

    $registroCliente = mysqli_fetch_array($resultadoCliente);

    if (isset($registroCliente['cpf'])) {
        $_SESSION['id'] = $registroCliente['id'];
        $_SESSION['nome'] = $registroCliente['nome'];
        $_SESSION['email'] = $registroCliente['email'];
        $_SESSION['link'] = $registroCliente['id_link'];
        $_SESSION['cpf'] = $registroCliente['cpf'];
        echo 'sucesso';
    } else {

        echo 'naoExiste';
    }
} else {

    echo 'erroQuery';
}
