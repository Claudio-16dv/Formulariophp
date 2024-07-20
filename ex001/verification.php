<?php 
    session_start();
    echo"Bem-Vindo";

    if (! isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();
    }
?>