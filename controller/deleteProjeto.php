<?php
$id=$_POST['idcode'];

include_once('conexao.php');

$sql="DELETE from projetos where id=$id;";

$verificr=mysqli_query($conector, $sql);


mysqli_close($conector);

header('Location:../view/projectos.php');


?>