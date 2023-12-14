<?php
    if (isset($_POST['submit'])){
        include_once('config.php');
        
        $nome = $_POST['nome_mercado'];
        $senha = $_POST['senha_mercado'];
        $email = $_POST['email_mercado'];
        $endereco = $_POST['endereco_mercado'];
        $telefone = $_POST['telefone_mercado'];
        $cnpj = $_POST['cnpj_mercado'];

        $result = mysqli_query($conexao, "INSERT INTO mercado(nome_mercado, senha_mercado, email_mercado, endereco_mercado, telefone_mercado, cnpj_mercado)
        VALUES ('$nome', '$senha', '$email', '$endereco', '$telefone', '$cnpj')");

    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="empresa_cadastro.css?v=<?php echo time(); ?>">
    <title>FoodCare</title>
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
        <div class="options">
            <a href="ong_cadastro.php" class="ong">Ong</a>
            <a href="empresa_cadastro.php">Pessoa Juridica</a>
        </div>
    </nav>

    <div class="wrapper">
        <div class="card-switch">
            <label class="switch">
               <input type="checkbox" class="toggle">
               <span class="slider"></span>
               <span class="card-side"></span>
               <div class="flip-card__inner">
                  <div class="flip-card__front">
                     <div class="title">entrar</div>
                     <form class="flip-card__form" action="empresa_acesso.php" method="POST">
                        <input class="flip-card__input" name="email_mercado_log" placeholder="Email" type="email">
                        <input class="flip-card__input" name="senha_mercado_log" placeholder="Senha" type="password">
                        <input type="submit" name="submit_log" class="flip-card__btn" value="Entrar"></input>
                     </form>
                  </div>


                  <div class="flip-card__back">
                     <div class="title">Cadastrar</div>
                     <form class="flip-card__form" action="empresa_cadastro.php" method="POST">
                            <input type="text" name="nome_mercado" id="" class="flip-card__input" placeholder="Nome">
                            <input type="text" name="senha_mercado" id="" class="flip-card__input" placeholder="Senha">
                            <input type="email" name="email_mercado" id="" class="flip-card__input" placeholder="Email">
                            <input type="text" name="endereco_mercado" id="" class="flip-card__input"  placeholder="Endereço">
                            <input type="text" name="telefone_mercado" id="" class="flip-card__input"  placeholder="Telefone">
                            <input type="text" name="cnpj_mercado" id="" class="flip-card__input"  placeholder="CNPJ">
                            <input type="submit" name="submit" class="flip-card__btn" value="Cadastrar"></input>
                     </form>
                  </div>
               </div>
            </label>
        </div>   
   </div>

    <!-- <form action="" class="cadastro">
        <input type="text" name="nome_ong" id="">
        <input type="text" name="senha_ong" id="">
        <input type="email" name="email_ong" id="">
        <input type="text" name="endereco_ong" id="">
        <input type="text" name="telefone_ong" id="">
        <input type="text" name="cnpj_ong" id="">
    </form> -->

    <script>
        
        const icon = document.getElementById('mode')
        icon.onclick = function(){
            document.body.classList.toggle('dark-theme')
        }

    </script>
</body>
</html>