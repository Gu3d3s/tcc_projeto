<?php
    session_start();
    include_once('config.php');
    if ((!isset($_SESSION['email_mercado_log']) == true) && (!isset($_SESSION['senha_mercado_log']) == true)){
        unset($_SESSION['email_mercado_log']);
	    unset($_SESSION['senha_mercado_log']);
	    header('Location: foodCare.php');
    }else {
        $email = $_SESSION['email_mercado_log'];
        $sql = "SELECT * FROM mercado WHERE email_mercado = '$email'";
        $id_query = mysqli_fetch_assoc(mysqli_query($conexao, $sql));
        $id = $id_query['id_mercado'];
        $nome_query = mysqli_fetch_assoc(mysqli_query($conexao, $sql));
        $nome = $nome_query['nome_mercado'];
        $result = $conexao -> query($sql);
        $rslt_text = mysqli_query($conexao, "SELECT * FROM mercado_txts WHERE user_id = '$id'");
        $lista_al = mysqli_query($conexao, "SELECT * FROM lista_alimentos WHERE user_id = '$id'");
        $email_query = mysqli_fetch_assoc(mysqli_query($conexao, $sql));
        $em = $email_query['email_mercado'];
        $tel_query = mysqli_fetch_assoc(mysqli_query($conexao, $sql));
        $tel = $tel_query['telefone_mercado'];
        // $vs = mysqli_query($conexao, "SELECT * FROM mercado_aval WHERE aval_id = '$id'");
        
    };

    if (isset($_POST['mercado_text_sub'])){
        
        $title = $_POST['mercado_title'];
        $text = $_POST['mercado_text'];

        $delet = mysqli_query($conexao, "DELETE FROM mercado_txts WHERE user_id = '$id'");
        $txt_query = mysqli_query($conexao, "INSERT INTO mercado_txts (titulo, texto, user_id)
        VALUES ('$title', '$text', '$id')");

        header('Location: mercado_pag.php');

        
    };
    if (isset($_POST['sub_alimentos'])){
        $al = $_POST['alimento'];
        $qtd = $_POST['qtd_alimento'];
        $data = $_POST['data_alimento'];

        $insert_food = mysqli_query($conexao, "INSERT INTO lista_alimentos(nome, qtd, data_al, user_id)
        VALUES ('$al','$qtd','$data','$id')");
        header('Location: mercado_pag.php');

    };
    // $delete_al = 0;
    // if (isset($_POST['delete_f'])){
    //     if ($delete_al > 0 ){
    //         $d_al = mysqli_query($conexao, "DELETE FROM lista_alimentos WHERE alimento_id = '$delete_al'");
    //         header('Location: mercado_pag.php');
    //     }
    //
    if (isset($_POST['bt_start_m'])){

        $delet_insert_nome_id_m = mysqli_query($conexao, "DELETE FROM mercado_lista WHERE mercado_id = '$id'");
        $insert_nome_id_m = mysqli_query($conexao, "INSERT INTO mercado_lista(nome_mercado, em_mercado, tel_mercado, mercado_id)
        VALUES('$nome', '$em', '$tel','$id')");
    };
    if (isset($_POST['bt_end_m'])){

        $delet_mercado_nome_id = mysqli_query($conexao, "DELETE FROM mercado_lista WHERE mercado_id = '$id'");
    };
    if(isset($_POST['sub_ong'])){

        $ong_id_rel = $_POST['ong_id'];
        $ong_conf = $_POST['confi'];
        $ong_agil = $_POST['agil'];
        $ong_data_rel = $_POST['data_rel'];

        $sub_ong = mysqli_query($conexao, "INSERT INTO ong_rel (confi, agilidade, data_rel, mercado_rel_id, id_ong_rel)
        VALUES ('$ong_conf', '$ong_agil', '$ong_data_rel', '$id', '$ong_id_rel')");

        header('Location: mercado_pag.php');

    };
    if(isset($_POST['delete_all'])){ 

        $sql = mysqli_query($conexao, "DELETE FROM lista_alimentos WHERE user_id='$id'");
        
        
        header('Location: mercado_pag.php');
    
    };
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="mercado_pag.css?v=<?php echo time(); ?>">
    <title>foodCare | mercado</title>
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
                    $_SESSION['sid'] = $user_data['id_mercado'];
                    // printf($_SESSION['sid']);
                    echo "<p class='nameLogo record'>" . $user_data['nome_mercado'] . "</p>";
                    echo "<p class='space0 record'>" . $user_data['email_mercado'] . "</p>";
                    echo "<p class='record'>" . $user_data['endereco_mercado'] . "</p>";
                    echo "<p class='space1 record'>" . $user_data['telefone_mercado'] . "</p>";
                }
                echo "<hr>";
                while($user_sentence = mysqli_fetch_assoc($rslt_text)){
                    echo "<p class='title_txt'>" . $user_sentence['titulo'] . "</p>";
                    echo "<p class='txt'>" . $user_sentence['texto'] . "</p>";
                }
            ?>
            <form class="apre" method="POST">
                <div class="apre_title">Sobre Nós</div>
                <input type="text" placeholder="Título" class="apre_input" name="mercado_title" required>
                <textarea placeholder="Sua mensagem(máximo de 500 caracteres)" name="mercado_text" required></textarea>
                
                <input type="submit" class="button" value="enviar" name="mercado_text_sub">
            <div class="bts">
            <a href="sair.php" class="exit">sair</a>
            <?php
                echo "<a href='mercado_edit.php??id=$id' class='up exit'>editar</a>"
            ?>
            </div>
            </form>
        </div>
        <div class="task">
        
        <form class="form_bts" method="POST">
                    <input type="submit" class="bt_start" name="bt_start_m" value="Estou pronto!">
                    <input type="submit" class="bt_end" name="bt_end_m" value="por enquanto é só">
                </form>

        <form class="alimentos_form" action="mercado_pag.php" method="POST">
            <input type="number" name="ong_id" id="" placeholder="#id ong" class="input id_on" required>
            <input type="number" name="confi" id="" placeholder="confiança" class="input id_on qtd_al" required>
            <input type="number" name="agil" id="" placeholder="agilidade" class="input id_on qtd_al" required>
            <input type="date" name="data_rel" id="" class="input qtd_al" required>

            <input type="submit" class="learn-more" value="informar" name="sub_ong">
        </form>

        <form class="alimentos_form" method="POST" action="mercado_pag.php">
            <input type="text" name="alimento" class="input" placeholder="alimento" required>
            <input type="number" name="qtd_alimento" class="input qtd_al" placeholder="quantidade" required>
            <input type="date" name="data_alimento" class="input qtd_al" required>
            <input type="submit" class="learn-more" value="adicionar" name="sub_alimentos">
        </form>
        <div>
        <table class="tbl">
            <thead>
                <tr>
                    <th class="col0">Alimento</th>
                    <th class="col0 ml">quantidade</th>
                    <th class="col0 ml">prazo val.</th>
                    <!-- <th class="col0 ml"><form method='POST'>                        
                        <input type='submit' class='delete ml' value='-1 linha' name='delete_f'>
                        </form>
                    </th> -->
                    <th class="col0 m2"><form method='POST'>                        
                        <input type='submit' class='delete ml' value='apagar' name='delete_all'>
                        </form>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($al_col = mysqli_fetch_assoc($lista_al)){
                        echo "<tr>";
                        $delete_al = $al_col['alimento_id'];
                        echo "<td class='col1'>" . $al_col['nome'] . "</td>";
                        echo "<td class='col1 ml'>" . $al_col['qtd'] . "</td>";
                        echo "<td class='col1 ml'>" . $al_col['data_al'] . "</td>";
                        // if(isset($_POST['delete_f'])){ 

                        //     $sql = mysqli_query($conexao, "DELETE FROM lista_alimentos WHERE alimento_id='$delete_al'");
                        //     $conexao->close();    
                            
                        //     header('Location: mercado_pag.php');
                        
                        // }
                        // if(isset($_POST['delete_all'])){ 

                        //     $sql = mysqli_query($conexao, "DELETE FROM lista_alimentos WHERE user_id='$id'");
                            
                            
                        //     header('Location: .');
                        
                        // };
                    }
                        ?>
                
            </tbody>
        </table>
        </div>
        
            <!-- <?php
                while($user_sentence = mysqli_fetch_assoc($rslt_text)){
                    echo "<p class='title_txt'>" . $user_sentence['titulo'] . "</p>";
                    echo "<p class='txt'>" . $user_sentence['texto'] . "</p>";
                }
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