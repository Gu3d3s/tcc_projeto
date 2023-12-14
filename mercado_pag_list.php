<?php
    include_once('config.php');
        $email_mercado = $_GET['?email_user'];
        $sql = "SELECT * FROM mercado WHERE email_mercado = '$email_mercado'";
        $id_query = mysqli_fetch_assoc(mysqli_query($conexao, $sql));
        $id = $id_query['id_mercado'];
        $result = $conexao -> query($sql);
        $rslt_text = mysqli_query($conexao, "SELECT * FROM mercado_txts WHERE user_id = '$id'");
        $lista_al = mysqli_query($conexao, "SELECT * FROM lista_alimentos WHERE user_id = '$id'");
        // $vs = mysqli_query($conexao, "SELECT * FROM mercado_aval WHERE aval_id = '$id'");
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
        </div>
        <div class="task">
        
        <div>
        <table class="tbl tbl_w">
            <thead>
                <tr>
                    <th class="col0">Alimento</th>
                    <th class="col0 ml">quantidade</th>
                    <th class="col0 ml">praso validade</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($al_col = mysqli_fetch_assoc($lista_al)){
                        echo "<tr>";
                        echo "<td class='col1'>" . $al_col['nome'] . "</td>";
                        echo "<td class='col1 ml'>" . $al_col['qtd'] . "</td>";
                        echo "<td class='col1 ml'>" . $al_col['data_al'] . "</td>";
                        
                        };
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