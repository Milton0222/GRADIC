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
        include_once('../controller/conexao.php');
        $user_id = $_SESSION['id'];

        $sql = "SELECT pesquisas.id AS 'pesquisa',pesquisas.tema,
		perguntas.id,perguntas.nome
	FROM pesquisas JOIN perguntas ON(pesquisas.id=perguntas.pesquisa_id)
	
	WHERE pesquisas.user_id=$user_id;";

        $verificar = mysqli_query($conexao, $sql);

        $sql = "SELECT *from pesquisas where user_id=$user_id;";
        $pesquisaveri = mysqli_query($conexao, $sql);

        $qtdpergunta = mysqli_num_rows($verificar);
        $qtdpesquisa = mysqli_num_rows($pesquisaveri);

   //dados

                  $sql="SELECT *FROM dados;";
                   $verificardados=mysqli_query($conexao,$sql);

                  $qtddados=mysqli_num_rows($verificardados);

        //fechando conexao
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
                            <strong>+<?php print  $qtdpergunta; ?></strong>
                        </div>
                        <div class="down">
                            <h2>Perguntas</h2>
                        </div>

                    </div>
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
                            <strong>+<?php print $qtddados; ?></strong>
                        </div>
                        <div class="down">
                            <h2>Dados</h2>
                        </div>

                    </div>


                </div>
                <div class="graficos">
                    <div class="dados">
                        <h4>Gestão de Perguntas de pesquisa</h4>

                        <table class="table">
                            <thead>

                                <th>Tema</th>
                                <th>Pergunta</th>

                                <th>Metódo</th>
                            </thead>
                            <tbody>
                                <?php

                                while ($dados = mysqli_fetch_assoc($verificar)) {
                                    $id = $dados['id'];
                                    $pesquisaid = $dados['pesquisa'];
                                    $tema = $dados['tema'];
                                    $nome = $dados['nome'];

                                    print " 
                                <tr>
                                    <td>$tema</td>
                                    <td>$nome</td>
                                
                                    <td>
                                          <div class='btn-group'>
                                                    <button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#apagar$id'>Apagar</button>
     <div class='modal fade' id='apagar$id' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' >
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>Desejas  apagar apergunta $nome ?</h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>

                                                    
                                                <form action='../controller/perguntaController.php' method='post'>
                                                <input type='hidden' value='$id' name='idcode'>
                                                    <input type='hidden' value='apagar' name='opcao'>
                                            <div class='modal-footer' style='display:flex;'>
                                                <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Não</button>
                                                <button type='submit' class='btn btn-danger'>Sim</button>
                                            </div>               
                                                                                            
                                            </form>

                                            </div>
                                            
                                            </div>
                                        </div>
                                        </div>

                                                    <button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#actualizar$id'>Actualizar</button>
    <div class='modal fade' id='actualizar$id' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Actualizar  pergunta nº $id</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>

                    <form action='../controller/perguntaController.php' method='post'>
                        <input type='hidden' value='actualizar' name='opcao'>
                           <input type='hidden' value='$id' name='idcode'>

                        <div class='row'>
                           
                            <div class='col'>
                                <div class='form-floating mb-3'>
                                    <input type='text' class='form-control' required id='floatingInput' maxlength='50' minlength='10' value='$nome' placeholder='Informe a pergunta' name='nome'>
                                    <label for='floatingInput'>Pergunta de pesquisa</label>
                                </div>
                                  
                                
                            </div>
                                
                            
                        </div>
                        <div class='modal-footer' style='display:flex;'>
                            <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Canselar</button>
                            <button type='submit' class='btn btn-danger'>Salvar</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

                    <button class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#dado$id'>Responder</button>
                    <div class='modal fade' id='dado$id' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-lg'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Registar dados da  pergunta $nome</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>

                    <form action='../controller/dadosController.php' method='post'>
                        <input type='hidden' value='criar' name='opcao'>
                           <input type='hidden' value='$id' name='idcode'>
                        <div class='row'>
                            <div class='form-floating mb-3'>
                                    <textarea class='form-control' id='floatingPassword' name='descricao' id='' cols='30' rows='20'></textarea>
                                    <label for='floatingPassword'>Descrição</label>
                                </div>

                            <div class='col'>
                                <div class='form-floating mb-3'>
                                    <input type='number' class='form-control' required id='floatingInput' value='' ' name='numero'>
                                    <label for='floatingInput'>Número</label>
                                </div>
                                 
                                
                            </div>
                                <div class='form-floating'>
                                    <textarea class='form-control' id='floatingPassword'  required name='opniao' id='' cols='30' rows='20' ></textarea>
                                    <label for='floatingPassword'>Opnião</label>
                                </div>
                            
                        </div>
                        <div class='modal-footer' style='display:flex;'>
                            <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Canselar</button>
                            <button type='submit' class='btn btn-danger'>Salvar</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

                                          </div>
                                    </td>
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