<?php
session_start();
//CONEXÃO COM O BANCO
require_once('../../../assets/php/conexaoDb.php');
$banco = new db();
$conexao = $banco->conexaoDb();

$email = $_POST['email'];
$senha = md5($_POST['senha']);

$sqlSelect = "SELECT * FROM adm WHERE email = '$email' AND senha = '$senha'";

if ($resultadoSelect = mysqli_query($conexao, $sqlSelect)) {

    $registro = mysqli_fetch_array($resultadoSelect);

    if (isset($registro['email'])) {

        $_SESSION['id'] = $registro['id'];
        $_SESSION['email'] = $registro['email'];
        $_SESSION['nome'] = $registro['nome'];
        $_SESSION['cargo'] = $registro['cargo'];
        echo 'sucesso';
    } else {

        echo 'naoExiste';
    }
} else {

    echo 'erroQuery';
}
