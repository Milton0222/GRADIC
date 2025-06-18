<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro e Análise de Dados</title>
    <link rel="stylesheet" href="./public/css/bootstrap.css">
    <link rel="stylesheet" href="./public/css/style.css">
</head>

<body>
    <div class="principal">
        <div class="menu">
            <ul>
                <a href="index.php">
                    <li>Home</li>
                </a>
                <a href="./view/pesquisa.php">
                    <li>Pesquisa</li>
                </a>
                <a href="./view/perguunta.php">
                    <li>Pergunta</li>
                </a>
                <a href="./view/dado.php">
                    <li>Dados</li>
                </a>
                <a href="">
                    <li>Contactos</li>
                </a>
                <a href="./view/login.php">
                    <li>Entrar</li>
                </a>
                <a href="./view/conta.php">
                    <li>Criar Conta</li>
                </a>
                <a href="">
                    <li>Sobre</li>
                </a>
            </ul>

        </div>
        <div class="content">
            <div class="up">
                   <h4>REGISTRO E ANÁLISE DE DADOS EM INVESTIGAÇÃO CIENTIFICA</h4>
                     <div class="grupo">
                          <a href="./view/dashboard.php"><button><strong>Entrar</strong></button></a>
                          <a href="./view/conta.php"><button><strong>Criar Conta</strong> </button></a>
                     </div>
            </div>
        </div>
        <footer>
            
            <div class="info">
                  <ul><li>@<?php $ano=date('Y'); echo $ano;?> <strong>Kizalu </strong>SOFT,LDA</li></ul>

            </div>
            <div class="redes">
                  <ul>
                    <a href=""><li><img src="./public/imagens/fb.png"></li></a>
                    <a href=""><li style="color: green;"><img src="./public/imagens/whatsap.jpeg" ></li></a>
                    <a href=""><li style="color: rgb(243, 109, 61);"><img src="./public/imagens/insta.jpg"></li></a>
                  </ul>

            </div>
        </footer>
    </div>

</body>
<script src="./public/js/bootstrap.js"></script>

</html>