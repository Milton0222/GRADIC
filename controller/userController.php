<?php
       $opcao=$_POST['opcao'];

    include_once('conexao.php');

       if($opcao=='criar'){

              $nome=$_POST['nome'];
              $email=$_POST['email'];
              $senha=$_POST['senha'];
              $csenhaa=$_POST['confirmar'];

              if($senha==$csenhaa){
                     $sql="INSERT INTO utilizadores (nome,userName,senha,tipo) value('$nome','$email','$senha','investigador');";

                     $verificar=mysqli_query($conexao,$sql);

                         session_start();
                          $_SESSION['nome']=$nome;
                          $_SESSION['tipo']='investigador';

                       mysqli_close($conexao);

                       header('Location: ../view/dashboard.php?success=Utilizador registado com sucesso.');
                          exit;
              }else{
                   mysqli_close($conexao);

                       header('Location: ../view/conta.php?info=Confirmar senha.');
                   
              }

           

       }

       



?>