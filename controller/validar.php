<?php
    session_start();

       if( ! isset($_SESSION['login'])){

           header('Location:../view/login.php?erro=Sem sessão Iniciada');
             exit;
       }

?>