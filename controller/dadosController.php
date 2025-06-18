<?php
      //importar arquivo de conexao com a bd
      include_once('conexao.php');
   $opcao=$_POST['opcao'];
    $idPergunta=$_POST['idcode'];
     
   if($opcao=='criar'){
        
          //pegaar dados do formulario
          $opniao=$_POST['opniao'];
          $numero=$_POST['numero'];
          $descricao=$_POST['descricao'];

          //comando sql
          $sql="INSERT INTO dados (opniao,descricao,numero,perguntas_id) value('$opniao','$descricao',$numero,$idPergunta)";
            $verificar=mysqli_query($conexao,$sql);

            mysqli_close($conexao);

            header('Location: ../view/dado.php?info=Pergunta foi respondida');
               exit;

   }elseif($opcao=='apagar'){

             //apagar pergunta

             $sql="DELETE from dados where id=$idPergunta;";
               $verificar=mysqli_query($conexao,$sql);

              mysqli_close($conexao);

            header('Location: ../view/dado.php?info=Dados apagados.');
               exit;
   }elseif($opcao=='actualizar'){
    //pegaar dados do formulario
          $opniao=$_POST['opniao'];
          $numero=$_POST['numero'];
          $descricao=$_POST['descricao'];

               $sql="UPDATE dados SET opniao='$opniao',descricao='$descricao',numero=$numero where id=$idPergunta;";
                   $verificar=mysqli_query($conexao,$sql);

                 mysqli_close($conexao);

            header('Location: ../view/dado.php?info=Dadoss atualizado.');
               exit;


   }


?>