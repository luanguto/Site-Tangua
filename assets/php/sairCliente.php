<<?php
    session_start();
    if (!isset($_SESSION['nome'])) {
        header("Location: ../../index.php");
    }

    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    unset($_SESSION['email']);

    header("Location: ../../index.php");
