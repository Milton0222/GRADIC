<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análise de Resultado</title>
    <link rel="stylesheet" href="../public/css/bootstrap.css">
    <link rel="stylesheet" href="../public/css/dashboard.css">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="principal">
        <?php
        include_once('../controller/validar.php');
        include_once('../controller/conexao.php');

        //pegar id da pesquisa

        $pesquisacode=$_POST['idcode'];

        $sql="SELECT *FROM pesquisas;";
           $verificar=mysqli_query($conexao,$sql);
          $qtdpesquisa = mysqli_num_rows($verificar);

        //buscar dados da pesquisa

        $sql = "SELECT *FROM pesquisas where id=$pesquisacode;";

        $verificar = mysqli_query($conexao, $sql);


        //buscando perguntas 

        $sql = "SELECT 
		            perguntas.id,perguntas.nome
	       FROM perguntas
         WHERE pesquisa_id=$pesquisacode;";

        $perguntas = mysqli_query($conexao, $sql);

           //pegar o id da pergunta
       

        $qtdpergunta = mysqli_num_rows($perguntas);
     

        //dados

        $sql = "SELECT *FROM dados;";

        $dadosr = mysqli_query($conexao, $sql);
        $qtddados = mysqli_num_rows($dadosr);

        //utilizador 

        $sql = "SELECT *FROM utilizadores;";

        $dadosu = mysqli_query($conexao, $sql);
        $qtduser = mysqli_num_rows($dadosu);


     


        //perguntas e dados 
            $sql="SELECT perguntas.nome, COUNT(dados.id) AS 'respostas'
   FROM perguntas JOIN dados ON(perguntas.id=dados.perguntas_id) 
					   JOIN pesquisas  ON(pesquisas.id=perguntas.pesquisa_id)
	WHERE pesquisa_id=$pesquisacode
   GROUP BY perguntas.nome;";

           $respostas=mysqli_query($conexao,$sql);

           //analise de dados 

           $sql="SELECT perguntas.nome, dados.descricao,dados.opniao, dados.numero
    FROM perguntas JOIN dados ON(perguntas.id=dados.perguntas_id)
	WHERE perguntas.pesquisa_id=$pesquisacode;";

       $dadosAnalise=mysqli_query($conexao,$sql);
        //fechar conexão
        mysqli_close($conexao);

        ?>

        <div class="menuSuperior">
            <div class="logo">
                <a href="dashboard.php">Dashboard</a>
            </div>
            <div class="search">
                <form action="search.php" method="get">
                    <input type="date" name="search" id="" placeholder="Informe um parametro" required>
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
                            <strong>+<?php print $qtdpesquisa; ?></strong>
                        </div>
                        <div class="down">
                            <h2>Pesquisas</h2>
                        </div>

                    </div>
                    <div class="cartao1">

                        <div class="up">
                            <a href="">Gerir</a>
                            <strong>+<?php print $qtdpergunta; ?></strong>
                        </div>
                        <div class="down">
                            <h2>Perguntas</h2>
                        </div>

                    </div>
                    <div class="cartao1">
                        <div class="up">
                            <a href="">Gerir</a>
                            <strong>+<?php print $qtddados; ?></strong>
                        </div>
                        <div class="down">
                            <h2>Dados</h2>
                        </div>

                    </div>
                    <div class="cartao1">

                        <div class="up">
                            <a href="">Gerir</a>
                            <strong>+<?php print $qtduser; ?></strong>
                        </div>
                        <div class="down">
                            <h2>Utilizador</h2>
                        </div>

                    </div>

                </div>
                <div class="graficos">
                    <div class="grafico1">
                        <h4>Dados Da pesquisa</h4>

                        <table class="table">
                            <thead>
                                <th>Pesquisa</th>
                                <th>Tema</th>
                                <th>Tipo</th>
                            </thead>
                            <tbody>
                                <?php

                                while ($dados = mysqli_fetch_assoc($verificar)) {
                                    $id = $dados['id'];
                                    $tema = $dados['tema'];
                                    $tipo = $dados['tipo'];
                                    $objectivo = $dados['objectivo'];
                                    $problematica = $dados['ploblematica'];

                                    print " 
                                <tr>
                                    <td>$id</td>
                                    <td>$tema</td>
                              
                                    <td>$tipo</td>
                           
                                </tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                        <hr>
                        <table class="table">
                            <thead>
                                <th>Pergunta</th>
                                <th>Dados</th>
                            </thead>
                            <tbody>
                                <?php 
                                   while($lista=mysqli_fetch_assoc($respostas)){ 
                                          $nome=$lista['nome'];
                                          $quantidade=$lista['respostas'];

                                print " 
                                <tr>
                                    <td>$nome</td>
                                    <td>
                                        <div class='progress' role='progressbar' aria-label='Success example' aria-valuenow='<?php print $qtddados;?>' aria-valuemin='0' aria-valuemax='<?php print $qtdpergunta;?>'>
                                            <div class='progress-bar w-$quantidade%'>$quantidade</div>
                                        </div>
                                    </td>
                                </tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                    <div class="grafico2">
                        <h4>Perguntas de pesquisa</h4>

                            <table class="table">
                                  <thead><th>id</th><th>Descrição</th></thead>
                            <tbody>
                                <?php

                                while ($dados = mysqli_fetch_assoc($perguntas)) {
                                    $id = $dados['id'];
                                    $nome = $dados['nome'];
                                    print " 
                                       <tr>
                                 
                                    <td>$id</td>
                                    <td>$nome</td>
                                 
                               
                                </tr>";
                                }
                                ?>
                                  </tbody>
                            </table>
                        <hr>
                          <h4>
                            Intepretação dos Dados
                          </h4>
                           <table class="table">
                               <thead>
                                <th>Pergunta</th><th>Noção</th><th>Opinião</th><th>Númerico</th>
                              </thead>
                               <tbody>
                                <?php 
                                   while($listaA=mysqli_fetch_assoc($dadosAnalise)){ 
                                           $pergunta=$listaA['nome'];
                                           $numero=$listaA['numero'];
                                           $opniao=$listaA['opniao'];
                                           $descricao=$listaA['descricao'];
                                           print " 
                                  <tr>
                                      <td>$pergunta</td>
                                      <td>$descricao</td>
                                      <td>$opniao</td>
                                      <td>$numero</td>
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
</html>