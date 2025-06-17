<?php
    //pegar dados do formulari0
            $opcao = $_POST['opcao'];
            $iduser=$_POST['idcode'];

include_once('conexao.php');

if ($opcao == 'criar') {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $csenhaa = $_POST['confirmar'];

    if ($senha == $csenhaa) {
        $sql = "INSERT INTO utilizadores (nome,userName,senha,tipo) value('$nome','$email','$senha','investigador');";

        $verificar = mysqli_query($conexao, $sql);

        session_start();
        $_SESSION['nome'] = $nome;
        $_SESSION['tipo'] = 'investigador';

        mysqli_close($conexao);

        header('Location: ../view/dashboard.php?success=Utilizador registado com sucesso.');
        exit;
    } else {
        mysqli_close($conexao);

        header('Location: ../view/conta.php?info=Confirmar senha.');
    }
} elseif ($opcao == 'apagar') {
        $sql="DELETE FROM utilizadores
        WHERE id=$iduser";

        $verificar=mysqli_query($conexao,$sql);

        mysqli_close($conexao);
        header('Location: ../view/utilizador.php?info=Utilizador apagado.');
           exit;
} elseif ($opcao == 'actualizar') {

         $email=$_POST['email'];
         $nome=$_POST['nome'];
         $funcao=$_POST['tipo'];
         $senha=$_POST['senha'];

                $sql="UPDATE utilizadores SET nome='$nome', userName='$email', tipo='$funcao',senha='$senha'
            WHERE id=$iduser";

            $verificar=mysqli_query($conexao,$sql);

     mysqli_close($conexao);
        header('Location: ../view/utilizador.php?info=Dados actualizados.');
           exit;
}
