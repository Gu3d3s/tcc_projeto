<?php

    include_once('config.php');

    if(isset($_GET['?id']))
    {

        $id = $_GET['?id'];
        $sqlSelect = "SELECT * FROM ong WHERE id_ong='$id'";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome_ong'];
                $senha = $user_data['senha_ong'];
                $email = $user_data['email_ong'];
                $endereco = $user_data['endereco_ong'];
                $telefone = $user_data['telefone_ong'];
                $cnpj = $user_data['cnpj_ong'];
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
        $id_edit = $_POST['id_ong_edit'];
        $nome_edit = $_POST['nome_ong_edit'];
        $senha_edit = $_POST['senha_ong_edit'];
        $email_edit = $_POST['email_ong_edit'];
        $endereco_edit = $_POST['endereco_ong_edit'];
        $telefone_edit = $_POST['telefone_ong_edit'];
        $cnpj_edit = $_POST['cnpj_ong_edit'];
        $img_edit = $_POST['imagem_ong_edit'];

        $sqlInsert = mysqli_query($conexao, "UPDATE ong SET nome_ong='$nome_edit', senha_ong='$senha_edit', email_ong='$email_edit', endereco_ong='$endereco_edit', telefone_ong='$telefone_edit', cnpj_ong='$cnpj_edit', imagem_ong='$img_edit' WHERE id_ong='$id_edit'");
    
    
    header('Location: ong_cadastro.php');}
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
                     <form class="flip-card__form" action="ong_edit.php" method="POST">
                            <input type="text" name="nome_ong_edit" id="" class="flip-card__input" value=<?php echo $nome;?> required>
                            <input type="text" name="senha_ong_edit" id="" class="flip-card__input" value=<?php echo $senha;?>>
                            <input type="email" name="email_ong_edit" id="" class="flip-card__input" value=<?php echo $email;?>>
                            <input type="text" name="endereco_ong_edit" id="" class="flip-card__input"  value=<?php echo $endereco;?>>
                            <input type="text" name="telefone_ong_edit" id="" class="flip-card__input"  value=<?php echo $telefone;?>>
                            <input type="text" name="cnpj_ong_edit" id="" class="flip-card__input" value=<?php echo $cnpj;?>>
                            <!-- <input type="file" name="img_ong_edit" id="" class="flip-card__input" value=<?php echo $img;?>> -->
                            <input type="hidden" name="id_ong_edit" value=<?php echo $id;?>>
                            <input type="submit" name="update" class="flip-card__btn" value="Editar"></input>
                            <a href="ong_pag.php" class="ex">voltar</a>
                     </form>
                  </div>
                </div>
            </div>   
    <!-- <form action="" class="cadastro">
        <input type="text" name="nome_ong_edit" id="">
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