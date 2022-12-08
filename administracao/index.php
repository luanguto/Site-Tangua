<!doctype html>
<html lang="pt-BR">

<head class="body">
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
    <link rel="icon" href="../assets/img/favIcon.jpg">
    <title>Login Sistema</title>
</head>

<body class="body">

    <div class="containerCentral">
        <div>
            <img src="../assets/img/logo_tangua.png" alt="Logo tangua" class="img-fluid">
        </div>

        <div class="containerFormLogin">

            <form id="loginAdm">

                <div class="mb-5">
                    <h1 class="tituloLogin azul">Acesso <strong class="rosa">Administrativo</strong></h1>
                </div>

                <div class="itemForm mb-4">
                    <label for="email" class="iconeForm"><i class="fa-solid fa-envelope"></i></label>
                    <input type="email" class="inputForm" name="email" id="email" placeholder="Digite seu email">
                </div>

                <div class="itemForm  mb-4">
                    <label for="senha" class="iconeForm"><i class="fa-solid fa-lock"></i></label>
                    <input type="password" class="inputForm" name="senha" id="senha" placeholder="Senha">
                </div>

                <div class="text-center mb-3">
                    <span class="avisoForm"></span>
                </div>

                <div class="text-center d-flex flex-column gap-3">
                    <button type="submit" class="btnRosa">Entrar <i class="fa-solid fa-chevron-right"></i></button>
                </div>

            </form>

        </div>
        <!--fim containerFormLogin-->
    </div>
    <!--Fim containerCentral-->

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="assets/js/index.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>