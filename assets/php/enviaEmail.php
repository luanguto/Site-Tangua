<?php
//LIBS PARA O ENVIOO DO EMAIL
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


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

$id = $_SESSION['id'];
$protocolo = $_GET['protocolo'];

//CONSULTA AS INFORMAÇÕES COMPLETAS DO CLIENTE A PARTIR DO PRODOCOLO RECEBIDO
$sqlSelect = "SELECT * FROM formulario_cliente WHERE numero_protocolo = '$protocolo' AND id_cliente = '$id'";

if ($resultado = mysqli_query($conexao, $sqlSelect)) {

    $registro = mysqli_fetch_array($resultado);

    if (isset($registro['numero_protocolo'])) {

        enviaEmail($registro['nome_aluno'], $protocolo, $_SESSION['nome'], $registro['escola_origem'], $registro['primeira_unidade_escola'], $registro['segunda_unidade_escola'], $registro['status_matricula'], $registro['NE'], $registro['AV']);
    }
}


function atualizaStatusEmail($status)
{

    global $conexao, $protocolo;

    $sqlUpdate = "UPDATE formulario_cliente SET status_email = '$status' WHERE numero_protocolo = '$protocolo'";

    mysqli_query($conexao, $sqlUpdate);
}

function enviaEmail($nomeAluno, $protocolo, $nomeAlunonomeAluno, $escolaOrigem, $Escola1, $Escola2, $statusM, $ne, $av)
{

    if ($ne == 'Sim' || $av == 'Sim') {
        $envioDoc = '<p style="color: #627193; font-size: 18px;">ENVIE A DOCUMENTAÇÃO DE COMPROVAÇÃO DO ALUNO: <strong><a href="https://semetangua.com.br/envioDocumentacao.php?link=' . $_SESSION['link'] . '">Clique aqui para realizar o envio da documentação</a></strong></p>';
    } else {
        $envioDoc = '';
    }

    $corpoEmail = '
        <div style="background-color: #f4f7fc; padding: 1rem">
            <div style="background: #0355b8; padding: 1rem; border-radius: 10px; margin-bottom: 2rem; text-align: center; ">
                <a href="https://semetangua.com.br" target="_blank"> <img src="https://semetangua.com.br/assets/img/logo_tangua.png" style="max-height: 120px; max-width: 100%"> </a>
            </div>
            <div style="background-color: #fff; border-radius: 10px; padding: 2rem;">
                <h1 style="font-size: 28px; color: #00005c;">Sr(a) ' . $nomeAlunonomeAluno . '</h1>
                <p style="color: #627193; font-size: 18px;">Número de protocolo: <strong>' . $protocolo . '</strong></p>
                <p style="color: #627193; font-size: 18px;">Aluno(a): <strong>' . $nomeAluno . '</strong></p>
                <p style="color: #627193; font-size: 18px;">Escola de Origem: ' . $escolaOrigem . '<strong></strong></p>
                <p style="color: #627193; font-size: 18px;">1º Opção de escola: <strong>' . $Escola1 . '</strong></p>
                <p style="color: #627193; font-size: 18px;">2º Opção de escola: <strong>' . $Escola2 . '</strong></p>
                <br>
                ' . $envioDoc . '
                <br>
                <p style="background-color: #c9ddff; display: inline; padding: .5rem; color: #627193; font-size: 18px; border-radius: 5px;">Status: <strong>' . $statusM . '</strong></p>
                <p style="color: #627193; font-size: 15px; margin-bottom: 3rem;">Em caso de dúvidas, entre em contato com: <a style="font-size: 15px;" href="mailto:matricula@semetangua.com.br">matricula@semetangua.com.br</a> ou pelo nosso whatsapp<a href="https://api.whatsapp.com/send?phone=5521997167361"> (21)99716-7361.</a></p>
            </div>
        </div>
    ';

    $emailCliente = $_SESSION['email'];

    require('../lib/vendor/autoload.php'); //Apontar para a pasta com o autoload

    $mail = new PHPMailer(true);

    try {
        //CONFIGURAÇÃO SERVIDOR
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'xxxxxxxx'; //HOST DO SMTP DA HOSPEDAGEM
        $mail->SMTPAuth = true;
        $mail->Username = 'xxxxx@xxxxxxx.com.br'; // ACESSO EMAIL
        $mail->Password = 'xxxxxxxxxx'; // SENHA ACESSO EMAIL
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465; // PORTA SSL DO HOST SMTP

        //CONFIGURAÇÃO DESTINATÁRIO
        $mail->setFrom('xxxxxx@xxxxxx.com.br', 'Secretaria Municipal de Educação de Tanguá'); //quem está enviando - remetente
        $mail->addAddress($emailCliente); //quem recebe - destinatário (PODE SER SÓ O EMAIL)

        //CONTEÚDO DO EMAIL
        $mail->isHTML(true);
        $mail->Subject = 'Cadastro de Pré-Matrícula'; //TITULO DO EMAIL
        $mail->Body = $corpoEmail; //HTML QUE SERÁ ENVIADO
        $mail->send(); //REALIZA O ENVIO DA MENSAGEM

        atualizaStatusEmail('Enviado');
    } catch (Exception $e) {

        atualizaStatusEmail('Não enviado');
        echo 'erro';
    }
}
