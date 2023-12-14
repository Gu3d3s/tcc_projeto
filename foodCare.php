<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="foodCare.css?v=<?php echo time(); ?>">
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
    </div>

    <div class="inicio">
        
        <div class="text-img">
            <div class="txt">
                <p class="visoes v1">união</p>
                <p class="visoes">inteligência</p>
                <p class="visoes">responsabilidade.</p>

            </div>
            <div class="img">
                <div class="foto"></div>
            </div>       
        </div>

    </div>

    <!-- <div class="pag1">
        
        <div class="pag1-content">
            <div class="prat">
                <img src="prat.png" alt="" class="ft_prat">
            </div> -->
            <!-- <div class="apre">
                <section class="card-0">
                    <p>Olá, somos a FoodCare e Além de nos preocupar com os alimentos, nós 
                        pensamos nas pessoas também. Estima-se que no Brasil cerca de
                        45 milhões de toneladas de alimentos são despertiçado todos os anos,
                        isso acontece por diversos motivos, mas e se pudessemos pegar pelo
                        menos um pouquinho disso e aproveitar?
                    </p>
                </section>
            </div>
        </div>
    
    </div> -->
    <div class="pag-2">
        <div class="apre_card">
        <p class="conv">Te convidamos a fazer parte disso também.</p>
        <div class="card">
            <div class="card-inner">
              <div class="card-front">
                    <div class="logo"></div>
              </div>
              <div class="card-back">
                <p>Atuamos como um intermediario dentro desse nicho, conectando pequenos negocios as ONGs destribuidoras
                    através do acesso rápido e organizado do local do doador, tipos de alimentos, quantidade, tempo útil,
                    entre outros. O ponto a ser levantado é que não precisa ser necessárimente alimentos doados a bel
                    prazer, mas sim alimentos próximos ao prazo de validade e que o despejo é inevitavel, esses precisam
                    de recolhimento rápido e pontual.
                    </p>              
            </div>
            </div>
          </div>
          </div>
    </div>

    </div>

    <footer>

    </footer>

    <script>

        var icon = document.getElementById('mode')

        icon.onclick = function(){
            document.body.classList.toggle('dark-theme')
        }

    </script>


</body>
</html>