<nav class="navbar navbar-expand-lg barraNavCliente mb-5">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="assets/img/logo_tangua.png" class="logoHeader" alt="Logo tangua"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars branco"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link branco" aria-current="page" href="areaCliente.php">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link branco" href="assets/php/sairCliente.php">Sair</a>
                </li>
            </ul>
            <div class="containerUsuarioHeader">
                <span class="nomeHeader"><?php echo $_SESSION['nome'] ?></span>
                <span class="cpfHeader">CPF: <?php echo $_SESSION['cpf'] ?></span>
            </div>
        </div>
        <!--Fim collapse-->
    </div>
    <!--Fim container-->
</nav>