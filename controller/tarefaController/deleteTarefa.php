<?php 

/*importar connexao*/ 

include_once('../conexao.php');

  $id=$_POST['idcode'];

  $sql="DELETE FROM tarefas WHERE  id=$id;";

  $verificar=mysqli_query($conector,$sql);

  mysqli_close($conector);

  header('Location: ../../view/tarefas.php');
    exit;



?>