<?php
       if($conexao=mysqli_connect('localhost','root','','investigacaodb',3306)){
               echo 'Ligado.';
       }else{
           echo 'Sem conexão.';
       }

?>