<?php
    session_start();
    unset($_SESSION['email_mercado_log']);
    unset($_SESSION['senha_mercado_log']);
    header('Location: foodCare.php')
?>