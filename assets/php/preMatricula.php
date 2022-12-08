<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
if (!isset($_SESSION['nome']) && !isset($_SESSION['email']) && !isset($_SESSION['id'])) {
    header("Location: index.php");
    die();
}

//CONEXÃO COM O BANCO
require_once('conexaoDb.php');
$banco = new db();
$conexao = $banco->conexaoDb();

$idCliente = $_SESSION['id'];
$protocolo = date('YmdHis');
$nome = $_POST['nome'];
$dataNascimento = $_POST['dtNasci'];
$tipoEducacao = $_POST['tipoEducacao'];
$grauEducacao = $_POST['grauEducacao'];
$endereco = $_POST['endereco'];
$referencia = $_POST['referencia'];
$telefone = $_POST['telefone'];
$segundaUnidade = $_POST['segundaUnidade'];
$primeiraUnidade = $_POST['primeiraUnidade'];
$ne = $_POST['ne'];
$av = $_POST['av'];
$nis = isset($_POST['nis']) ? $_POST['nis'] : '';
$bolsaFamilia = $_POST['bolsaFamilia'];
$escolaOrigem = $_POST['escolaOrigem'];
$observacao = $_POST['observacao'];

if ($ne == 'Não' && $av == "Não") {
    $sqlInsert = "INSERT INTO formulario_cliente(id_cliente, nome_aluno, data_nascimento, tipo_educacao, endereco, referencia, telefone, segunda_unidade_escola, NE, AV, bolsa_familia, escola_origem, observacao, data_cadastro, grau_educacao, primeira_unidade_escola, numero_protocolo, status_matricula, nis) VALUES('$idCliente', '$nome', '$dataNascimento', '$tipoEducacao', '$endereco', '$referencia', '$telefone', '$segundaUnidade', '$ne', '$av', '$bolsaFamilia', '$escolaOrigem', '$observacao', NOW(), '$grauEducacao', '$primeiraUnidade', '$protocolo', 'Formulário recebido', '$nis')";
} else {

    $sqlInsert = "INSERT INTO formulario_cliente(id_cliente, nome_aluno, data_nascimento, tipo_educacao, endereco, referencia, telefone, segunda_unidade_escola, NE, AV, bolsa_familia, escola_origem, observacao, data_cadastro, grau_educacao, primeira_unidade_escola, numero_protocolo, nis) VALUES('$idCliente', '$nome', '$dataNascimento', '$tipoEducacao', '$endereco', '$referencia', '$telefone', '$segundaUnidade', '$ne', '$av', '$bolsaFamilia', '$escolaOrigem', '$observacao', NOW(), '$grauEducacao', '$primeiraUnidade', '$protocolo',  '$nis')";
}

if (mysqli_query($conexao, $sqlInsert)) {

    echo '{"status":"sucesso", "protocolo":"' . $protocolo . '"}';
} else {

    echo '{"status":"erro", "erro":"Erro ao salvar no DB"}';
}
