<?php
//CONEXÃO COM O BANCO
session_start();
if (!isset($_SESSION['nome']) && !isset($_SESSION['cargo'])) {
    header("Location: ../../index.php");
}

//CONEXÃO COM O BANCO
require_once('../../../assets/php/conexaoDb.php');
$banco = new db();
$conexao = $banco->conexaoDb();

$bolsaFamilia = $_POST['bolsaFamilia'];
$dataInscricao = $_POST['dataInscricao'];
$dtNasc = $_POST['dtNasc'];
$endereco = $_POST['endereco'];
$escolaOrigem = $_POST['escolaOrigem'];
$grauEducacao = $_POST['grauEducacao'];
$ne = $_POST['ne'];
$av = $_POST['av'];
$nis = $_POST['nis'];
$nomeAluno = $_POST['nomeAluno'];
$observacao = $_POST['observacao'];
$primeiraOpcaoEscola = $_POST['primeiraOpcaoEscola'];
$referencia = $_POST['referencia'];
$segundaOpcaoEscola = $_POST['segundaOpcaoEscola'];
$telefone = $_POST['telefone'];
$tipoEducacao = $_POST['tipoEducacao'];
$numeroProtocolo = $_POST['numeroProtocolo'];

$sqlUpdate = "UPDATE formulario_cliente SET nome_aluno = '$nomeAluno', data_nascimento = '$dtNasc', tipo_educacao = '$tipoEducacao', endereco = '$endereco', referencia = '$referencia', telefone = '$telefone', segunda_unidade_escola = '$segundaOpcaoEscola', NE = '$ne', AV = '$av', bolsa_familia = '$bolsaFamilia', escola_origem = '$escolaOrigem', observacao = '$observacao', grau_educacao = '$grauEducacao', primeira_unidade_escola = '$primeiraOpcaoEscola', nis = '$nis' WHERE numero_protocolo = '$numeroProtocolo'";

if (mysqli_query($conexao, $sqlUpdate)) {

    echo 'sucesso';
} else {

    echo 'erroQuery';
}
