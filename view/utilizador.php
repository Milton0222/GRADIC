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
        include_once('../controller/conexao.php');
        include_once('../controller/validar.php');

            $sql="SELECT *FROM utilizadores";
             
            //executar comando sql
            $verificar=mysqli_query($conexao,$sql);

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
                                 <strong>+1</strong>
                          </div>
                          <div class="down">
                                  <h2>Utilizador</h2>  
                          </div>

                    </div>
                    <div class="cartao1">

                        <div class="up">
                                 <a href="">Gerir</a>
                                <strong>+1</strong>
                          </div>
                          <div class="down">
                                      <h2>Dados</h2>  
                          </div>

                    </div>
                    <div class="cartao1">
                        <div class="up">
                                 <a href="">Gerir</a>
                                 <strong>+1</strong>
                          </div>
                          <div class="down">
                                    <h2>Pergunta</h2>  
                          </div>

                    </div>
                    <div class="cartao1">

                        <div class="up">
                                 <a href=""><?php $nome= $_SESSION['tipo']; print $nome;?></a>
                             
                          </div>
                          <div class="down">
                               <h2>User</h2>  
                          </div>

                    </div>

                </div>
                <div class="graficos">
                    <div class="dados">
                        <h4>Dados do utilizador</h4>

                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Função</th>
                                <th>Metódo</th>
                            </thead>
                            <tbody>
                            <?php
                                while($dados=mysqli_fetch_assoc($verificar)){

                                     $id=$dados['id'];
                                     $nome=$dados['nome'];
                                     $email=$dados['userName'];
                                     $tipo=$dados['tipo'];
                                     $senha=$dados['senha'];

                                    print  "
                                <tr>
                                    <td>$id</td>
                                    <td>$nome</td>
                                    <td>$email</td>
                                    <td>$tipo</td>
                                    
                                    <td>
                                          <div class='btn-group'>
                                                    <button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#apagar$id'>Apagar</button>
                                        <div class='modal fade' id='apagar$id' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' >
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>Desejas  apagar o utilizador $nome ?</h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>

                                                    
                                                <form action='../controller/userController.php' method='post'>
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
                                        
                                                    <button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#atualizar$id'>Actualizar</button>
                                                     <div class='modal fade' id='atualizar$id' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' >
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>Actualizar dados do sr(a) $nome ?</h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>

                                                    
                                                <form action='../controller/userController.php' method='post' class='form-control'>
                                                    <input type='hidden' value='$id' name='idcode'>
                                                    <input type='hidden' value='actualizar' name='opcao'>

                                                      <div class='row'>
                                                          <div class='col'>
                                                              <div class='form-floating mb-3'>
                                                                <input type='email' class='form-control' id='floatingInput' value='$email' placeholder='name@example.com' name='email'>
                                                                <label for='floatingInput'>Nome do Utilizador</label>
                                                                </div>
                                                                  <div class='form-floating mb-3'>
                                                                <input type='text' class='form-control' id='floatingInput' name='nome' value='$nome'>
                                                                <label for='floatingInput'>Nome</label>
                                                                </div>
                                                               

                                                          </div>
                                                          <div class='col'>
                                                             <div class='form-floating'>
                                                                <input type='password' class='form-control' id='floatingPassword' value='$senha' placeholder='Password' name='senha'>
                                                                <label for='floatingPassword'>Senha</label>
                                                                </div>
                                                            <div class='form-floating mt-3'>
                                                                      <select class='form-select' aria-label='Default select example' name='tipo'>
                                                                        <option selected value='$tipo'>Selecionar</option>
                                                                        <option value='admin'>Orientador</option>
                                                                        <option value='investigador'>Investigador</option>
                                                                      
                                                                        </select>
                                                                <label for='floatingPassword'>Funcão</label>
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