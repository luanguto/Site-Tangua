<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>CadastroDocumentacao</title>
</head>

<body>

</body>

</html>

<?php
//CONEXÃO COM O BANCO
require_once('conexaoDb.php');
$banco = new db();
$conexao = $banco->conexaoDb();

$id = $_POST['id'];

//ARQUIVOS NECESSIDADE ESPECIAL
if (isset($_FILES["ne"]["name"])) {
    $arquivoNe = $_FILES["ne"]["tmp_name"];
    $tamanhoNe = $_FILES["ne"]["size"];
    $tipoNe = $_FILES["ne"]["type"];
    $nomeNe = $_FILES["ne"]["name"];
}

//ARQUIVOS ALTA VULNERABILIDADE

if (isset($_FILES["av"]["name"])) {
    $arquivoAv = $_FILES["av"]["tmp_name"];
    $tamanhoAv = $_FILES["av"]["size"];
    $tipoAv = $_FILES["av"]["type"];
    $nomeAv = $_FILES["av"]["name"];
}


if (isset($arquivoNe) && ($arquivoNe != "none" && $_FILES["ne"]["name"] != '')) {

    $fpNe = fopen($arquivoNe, "rb");
    $conteudoNe = fread($fpNe, $tamanhoNe);
    $conteudoNe = addslashes($conteudoNe);
    fclose($fpNe);

    $updateNe = "UPDATE formulario_cliente SET arq_ne = '$conteudoNe', tipo_arq_ne = '$tipoNe', status_matricula = 'Documentação Enviada' WHERE id = '$id'";

    if (mysqli_query($conexao, $updateNe)) {

        echo '';
    } else {

        echo 'erroQuery';
    }
} else {
    echo '';
}

if (isset($arquivoAv) && ($arquivoAv != "none" && $_FILES["av"]["name"] != '')) {

    $fpAv = fopen($arquivoAv, "rb");
    $conteudoAv = fread($fpAv, $tamanhoAv);
    $conteudoAv = addslashes($conteudoAv);
    fclose($fpAv);

    $updateAv = "UPDATE formulario_cliente SET arq_av = '$conteudoAv', tipo_arq_av = '$tipoAv', status_matricula = 'Documentação Enviada' WHERE id = '$id'";

    if (mysqli_query($conexao, $updateAv)) {

        exibeConfirmacao();
    } else {

        echo 'erroQuery';
    }
} else {
    exibeConfirmacao();
}


function exibeConfirmacao()
{
    echo '
        <script>
            Swal.fire({
                    title: "Sucesso",
                    text: "Seus documentos foram enviados com sucesso",
                    icon: "success",
                    button: "Fechar",
                }).then(result => {
                    if (result) {
                        window.location.href = "../../areaCliente.php";
                    }
                });
        </script>
    ';
}
