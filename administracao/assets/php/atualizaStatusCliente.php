<?php
//LIBS PARA O ENVIOO DO EMAIL
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//CONEXÃO COM O BANCO
session_start();
if (!isset($_SESSION['nome']) && !isset($_SESSION['cargo'])) {
    header("Location: ../../index.php");
}

//CONEXÃO COM O BANCO
require_once('../../../assets/php/conexaoDb.php');
$banco = new db();
$conexao = $banco->conexaoDb();

$status = $_GET['status'];
$id = $_GET['id'];
$cliente = [];

$sqlAtualizaStatus = "UPDATE formulario_cliente SET status_matricula = '$status' WHERE id = '$id'";
$sqlRecuperaFormulario = "SELECT * FROM formulario_cliente WHERE id = '$id'";


//REALIZA A CONSULTA DOS DADOS FORMULARIO
if ($resultadoFormularioCliente =  mysqli_query($conexao, $sqlRecuperaFormulario)) {

    $registroFormularioCliente = mysqli_fetch_array($resultadoFormularioCliente);

    array_push($cliente, $registroFormularioCliente['nome_aluno'], $registroFormularioCliente['id_cliente']);
} else {
    echo 'erroQuery';
    die();
}

//REALIZA A CONSULTA DOS DADOS CLIENTE
$idCliente = $cliente[1];
$slqConsultaCliente = "SELECT * FROM clientes WHERE id = '$idCliente'";

if ($resultadoCliente =  mysqli_query($conexao, $slqConsultaCliente)) {

    $registroCliente = mysqli_fetch_array($resultadoCliente);

    array_push($cliente, $registroCliente['nome'], $registroCliente['email']);
} else {
    echo 'erroQuery';
    die();
}

//REALIZA A ATUALIZACAO DO CLIENTE
if (mysqli_query($conexao, $sqlAtualizaStatus)) {

    enviaEmailStatus($cliente[2], $status, $cliente[0], $cliente[3]);
} else {

    echo 'erroQuery';
    die();
}


function enviaEmailStatus($nomeCliente, $status, $aluno, $email)
{

    $corpoEmail = '
        <div style="background-color: #f4f7fc; padding: 1rem">
            <div style="background: #0355b8; padding: 1rem; border-radius: 10px; margin-bottom: 2rem; text-align: center; ">
                <a href="https://semetangua.com.br" target="_blank"> <img src="https://semetangua.com.br/assets/img/logo_tangua.png" style="max-height: 120px; max-width: 100%"> </a>
            </div>
            <div style="background-color: #fff; border-radius: 10px; padding: 2rem;">
                <h1 style="font-size: 28px; color: #00005c;">Sr(a) ' . $nomeCliente . '</h1>
                <p style="color: #627193; font-size: 18px;">Nome do aluno: <strong>' . $aluno . '</strong></p>
                <p style="background-color: #c9ddff; display: inline; padding: .5rem; color: #627193; font-size: 18px; border-radius: 5px;">Status: <strong>' . $status . '</strong></p>
                <p style="color: #627193; font-size: 15px; margin-bottom: 3rem;">Em caso de dúvidas, entre em contato com: <a style="font-size: 15px;" href="mailto:matricula@semetangua.com.br">matricula@semetangua.com.br</a> ou pelo nosso whatsapp<a href="https://api.whatsapp.com/send?phone=5521997167361"> (21)99716-7361.</a></p>
            </div>
        </div>
    ';

    require('../../../assets/lib/vendor/autoload.php'); //Apontar para a pasta com o autoload

    $mail = new PHPMailer(true);

    try {
       //CONFIGURAÇÃO SERVIDOR
       $mail->CharSet = 'UTF-8';
       $mail->SMTPDebug = SMTP::DEBUG_SERVER;
       $mail->isSMTP();
       $mail->Host = 'xxxxx'; //HOST DO SMTP DA HOSPEDAGEM
       $mail->SMTPAuth = true;
       $mail->Username = 'xxxx@xxxxx.com.br'; // ACESSO EMAIL
       $mail->Password = 'xxxxxx'; // SENHA ACESSO EMAIL
       $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
       $mail->Port = 465; // PORTA SSL DO HOST SMTP

       //CONFIGURAÇÃO DESTINATÁRIO
       $mail->setFrom('xxxxx@xxxxxx.com.br', 'Secretaria Municipal de Educação de Tanguá'); //quem está enviando - remetente
       $mail->addAddress($email); //quem recebe - destinatário (PODE SER SÓ O EMAIL)

        //CONTEÚDO DO EMAIL
        $mail->isHTML(true);
        $mail->Subject = 'Atualização de status'; //TITULO DO EMAIL
        $mail->Body = $corpoEmail; //HTML QUE SERÁ ENVIADO
        $mail->AltBody = 'Apenas uma mensagem de teste Agora com a tag bold\n texto segunda linha'; //CONTEUDO SEM O HTML

        $mail->send(); //REALIZA O ENVIO DA MENSAGEM

    } catch (Exception $e) {

        echo 'erro';
    }
}
