<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRADIC-Dashboard</title>
    <link rel="stylesheet" href="../public/css/bootstrap.css">
    <link rel="stylesheet" href="../public/css/dashboard.css">
     <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="principal">
        <?php 
        include_once('../controller/validar.php');
         include_once('../controller/conexao.php');

             $sql="SELECT *FROM pesquisas;";

             $verificar=mysqli_query($conexao,$sql);


             //buscando perguntas 

               $sql="SELECT pesquisas.id AS 'pesquisa',pesquisas.tema,
		perguntas.id,perguntas.nome
	FROM pesquisas JOIN perguntas ON(pesquisas.id=perguntas.pesquisa_id);";

          $perguntas=mysqli_query($conexao,$sql);

          $qtdpergunta=mysqli_num_rows($perguntas);
          $qtdpesquisa=mysqli_num_rows($verificar);

          //dados

          $sql="SELECT *FROM dados;";

              $dadosr=mysqli_query($conexao,$sql);
                 $qtddados=mysqli_num_rows($dadosr);

                 //utilizador 

                 $sql="SELECT *FROM utilizadores;";

              $dadosu=mysqli_query($conexao,$sql);
                 $qtduser=mysqli_num_rows($dadosu);
             //fechar conexão
             mysqli_close($conexao);

        ?>

        <div class="menuSuperior">
            <div class="logo">
                <a href="dashboard.php">Dashboard</a>
            </div>
            <div class="search">
                <form action="" method="get">
                    <input type="date" name="" id="" placeholder="Informe um parametro" required>
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

                    <a href="pesquisa.php">
                        <li>Pesquisa</li>
                    </a>
                    <a href="perguunta.php">
                        <li>Pergunta</li>
                    </a>
                    <a href="dado.php">
                        <li>Dado</li>
                    </a>
                    <a href="">
                        <li>Relatórios</li>
                    </a>
                    <a href="utilizador.php">
                        <li>Utilizador</li>
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
                            <strong>+<?php print $qtdpesquisa;?></strong>
                        </div>
                        <div class="down">
                            <h2>Pesquisas</h2>
                        </div>

                    </div>
                    <div class="cartao1">

                        <div class="up">
                            <a href="">Gerir</a>
                            <strong>+<?php print $qtdpergunta;?></strong>
                        </div>
                        <div class="down">
                            <h2>Perguntas</h2>
                        </div>

                    </div>
                    <div class="cartao1">
                        <div class="up">
                            <a href="">Gerir</a>
                            <strong>+<?php print $qtddados;?></strong>
                        </div>
                        <div class="down">
                            <h2>Dados</h2>
                        </div>

                    </div>
                    <div class="cartao1">

                        <div class="up">
                            <a href="">Gerir</a>
                            <strong>+<?php print $qtduser;?></strong>
                        </div>
                        <div class="down">
                            <h2>Utilizador</h2>
                        </div>

                    </div>

                </div>
                <div class="graficos">
                    <div class="grafico1">
                        <h4>Pesquisas Recentes</h4>

                        <table class="table">
                            <thead>
                                <th>Pesquisa</th>
                                <th>Tema</th>
                       
                                <th>Tipo</th>
                              
                                <th>Metódo</th>
                            </thead>
                            <tbody>
                                <?php 

                                while($dados=mysqli_fetch_assoc($verificar)){ 
                                            $id=$dados['id'];
                                      $tema=$dados['tema'];
                                      $tipo=$dados['tipo'];
                                      $objectivo=$dados['objectivo'];
                                      $problematica=$dados['ploblematica'];

                                      print " 
                                <tr>
                                    <td>$id</td>
                                    <td>$tema</td>
                              
                                    <td>$tipo</td>
                           
                                    <td>...</td>
                                </tr>";
}
                                ?>
                            </tbody>
                        </table>

                    </div>
                    <div class="grafico2">
                        <h4>Perguntas</h4>

                        <div>
                            <canvas id="myChart" class="chart1"></canvas>
                        </div>
                        <hr>
                         <table class="table">
                            <thead>
                          
                                <th>Tema</th>
                                <th>Pergunta</th>
                              
                                <th>Metódo</th>
                            </thead>
                            <tbody>
                                <?php 

                                while($dados=mysqli_fetch_assoc($perguntas)){ 
                                       $id=$dados['id'];
                                       $pesquisaid=$dados['pesquisa'];
                                       $tema=$dados['tema'];
                                       $nome=$dados['nome'];
                                print " 
                                       <tr>
                                 
                                    <td>$tema</td>
                                    <td>$nome</td>
                                 
                                    <td>...</td>
                                </tr>";
                                }
                                ?>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Mkizalu','Mcalcula','Manga','Pera'],
      datasets: [{
        label: '#Dados',
        data: ['1','3','4','5'],
        backgroundColor: [' rgb(176, 161, 27)', 'Blue', 'green', 'red'],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

</html>