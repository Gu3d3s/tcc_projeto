<?php
    session_start();
    include_once('config.php');
    $lista_mercado = mysqli_query($conexao, "SELECT * FROM mercado_lista");
    $lista_ong = mysqli_query($conexao, "SELECT * FROM ong_lista")

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="pesquisa.css?v=<?php echo time(); ?>">
    <title>mapa</title>
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
        
    </nav>
    <div class="list_all">
        <div class="mercado">
            <h2 class="l_m">Lista de Mercados</h2>
            <div class="lista_mercados">
                <?php
                while($mrcd = mysqli_fetch_assoc($lista_mercado)){
                    echo "<div class='list_text'>";
                    echo "<a href='mercado_pag_list.php??email_user=$mrcd[em_mercado]' class='link_m'>" . $mrcd['nome_mercado'] . "</a>";
                    echo "<p class='txt_m'>" . $mrcd['em_mercado'] . "</p>";
                    echo "<p class='txt_m'>" . $mrcd['tel_mercado'] . "</p>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
        <div class="ong">
            <h2 class="l_o">lista de ONGs</h2>
            <div class="lista_ongs">
            <?php
                while($ongs = mysqli_fetch_assoc($lista_ong)){
                    echo "<div class='list_text'>";
                    echo "<a href='ong_pag_list.php??email_user=$ongs[em_ong]' class='link_m'>" . $ongs['nome_ong'] . "</a>";
                    echo "<p class='txt_m'>" . $ongs['em_ong'] . "</p>";
                    echo "<p class='txt_m'>" . $ongs['tel_ong'] . "</p>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>