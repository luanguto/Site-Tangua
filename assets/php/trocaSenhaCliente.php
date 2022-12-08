<?php
//LIBS PARA O ENVIOO DO EMAIL
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//CONEXÃO COM O BANCO
require_once('conexaoDb.php');
$banco = new db();
$conexao = $banco->conexaoDb();

$cpf = $_POST['cpf'];

//VERIFICA SE O CPF EXISTE NO DB
$sqlSelect = "SELECT * FROM clientes WHERE cpf = '$cpf'";

if ($resultadoSelect = mysqli_query($conexao, $sqlSelect)) {

    $registroSelect = mysqli_fetch_array($resultadoSelect);

    if (isset($registroSelect['cpf'])) {

        enviaEmail($registroSelect['nome'], $registroSelect['email'], $registroSelect['id_link']);
    } else {

        echo 'naoExiste';
    }
} else {

    echo 'erroQuery';
}

function enviaEmail($nomeCliente, $email, $id)
{

    $corpoEmail = '
        <div style="background-color: #f4f7fc; padding: 1rem">
            <div style="background: #0355b8; padding: 1rem; border-radius: 10px; margin-bottom: 2rem; text-align: center; ">
                <a href="https://semetangua.com.br" target="_blank"> <img src="https://semetangua.com.br/assets/img/logo_tangua.png" style="max-height: 120px; max-width: 100%"> </a>
            </div>
            <div style="background-color: #fff; border-radius: 10px; padding: 2rem;">
                <h1 style="font-size: 28px; color: #00005c;">Sr(a) ' . $nomeCliente . '</h1>
                <p style="color: #627193; font-size: 18px;">Você solicitou uma troca de senha: <strong><a href="https://semetangua.com.br/trocaSenha.php?link=' . $id . '">Clique aqui para trocar sua senha</a></strong></p> 
                <p style="color: #627193; font-size: 15px; margin-bottom: 3rem;">Em caso de dúvidas, entre em contato com: <a style="font-size: 15px;" href="mailto:matricula@semetangua.com.br">matricula@semetangua.com.br</a> ou pelo nosso whatsapp<a href="https://api.whatsapp.com/send?phone=5521997167361"> (21)99716-7361.</a></p>
            </div>
        </div>
    ';

    require('../lib/vendor/autoload.php'); //Apontar para a pasta com o autoload

    $mail = new PHPMailer(true);

    try {
        //CONFIGURAÇÃO SERVIDOR
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'xxxxxxxx'; //HOST DO SMTP DA HOSPEDAGEM
        $mail->SMTPAuth = true;
        $mail->Username = 'xxxxx@xxxxxx.com.br'; // ACESSO EMAIL
        $mail->Password = 'xxxxxx'; // SENHA ACESSO EMAIL
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465; // PORTA SSL DO HOST SMTP

        //CONFIGURAÇÃO DESTINATÁRIO
        $mail->setFrom('xxxxx@xxxxxxx.com.br', 'Secretaria Municipal de Educação de Tanguá'); //quem está enviando - remetente
        $mail->addAddress($email); //quem recebe - destinatário (PODE SER SÓ O EMAIL)

        //CONTEÚDO DO EMAIL
        $mail->isHTML(true);
        $mail->Subject = 'Solicitação de troca de senha'; //TITULO DO EMAIL
        $mail->Body = $corpoEmail; //HTML QUE SERÁ ENVIADO
        $mail->send(); //REALIZA O ENVIO DA MENSAGEM

    } catch (Exception $e) {

        echo 'erro';
    }
}
