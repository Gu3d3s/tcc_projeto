<?php

    include_once('config.php');

    if(isset($_GET['?id']))
    {

        $id = $_GET['?id'];
        $sqlSelect = "SELECT * FROM mercado WHERE id_mercado='$id'";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome_mercado'];
                $senha = $user_data['senha_mercado'];
                $email = $user_data['email_mercado'];
                $endereco = $user_data['endereco_mercado'];
                $telefone = $user_data['telefone_mercado'];
                $cnpj = $user_data['cnpj_mercado'];
            }
        }
        else
        {
            header('Location: foodCare.php');
        }
    }
    else
    {
        header('Location: foodCare.php');
    }
    if(isset($_POST['update']))
    {
        $id_edit = $_POST['id_mercado_edit'];
        $nome_edit = $_POST['nome_mercado_edit'];
        $senha_edit = $_POST['senha_mercado_edit'];
        $email_edit = $_POST['email_mercado_edit'];
        $endereco_edit = $_POST['endereco_mercado_edit'];
        $telefone_edit = $_POST['telefone_mercado_edit'];
        $cnpj_edit = $_POST['cnpj_mercado_edit'];

        $sqlInsert = mysqli_query($conexao, "UPDATE mercado SET nome_mercado='$nome_edit', senha_mercado='$senha_edit', email_mercado='$email_edit', endereco_mercado='$endereco_edit', telefone_mercado='$telefone_edit', cnpj_mercado='$cnpj_edit' WHERE id_mercado='$id_edit'");
    
    
    header('Location: empresa_cadastro.php');}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="ong_edit.css?v=<?php echo time(); ?>">
    <title>FoodCare</title>
</head>
<body>
 
    
<div class="wrapper">
           
               <div class="flip-card__inner">



                  <div class="flip-card__back">
                     <div class="title">Editar</div>
                     <form class="flip-card__form" action="mercado_edit.php" method="POST">
                            <input type="text" name="nome_mercado_edit" id="" class="flip-card__input" value=<?php echo $nome;?> required>
                            <input type="text" name="senha_mercado_edit" id="" class="flip-card__input" value=<?php echo $senha;?>>
                            <input type="email" name="email_mercado_edit" id="" class="flip-card__input" value=<?php echo $email;?>>
                            <input type="text" name="endereco_mercado_edit" id="" class="flip-card__input"  value=<?php echo $endereco;?>>
                            <input type="text" name="telefone_mercado_edit" id="" class="flip-card__input"  value=<?php echo $telefone;?>>
                            <input type="text" name="cnpj_mercado_edit" id="" class="flip-card__input" value=<?php echo $cnpj;?>>
                            <input type="hidden" name="id_mercado_edit" value=<?php echo $id;?>>
                            <input type="submit" name="update" class="flip-card__btn" value="Editar"></input>
                            <a href="mercado_pag.php" class="ex">voltar</a>
                     </form>
                  </div>
                </div>
            </div>   
    <!-- <form action="" class="cadastro">
        <input type="text" name="nome_mercado_edit" id="">
        <input type="text" name="senha_mercado" id="">
        <input type="email" name="email_mercado" id="">
        <input type="text" name="endereco_mercado" id="">
        <input type="text" name="telefone_mercado" id="">
        <input type="text" name="cnpj_mercado" id="">
    </form> -->

    <script>
        
        const icon = document.getElementById('mode')
        icon.onclick = function(){
            document.body.classList.toggle('dark-theme')
        }

    </script>
</body>
</html>