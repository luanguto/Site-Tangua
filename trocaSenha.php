<?php
$id = isset($_GET['link']) ?  $_GET['link'] : '';

if (!isset($_GET['link'])) {

    //header("Location: index.php");
}

?>

<!doctype html>
<html lang="pt-BR">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="assets/css/custom.css" rel="stylesheet">
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--FONTAWESOME-->
    <script src="https://kit.fontawesome.com/59f636855b.js" crossorigin="anonymous"></script>

    <!-- SWEET-ALERT -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="assets/img/favIcon.jpg">
    <title>Envio Documentação</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg barraNavCliente mb-5">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="assets/img/logo_tangua.png" class="logoHeader" alt="Logo tangua"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars branco"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link branco" aria-current="page" href="index.php">Login</a>
                    </li>
                </ul>
            </div>
            <!--Fim collapse-->
        </div>
        <!--Fim container-->
    </nav>


    <div class="container">

        <div class="bgBranco p-3 rounded">
            <div class="row text-center">
                <h1 class="tituloPag">
                    Digite sua nova senha
                </h1>
            </div>

            <form id="FormnovaSenha">
                <input type="text" id="id" name="id" value="<?php echo $id; ?>" class="d-none">
                <div class="row justify-content-center">

                    <div class="col-md-6 col-xl-3">
                        <div class="mb-3">
                            <label for="novaSenha" class="form-label">Nova senha</label>
                            <input type="password" class="form-control" id="novaSenha" name="novaSenha" placeholder="Digite sua senha">
                        </div>

                        <div class="row mt-4 p-3">
                            <button type="submit" class="btnRosa">Enviar</button>
                        </div>

                    </div>

                </div>
                <!--Fim row-->


            </form>
        </div>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="assets/js/trocaSenha.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>