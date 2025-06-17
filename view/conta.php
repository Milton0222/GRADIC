<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Registro</title>
    <link rel="stylesheet" href="../public/css/bootstrap.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <div class="principal">
        <div class="menu">
            <ul>
                <a href="../index.php">
                    <li>Home</li>
                </a>
                <a href="">
                    <li>Registro</li>
                </a>
                <a href="">
                    <li>Análise</li>
                </a>
                <a href="">
                    <li>Relatório</li>
                </a>
                <a href="">
                    <li>Contactos</li>
                </a>
                <a href="login.php">
                    <li>Entrar</li>
                </a>
                <a href="conta.php">
                    <li>Criar Conta</li>
                </a>
                <a href="">
                    <li>Sobre</li>
                </a>
            </ul>

        </div>
        <div class="loginCenter">
               <div class="left">
               
               </div>
               <div class="right">
                    <form action="../controller/userController.php" method="post">
                         <input type="hidden" name="opcao" value="criar">
                        <div>
                             <input type="text" name="nome" id="" placeholder="Informe seu nome" minlength="7" maxlength="50">
                        </div>
                           <div>
                                 <input type="email" name="email" id="" required>
                           </div>
                           
                           <div class="senha">
                            <input type="password" name="senha" id="" required>
                            <input type="password" name="confirmar" id="" placeholder="Confirma sua senha" >
                           </div>
                           <div>
                             
                                 <button type="submit">Salvar</button>
                           </div>
                    </form>
               </div>
        </div>
        <footer>
            
            <div class="info">
                  <ul><li>@<?php $ano=date('Y'); echo $ano;?> <strong>Kizalu </strong>SOFT,LDA</li></ul>

            </div>
            <div class="redes">
                  <ul>
                    <a href=""><li><img src="../public/imagens/fb.png"></li></a>
                    <a href=""><li style="color: green;"><img src="../public/imagens/whatsap.jpeg" ></li></a>
                    <a href=""><li style="color: rgb(243, 109, 61);"><img src="../public/imagens/insta.jpg"></li></a>
                  </ul>

            </div>
        </footer>
    </div>

</body>
<script src="./public/js/bootstrap.js"></script>

</html>