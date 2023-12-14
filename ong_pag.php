<?php
    session_start();
    include_once('config.php');
    if ((!isset($_SESSION['email_ong_log']) == true) && (!isset($_SESSION['senha_ong_log']) == true)){
        unset($_SESSION['email_ong_log']);
	    unset($_SESSION['senha_ong_log']);
	    header('Location: foodCare.php');
    }else {
        $email = $_SESSION['email_ong_log'];
        $sql = "SELECT * FROM ong WHERE email_ong = '$email'";
        $id_query = mysqli_fetch_assoc(mysqli_query($conexao, $sql));
        $id = $id_query['id_ong'];
        $nome_query = mysqli_fetch_assoc(mysqli_query($conexao, $sql));
        $nome = $nome_query['nome_ong'];
        $result = $conexao -> query($sql);
        $rslt_text = mysqli_query($conexao, "SELECT * FROM ong_txts WHERE user_id = '$id'");
        $vs = mysqli_query($conexao, "SELECT * FROM ong_aval WHERE aval_id = '$id'");
        $email_query = mysqli_fetch_assoc(mysqli_query($conexao, $sql));
        $em = $email_query['email_ong'];
        $tel_query = mysqli_fetch_assoc(mysqli_query($conexao, $sql));
        $tel = $tel_query['telefone_ong'];
        
    };

    if (isset($_POST['ong_text_sub'])){
        
        $title = $_POST['ong_title'];
        $text = $_POST['ong_text'];

        $delet = mysqli_query($conexao, "DELETE FROM ong_txts WHERE user_id = '$id'");
        $txt_query = mysqli_query($conexao, "INSERT INTO ong_txts (titulo, texto, user_id)
        VALUES ('$title', '$text', '$id')");
        header('Location: ong_pag.php');

    };
    if (isset($_POST['bt_start'])){

        $delet_insert_nome_id = mysqli_query($conexao, "DELETE FROM ong_lista WHERE ong_id = '$id'");
        $insert_nome_id = mysqli_query($conexao, "INSERT INTO ong_lista(nome_ong, em_ong, tel_ong, ong_id)
        VALUES('$nome', '$em', '$tel', '$id')");
    };
    if (isset($_POST['bt_end'])){

        $delet_ong_nome_id = mysqli_query($conexao, "DELETE FROM ong_lista WHERE ong_id = '$id'");
    }
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
                while($user_data = mysqli_fetch_assoc($result)){
                    $_SESSION['sid'] = $user_data['id_ong'];
                    // printf($_SESSION['sid']);
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
            <form class="apre" method="POST">
                <div class="apre_title">Sobre Nós</div>
                <input type="text" placeholder="Título" class="apre_input" name="ong_title" required>
                <textarea placeholder="Mensagem(máximo de 500 caracteres)" name="ong_text" required></textarea>
                
                <input type="submit" class="buton" value="enviar" name="ong_text_sub">
            <div class="bts">
            <a href="sair.php" class="exit">sair</a>
            <?php
                echo "<a href='ong_edit.php??id=$id' class='up exit'>editar</a>"
            ?>
            </div>
            </form>
        </div>
        <div class="task">
        <form class="form_bts" method="POST">
                    <input type="submit" class="bt_start" name="bt_start" value="Estou pronto!">
                    <input type="submit" class="bt_end" name="bt_end" value="por enquanto é só">
                </form>
            <div class="assess">
                <?php
                $count = 0;
                    while($ong_desc = mysqli_fetch_assoc($vs)){
                        echo "<p class='ttop top'>Visão geral</p><br>";
                        echo "<p class='top'>número de transições:</p><br>";
                        echo "<p>" . $ong_desc['transicoes'] . "</p><br>";
                        echo "<p class='top'>agilidade</p><br>";
                        echo "<p>" . $ong_desc['agilidade'] . "</p><br>";
                        echo "<p class='top'>confiança</p><br>";
                        echo "<p>" . $ong_desc['confianca'] . "</p><br>";
                        $count += 1;
                    };
                    if ($count < 1){
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
            <?php
                while($user_sentence = mysqli_fetch_assoc($rslt_text)){
                    echo "<p class='title_txt'>" . $user_sentence['titulo'] . "</p>";
                    echo "<p class='txt'>" . $user_sentence['texto'] . "</p>";
                }
            ?>

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