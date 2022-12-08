<?php
//CONEXÃO COM O BANCO
require_once('conexaoDb.php');
$banco = new db();
$conexao = $banco->conexaoDb();

$idCliente = $_POST['id'];
$novaSenha = md5($_POST['novaSenha']);

$sqlUpdate = "UPDATE clientes SET senha = '$novaSenha' WHERE id_link = '$idCliente'";


if (mysqli_query($conexao, $sqlUpdate)) {

    echo  'sucesso';
} else {

    echo  'erroQuery';
}
