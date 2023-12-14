<?php
    if (isset($_POST['submit'])){
        include_once('config.php');
        
        $nome = $_POST['nome_ong'];
        $senha = $_POST['senha_ong'];
        $email = $_POST['email_ong'];
        $endereco = $_POST['endereco_ong'];
        $telefone = $_POST['telefone_ong'];
        $cnpj = $_POST['cnpj_ong'];
        
        $query = "SELECT * FROM ong WHERE email_ong = '$email'";
        $res = $conexao->query($query);
        if ($res) {
            if (mysqli_num_rows($res) > 0) {
                $al = 1;
            }else{
                $al = 0;
            $result = mysqli_query($conexao, "INSERT INTO ong(nome_ong, senha_ong, email_ong, endereco_ong, telefone_ong, cnpj_ong)
            VALUES ('$nome', '$senha', '$email', '$endereco', '$telefone', '$cnpj')");
            }
    }
}
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="ong_cadastro.css?v=<?php echo time(); ?>">
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
                     <form class="flip-card__form" action="ong_acesso.php" method="POST">
                        <input class="flip-card__input" name="email_ong_log" placeholder="Email" type="email" required>
                        <input class="flip-card__input" name="senha_ong_log" placeholder="Senha" type="password" required>
                        <input type="submit" name="submit_log" class="flip-card__btn" value="Entrar"></input>
                     </form>
                  </div>


                  <div class="flip-card__back">
                     <div class="title">Cadastrar</div>
                     <form class="flip-card__form" action="ong_cadastro.php" method="POST">
                            <input type="text" name="nome_ong" id="" class="flip-card__input" placeholder="Nome" required>
                            <input type="text" name="senha_ong" id="" class="flip-card__input" placeholder="Senha" required>
                            <input type="email" name="email_ong" id="" class="flip-card__input" placeholder="Email" required>
                            <input type="text" name="endereco_ong" id="" class="flip-card__input"  placeholder="Endereço" required>
                            <input type="text" name="telefone_ong" id="" class="flip-card__input"  placeholder="Telefone" required>
                            <input type="text" name="cnpj_ong" id="" class="flip-card__input"  placeholder="CNPJ" required>
                            <!-- <input type="file" name="img_ong" id="" class="flip-card__input" required> -->
                            <input type="submit" name="submit" class="flip-card__btn" value="Cadastrar">
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
        <?php if ($al > 0){
            ?>
            alert('email já existente')
        <?php
    }?>

        const icon = document.getElementById('mode')
        icon.onclick = function(){
            document.body.classList.toggle('dark-theme')
        }

    </script>
</body>
</html>