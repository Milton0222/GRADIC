<?php
    session_start();

       if( ! isset($_SESSION['nome'])){

           header('Location:../view/login.php?erro=Sem sessão Iniciada');
             exit;
       }

?>