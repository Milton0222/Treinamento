<?php


        $id=$_POST['idcode'];

        $sql="DELETE FROM grupos WHERE id=$id;";

        include_once('../conexao.php');

        /**Executar consulata */

        $verificar=mysqli_query($conector,$sql);

            mysqli_close($conector);

            header('Location:../../view/grupos.php');
              exit;


?>