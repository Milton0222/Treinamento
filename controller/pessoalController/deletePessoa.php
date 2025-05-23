<?php 

        $id=$_POST['idcode'];

        $sql="DELETE FROM pessoal WHERE id=$id;";

        include_once('../conexao.php');

           $verificar=mysqli_query($conector,$sql);

           mysqli_close($conector);


           header('Location:../../view/pessoas.php');
           exit;

?>