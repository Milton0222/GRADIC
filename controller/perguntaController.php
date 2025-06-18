<?php   
 //importando o arquivo de configuracao
    include_once('conexao.php');
    //pegando dados do formulario

    $opcao=$_POST['opcao'];

 

    if($opcao=='criar'){
           $idpesquisa=$_POST['idcode'];
        $nome=$_POST['nome'];

        $sql="INSERT INTO perguntas (nome,pesquisa_id) value('$nome',$idpesquisa);";
        $verificar=mysqli_query($conexao,$sql);

        mysqli_close($conexao);
        header('Location: ../view/perguunta.php?info=Pergunta registada com sucesso');
            exit;


    }elseif($opcao=='apagar'){
        $idpergunta=$_POST['idcode'];

        $sql="DELETE FROM perguntas where id=$idpergunta;";
          $verificar=mysqli_query($conexao,$sql);

            mysqli_close($conexao);
        header('Location: ../view/perguunta.php?info=Dados da pergunta apagados com sucesso.');
            exit;
          

    }elseif($opcao=='actualizar'){
         $idpergunta=$_POST['idcode'];
              $nome=$_POST['nome'];

         $sql="UPDATE perguntas set nome='$nome' where id=$idpergunta;";

         $verificar=mysqli_query($conexao,$sql);

              mysqli_close($conexao);
        header('Location: ../view/perguunta.php?info=Dados da pergunta actualizados.');
            exit;


    }



?>