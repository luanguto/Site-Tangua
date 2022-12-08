<?php
session_start();
if (!isset($_SESSION['nome']) && !isset($_SESSION['cargo'])) {
    header("Location: ../../index.php");
}

//CONEXÃO COM O BANCO
require_once('../assets/php/conexaoDb.php');
$banco = new db();
$conexao = $banco->conexaoDb();

$id = $_GET['id'];
$doc = $_GET['doc'];

$sqlSelect = "SELECT * FROM formulario_cliente WHERE id = '$id'";

if ($resultado = mysqli_query($conexao, $sqlSelect)) {

    $registro = mysqli_fetch_array($resultado);
} else {

    echo 'erroQuery';
    die();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Documento Aluno</title>
</head>

<body>

    <?php

    if ($doc == 'ne') {

        if ($registro['tipo_arq_ne'] != 'application/pdf') {

            echo '<div class="container"><div class="row"><div class="col-12"><img src="data:image/bmp;base64,' . base64_encode($registro['arq_ne']) . '" class="img-fluid"></div></div></div>';
        } else {

            $ficheiro = $registro['arq_ne'];

            // cabeçalho identificador para o navegador
            header("Content-type: application/pdf; name='pdf'");

            header("Content-Disposition: filename=documentacao.pdf");

            header("Pragma: no-cache");

            // faz saída para o navegador
            print $ficheiro;
        }
    }

    if ($doc == 'av') {

        if ($registro['tipo_arq_av'] != 'application/pdf') {

            echo '<div class="container"><div class="row"><div class="col-12"><img src="data:image/bmp;base64,' . base64_encode($registro['arq_av']) . '" class="img-fluid"></div></div></div>';
        } else {

            $ficheiro = $registro['arq_av'];

            // cabeçalho identificador para o navegador
            $ficheiro = $registro['arq_av'];

            // cabeçalho identificador para o navegador
            header("Content-type: application/pdf; name='pdf'");

            header("Content-Disposition: filename=documentacao.pdf");

            header("Pragma: no-cache");

            // faz saída para o navegador
            print $ficheiro;
        }
    }

    ?>




    <!-- Optional JavaScript; choose one of the two! -->
    <script src="assets/js/exportaExcel.js"></script>
    <script src="assets/js/areaAdm.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>