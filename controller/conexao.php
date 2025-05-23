<?php 

//conecttar com a base de dados

$servidor="localhost";
$porta=3306;
$database="gtarefasbd";
$user="root";
$password="";

if($conector=mysqli_connect($servidor,$user,$password,$database,$porta) or die("Erro de conexão"))
        echo "Conexão estabelecida.<br>";
    else
       echo "Sem conexão verifica a disponibilidade do servidor.";


?>