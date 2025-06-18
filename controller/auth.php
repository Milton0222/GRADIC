<?php
   include_once('conexao.php');

   //pegar dados do formulario
   $senha=$_POST['senha'];
   $user=$_POST['email'];
   
   //busscar utilizador na bd

   $sql="SELECT *from utilizadores WHERE senha='$senha' and userName='$user';";
  
   //executar comando sql
   $verificar=mysqli_query($conexao,$sql);

      if($authv=mysqli_fetch_assoc($verificar)){
             $nome=$authv['nome'];
             $tipo=$authv['tipo'];
             $id=$authv['id'];

             session_start();
             $_SESSION['nome']=$nome;
             $_SESSION['tipo']=$tipo;
             $_SESSION['id']=$id;

                  mysqli_close($conexao);
             header('Location: ../view/dashboard.php?info=Sessão iniciada.');
             exit;
               
      }else{
                 mysqli_close($conexao);
               header('Location: ../view/login.php?error=Dados invalidos.');
                 exit;
      }


?>