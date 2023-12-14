<?php
        // use PHPMailer\PHPMailer\PHPMailer;
        // use PHPMailer\PHPMailer\Exception;
        
        // require 'src/Exception.php';
        // require 'src/PHPMailer.php';
        // require 'src/SMTP.php';

        include_once('config.php');
        session_start();
        $email_ong = $_GET['?email_user'];
        $sql = "SELECT * FROM ong WHERE email_ong = '$email_ong'";
        $id_query = mysqli_fetch_assoc(mysqli_query($conexao, $sql));
        $id = $id_query['id_ong'];
        $nome_query = mysqli_fetch_assoc(mysqli_query($conexao, $sql));
        $nome = $nome_query['nome_ong'];
        $result = $conexao -> query($sql);
        $rslt_text = mysqli_query($conexao, "SELECT * FROM ong_txts WHERE user_id = '$id'");
        $vs = mysqli_query($conexao, "SELECT * FROM ong_rel WHERE id_ong_rel = '$id'");
        $count_rels = implode(mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) FROM ong_rel WHERE id_ong_rel = '$id'")));
        $avg_confi = implode(mysqli_fetch_assoc(mysqli_query($conexao, "SELECT AVG(confi) FROM ong_rel")));
        $avg_ag = implode(mysqli_fetch_assoc(mysqli_query($conexao, "SELECT AVG(agilidade) FROM ong_rel")));

    //     if(isset($_POST['send_email_ong'])){
    //         $mail = new PHPMailer(true);
    //         $mail->isSMTP();

    //         $mail->SMTPAuth = true; //Habilita a autenticação SMTP
    //         $mail->Username   = $_SESSION['email_mercado_log'];
    //         $mail->Password   = 'qazwsxedc15243!1';
            
    //         $mail->SMTPSecure = 'ssl';
    // // Informações específicadas pelo Google
    //         $mail->Host = 'smtp.email.com';
    //         $mail->Port = 58988;

    //         $mail->setFrom($_SESSION['email_mercado_log']);
    //         $mail->addAddress($email_ong);

    //         $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
    //         $mail->Subject = 'Teste Envio de Email';
    //         $mail->Body = $_POST['email_ongg'];

    //         $mail->send();
        // }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="ong_pag.css?v=<?php echo time(); ?>">
    <title>foodCare | ONG</title>
</head>
<body>
<nav class="menu">
        <div class="theme">
            <a href="#" class="we">Sobre Nós</a>
            <span class="material-symbols-outlined" id="mode">
                routine
                </span>
        </div>
        <a href="foodCare.php"><h2>FoodCare</h2></a>
        
        <a href="pesquisa.php">
            <span class="material-symbols-outlined globe">
                globe
            </span>
        </a>
    </nav>

    <div class="panel">
        <div class="me">
            <?php
                echo "<p class='txt'>#" . $id . "</p>";
                while($user_data = mysqli_fetch_assoc($result)){
                    echo "<p class='nameLogo record'>" . $user_data['nome_ong'] . "</p>";
                    echo "<p class='space0 record'>" . $user_data['email_ong'] . "</p>";
                    echo "<p class='record'>" . $user_data['endereco_ong'] . "</p>";
                    echo "<p class='space1 record'>" . $user_data['telefone_ong'] . "</p>";
                }
                echo "<hr>";
                while($user_sentence = mysqli_fetch_assoc($rslt_text)){
                    echo "<p class='title_txt'>" . $user_sentence['titulo'] . "</p>";
                    echo "<p class='txt'>" . $user_sentence['texto'] . "</p>";
                }
            
            ?>
            <!-- <form class="form" method="POST">
            <span class="title">Envie um email para <?php echo $nome?>.</span>
                <div>
                <input placeholder="sua mensagem" type="text" name="email_ongg" id="email-address" required>
                <input type="submit" value="enviar" class="button" name="send_email_ong">
            </div>
            </form> -->
        </div>
        <div class="task">
            <div class="assess">
                <?php
                echo "<br>";
                $count = 0;
                    if($count_rels > 0){
                        echo "<p class='ttop top'>Visão geral</p><br>";
                        echo "<p class='top'>número de transições:</p><br>";
                        echo "<p>" . $count_rels . "</p><br>";
                        echo "<p class='top'>agilidade</p><br>";
                        echo "<p>" . number_format($avg_confi/$count_rels, 1, '.', '') . "/10</p><br>";
                        echo "<p class='top'>confiança</p><br>";
                        echo "<p>" . number_format($avg_ag/$count_rels, 1, '.', '') . "/10</p><br>";
                        $count += 1;
                    }else{
                        echo "<p class='ttop top'>Visão geral</p><br>";
                        echo "<p class='top'>número de transições:</p><br>";
                        echo "<p > nenhum dado </p><br>";
                        echo "<p class='top'>agilidade:</p><br>";
                        echo "<p> nenhum dado </p><br>";
                        echo "<p class='top'>confiança:</p><br>";
                        echo "<p> nenhum dado </p><br>";
                    }
                ?>
            </div>
            <!-- <?php
                // while($user_sentence = mysqli_fetch_assoc($rslt_text)){
                //     echo "<p class='title_txt'>" . $user_sentence['titulo'] . "</p>";
                //     echo "<p class='txt'>" . $user_sentence['texto'] . "</p>";
                // }
            ?> -->

        </div>
    </div>


    <script>

        var icon = document.getElementById('mode')

        icon.onclick = function(){
            document.body.classList.toggle('dark-theme')
        }

    </script>

</body>
</html>