<?php
$cpf = isset($_GET['cpf']) ?  $_GET['cpf'] : '';

//header("Location: https://tangua.rj.gov.br");

?>

<!doctype html>
<html lang="pt-BR" class="body">

<head>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-P5JJH3EK17%22%3E"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-P5JJH3EK17');
    </script>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Bootstrap CSS -->
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="assets/css/custom.css" rel="stylesheet">
    <!--JQUERY-->
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

            <form id="loginCliente">

                <div class="mb-4">
                    <h1 class="tituloLogin azul text-center">Bem vindo à <strong class="rosa">Pré-Matrícula</strong></h1>
                </div>

                <div class="itemForm mb-3">
                    <label for="cpf" class="iconeForm"><i class="fa-solid fa-user"></i></label>
                    <input type="text" class="inputForm" name="cpf" id="cpf" placeholder="Digite seu CPF" value="<?php echo $cpf; ?>">
                </div>

                <div class="itemForm  mb-3">
                    <label for="senha" class="iconeForm"><i class="fa-solid fa-lock"></i></label>
                    <input type="password" class="inputForm" name="senha" id="senha" placeholder="Senha">
                </div>

                <div class="text-center mb-3">
                    <span class="avisoForm"></span>
                </div>

                <div class="text-center d-flex flex-column gap-3">
                    <button type="submit" class="btnRosa">Entrar <i class="fa-solid fa-chevron-right"></i></button>
                    <a role="button" href="cadastro.php" class="btnOutLineRosa">Cadastre-se</a>
                </div>

            </form>

            <div class="text-center mt-4">
                <a href="#modalTrocaSenha" data-bs-toggle="modal" class=" text-decoration-none">Esqueci minha senha</a>
            </div>

        </div>
        <!--fim containerFormLogin-->
    </div>
    <!--Fim containerCentral-->

    <!-- Modal -->
    <div class="modal fade" id="modalTrocaSenha" tabindex="-1" aria-labelledby="modalTrocaSenhaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTrocaSenhaLabel">Troca de senha</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="formTrocaSenha">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="cpfTrocaSenha" class="form-label">Informe seu CPF</label>
                                        <input type="text" class="form-control" id="cpfTrocaSenha" name="cpf" placeholder="CPF Aqui!">
                                    </div>
                                </div>
                                <!--Fim col-->
                            </div>
                            <!--Fim row-->
                    </div>
                    <!--Fim container fluid-->
                </div>
                <div class="modal-footer">
                    <a role="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</a>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <?php include('btnWhatsapp.php') ?>

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