<?php
    session_start();
    unset($_SESSION['email_ong_log']);
    unset($_SESSION['senha_ong_log']);
    header('Location: foodCare.php')
?>