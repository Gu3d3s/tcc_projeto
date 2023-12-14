<?php

    session_start();
    if (isset($_POST['submit_log']) && !empty($_POST['email_mercado_log']) && !empty($_POST['senha_mercado_log'])){
        include_once('config.php');

        $email = $_POST['email_mercado_log'];
        $senha = $_POST['senha_mercado_log'];
        
        $sql = "SELECT * FROM mercado WHERE email_mercado = '$email' AND senha_mercado = '$senha'";

        $result = $conexao -> query($sql);

        if (mysqli_num_rows($result) < 1){
            unset($_SESSION['email_mercado_log']);
            unset($_SESSION['senha_mercado_log']);
            // header('Location: ong_cadastro.php');
            print_r('acesso negado');
        }else {
            $_SESSION['email_mercado_log'] = $email;
            $_SESSION['senha_mercado_log'] = $senha;
            header('Location: mercado_pag.php');
        }
    }else {
        header('Location: foodCare.php');

    }

?>