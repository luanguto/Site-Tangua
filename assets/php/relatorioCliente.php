<?php
session_start();
if (!isset($_SESSION['nome']) && !isset($_SESSION['email']) && !isset($_SESSION['id'])) {
    header("Location: index.php");
    die();
}
//CONEXÃO COM O BANCO
require_once('conexaoDb.php');
$banco = new db();
$conexao = $banco->conexaoDb();

$id = $_GET['id'];

$sqlSelectForm = "SELECT * FROM formulario_cliente WHERE id = '$id'";

if ($resultadoForm = mysqli_query($conexao, $sqlSelectForm)) {

    $registroForm = mysqli_fetch_array($resultadoForm);

    if (isset($registroForm['nome_aluno'])) {

        echo '{"nome":"' . $registroForm['nome_aluno'] . '", "dataNasc":"' . $registroForm['data_nascimento'] . '", "tipoEducacao":"' . $registroForm['tipo_educacao'] . '", "endereco":"' . $registroForm['endereco'] . '", "referencia":"' . $registroForm['referencia'] . '", "telefone":"' . $registroForm['telefone'] . '", "segundaUnidade":"' . $registroForm['segunda_unidade_escola'] . '", "ne":"' . $registroForm['NE'] . '", "av":"' . $registroForm['AV'] . '", "bolsaFamilia":"' . $registroForm['bolsa_familia'] . '", "escolaOrigem":"' . $registroForm['escola_origem'] . '", "observacao":"' . $registroForm['observacao'] . '", "dataCadastro":"' . $registroForm['data_cadastro'] . '", "grauEducacao":"' . $registroForm['grau_educacao'] . '", "statusMatricula":"' . $registroForm['status_matricula'] . '", "primeiraUnidadeEscola":"' . $registroForm['primeira_unidade_escola'] . '", "protocolo":"' . $registroForm['numero_protocolo'] . '", "statusEmail":"' . $registroForm['status_email'] . '", "nis":"' . $registroForm['nis'] . '"}';
    } else {

        echo '{"erro":"usuario nao encontrado"}';
    }
} else {

    echo '{"erro":"erroQuery"}';
}
