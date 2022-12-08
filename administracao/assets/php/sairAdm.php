<<?php
    session_start();
    if (!isset($_SESSION['nome'])) {
        header("Location: ../../index.php");
    }

    unset($_SESSION['id']);
    unset($_SESSION['email']);
    unset($_SESSION['nome']);
    unset($_SESSION['cargo']);

    header("Location: ../../index.php");
