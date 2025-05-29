<?php

   include_once('../conexao.php');

  $id=$_POST['idcode'];
  $estado=$_POST['estado'];


          $sql="UPDATE tarefas SET estado='$estado' WHERE  id=$id;";

          $verificar=mysqli_query($conector,$sql);

          header("Location:../../view/tarefas.php");
            exit;

  echo "Funcionalidade em desenvolvimento:". $id;



?>