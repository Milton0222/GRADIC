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

                    <a href="pesquisa.php">
                        <li>Pesquisa</li>
                    </a>
                    <a href="perguunta.php">
                        <li>Pergunta</li>
                    </a>
                    <a href="">
                        <li>Análise</li>
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
                    <div class="grafico1">
                        <h4>Dados Recentes</h4>

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
                                    <td>...</td>
                                </tr>
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
                                    <td>...</td>
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