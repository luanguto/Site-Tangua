<!doctype html>
<html lang="pt-BR" class="body">

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
    <title>Login Sistema</title>
</head>

<body class="body">

    <div class="containerCentral">

        <div class="containerFormLogin">

            <form id="cadastroCliente">

                <div class="mb-5 text-center">
                    <h1 class="tituloLogin azul">Cadastre-se <br><strong class="rosa">Pré-Matrícula</strong></h1>
                </div>

                <div class="itemForm mb-4">
                    <label for="nome" class="iconeForm"><i class="fa-solid fa-user"></i></label>
                    <input type="text" class="inputForm" name="nome" id="nome" placeholder="Nome do responsável">
                </div>

                <div class="itemForm mb-4">
                    <label for="cpf" class="iconeForm"><i class="fa-solid fa-address-card"></i></label>
                    <input type="text" class="inputForm" name="cpf" id="cpf" placeholder="Digite seu CPF">
                </div>

                <div class="itemForm mb-4">
                    <label for="telefone" class="iconeForm"><i class="fa-brands fa-whatsapp"></i></label>
                    <input type="text" class="inputForm" name="telefone" id="telefone" placeholder="Whatsapp">
                </div>

                <div class="itemForm mb-4">
                    <label for="email" class="iconeForm"><i class="fa-solid fa-envelope"></i></label>
                    <input type="email" class="inputForm" name="email" id="email" placeholder="Email">
                </div>



                <div class="itemForm  mb-4">
                    <label for="senha" class="iconeForm"><i class="fa-solid fa-lock"></i></label>
                    <input type="password" class="inputForm" name="senha" id="senha" placeholder="Senha">
                </div>

                <div class="text-center mb-3">
                    <span class="avisoForm"></span>
                </div>

                <div class="text-center d-flex flex-column gap-3">
                    <button type="submit" class="btnRosa">Salvar <i class="fa-solid fa-chevron-right"></i></button>
                    <a role="button" href="index.php" class="btnOutLineRosa">Já sou cadastrado</a>
                </div>

            </form>

        </div>
        <!--Fim containerFormLogin-->
    </div>
    <!--Fim containerCentral-->

    <?php include('btnWhatsapp.php') ?>


    <!-- Optional JavaScript; choose one of the two! -->
    <script src="assets/js/cadastro.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>