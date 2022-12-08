<?php
//LIBS PARA O ENVIOO DO EMAIL
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('../assets/php/conexaoDb.php');
$banco = new db();
$conexao = $banco->conexaoDb();

$sql = "SELECT id_cliente, nome_aluno, escola_origem, primeira_unidade_escola, segunda_unidade_escola, numero_protocolo, NE, AV, status_matricula FROM formulario_cliente where status_matricula = 'Documentação pendente'";

if ($resultado = mysqli_query($conexao, $sql)) {

    while ($registro = mysqli_fetch_array($resultado)) {

        $idCliente = $registro['id_cliente'];
        $sqlCliente = "SELECT * FROM clientes WHERE id = '$idCliente'";

        if ($resultadoCliente = mysqli_query($conexao, $sqlCliente)) {

            $registroCliente = mysqli_fetch_array($resultadoCliente);
        }

        $emailCliente = $registroCliente['email'];

        if ($registro['NE'] == 'Sim' || $registro['AV'] == 'Sim') {
            $envioDoc = '<p style="color: #627193; font-size: 18px;">ENVIE A DOCUMENTAÇÃO DE COMPROVAÇÃO DO ALUNO(a): <strong><a href="https://semetangua.com.br/envioDocumentacao.php?link=' . $registroCliente['id_link'] . '">Clique aqui para realizar o envio da documentação</a></strong></p>';
        } else {
            $envioDoc = '';
        }

        $corpoEmail = '
        <div style="background-color: #f4f7fc; padding: 1rem">
            <div style="background: #0355b8; padding: 1rem; border-radius: 10px; margin-bottom: 2rem; text-align: center; ">
                <a href="https://semetangua.com.br" target="_blank"> <img src="https://semetangua.com.br/assets/img/logo_tangua.png" style="max-height: 120px; max-width: 100%"> </a>
            </div>
            <div style="background-color: #fff; border-radius: 10px; padding: 2rem;">
                <h1 style="font-size: 28px; color: #00005c;">Sr(a) ' . $registroCliente['nome'] . '</h1>
                <p style="color: #627193; font-size: 18px;">Número de protocolo: <strong>' . $registro['numero_protocolo'] . '</strong></p>
                <p style="color: #627193; font-size: 18px;">Aluno(a): <strong>' . $registro['nome_aluno'] . '</strong></p>
                <p style="color: #627193; font-size: 18px;"> Olá, vimos que você realizou a pré-matrícula do seu filho(a) e marcou a opção "alta vulnerabilidade" e/ou "necessidade especial", então estamos passando para lembrar que amanhã(30/11) é o último dia para a realizar o envio dos documentos comprobatórios ou procurar a secretaria municipal de educação. <strong></strong></p>
                <br>
                ' . $envioDoc . '
                <br>
                <p style="background-color: #c9ddff; display: inline; padding: .5rem; color: #627193; font-size: 18px; border-radius: 5px;">Status: <strong>' . $registro['status_matricula'] . '</strong></p>
                <p style="color: #627193; font-size: 15px; margin-bottom: 3rem;">Em caso de dúvidas, entre em contato com: <a style="font-size: 15px;" href="mailto:matricula@semetangua.com.br">matricula@semetangua.com.br</a> ou pelo nosso whatsapp<a href="https://api.whatsapp.com/send?phone=5521997167361"> (21)99716-7361.</a></p>
            </div>
        </div>
    ';

        enviaEmail($emailCliente, $corpoEmail, $registro['numero_protocolo']);

        sleep(15);
    }
}


function enviaEmail($email, $textEmail, $protocolo)
{

    require('../assets/lib/vendor/autoload.php'); //Apontar para a pasta com o autoload

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
        $mail->Subject = 'Documentação pendente'; //TITULO DO EMAIL
        $mail->Body = $textEmail; //HTML QUE SERÁ ENVIADO
        $mail->send(); //REALIZA O ENVIO DA MENSAGEM

        atualizaStatusEmail('Enviado', $protocolo);
    } catch (Exception $e) {

        atualizaStatusEmail('Não enviado', $protocolo);
        echo 'erro';
    }
}

function atualizaStatusEmail($status, $protocolo)
{

    global $conexao;

    $sqlUpdate = "UPDATE formulario_cliente SET status_email = '$status' WHERE numero_protocolo = '$protocolo'";

    mysqli_query($conexao, $sqlUpdate);
}
