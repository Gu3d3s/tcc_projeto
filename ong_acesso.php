<?php

    session_start();
    if (isset($_POST['submit_log']) && !empty($_POST['email_ong_log']) && !empty($_POST['senha_ong_log'])){
        include_once('config.php');

        $email = $_POST['email_ong_log'];
        $senha = $_POST['senha_ong_log'];
        
        $sql = "SELECT * FROM ong WHERE email_ong = '$email' AND senha_ong = '$senha'";

        $result = $conexao -> query($sql);

        if (mysqli_num_rows($result) < 1){
            unset($_SESSION['email_ong_log']);
            unset($_SESSION['senha_ong_log']);
            // header('Location: ong_cadastro.php');
            print_r('acesso negado');
        }else {
            $_SESSION['email_ong_log'] = $email;
            $_SESSION['senha_ong_log'] = $senha;
            header('Location: ong_pag.php');
        }
    }else {
        header('Location: foodCare.php');

    }

?>