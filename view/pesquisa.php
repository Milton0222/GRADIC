<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRADIC-Dashboard</title>
    <link rel="stylesheet" href="../public/css/bootstrap.css">
    <link rel="stylesheet" href="../public/css/dashboard.css">
</head>

<body>
    <div class="principal">
        <?php 
        include_once('../controller/validar.php');

        ?>

        <div class="menuSuperior">
                 <div class="logo">
                     <a href="dashboard.php">Dashboard</a>
                 </div>
                 <div class="search">
                      <form action="" method="get">
                          <input type="search" name="" id="" placeholder="Informe um parametro" required>
                          <button type="submit">Ir</button>
                      </form>
                 </div>

        </div>
        <div class="grupo">
            <div class="menuLeft">
                <a href="../index.php" class="home">
                    <h1>Home</h1>
                </a>
                <ul>

                    <a href="">
                        <li>Pesquisa</li>
                    </a>
                    <a href="">
                        <li>Registro</li>
                    </a>
                    <a href="">
                        <li>Análise</li>
                    </a>
                    <a href="">
                        <li>Relatórios</li>
                    </a>
                    <a href="">
                        <li>Utilizadores</li>
                    </a>


                </ul>
                <a href="../controller/sair.php" class="sair">
                    <h1>Sair</h1>
                </a>
            </div>
            <div class="content">

                <!--conteudo-->
                <div class="cartao">
                    <div class="cartao1">
                          <div class="up">
                                 <a href="">Gerir</a>
                                 <strong>+1</strong>
                          </div>
                          <div class="down">
                                  <h2>Pesquisas</h2>  
                          </div>

                    </div>
                    <div class="cartao1">

                        <div class="up">
                                 <a href="">Gerir</a>
                                <strong>+1</strong>
                          </div>
                          <div class="down">
                                      <h2>Pesquisas</h2>  
                          </div>

                    </div>
                    <div class="cartao1">
                        <div class="up">
                                 <a href="">Gerir</a>
                                 <strong>+1</strong>
                          </div>
                          <div class="down">
                                    <h2>Pesquisas</h2>  
                          </div>

                    </div>
                    <div class="cartao1">

                        <div class="up">
                                 <a href="">Gerir</a>
                               <strong>+1</strong>
                          </div>
                          <div class="down">
                               <h2>Pesquisas</h2>  
                          </div>

                    </div>

                </div>
                <div class="graficos">
                    <div class="dados">
                        <h4>Gestão de Pesquisa</h4>

                        <table class="table">
                            <thead>
                                <th>Pesquisa</th>
                                <th>Tema</th>
                                <th>Objectivo</th>
                                <th>Tipo</th>
                                <th>Problemática</th>
                                <th>Metódo</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                          <div class="gbutto">
                                                    <button class="btn btn-danger">Apagar</button>
                                                    <button class="btn btn-success">Apagar</button>
                                          </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                  
                </div>



                <!--the end conteudo-->



            </div>

        </div>

    </div>

</body>
<script src="../public/js/bootstrap.js"></script>

</html>