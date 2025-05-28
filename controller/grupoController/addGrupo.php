<?php
   include_once('../conexao.php');
   /**  cadastrando pessoal */            

            $pessoal_id=$_POST['pessoal_id'];
            $id_grupo=$_POST['id_grupo'];
            $datar=$_POST['datar'];

  
   
        $sql="INSERT INTO grupo_pessoal (grupo,pessoa_id,datar) value($id_grupo,$pessoal_id,'$datar');";

        $verificar=mysqli_query($conector,$sql);

        header("Location: ../../view/grupos.php");
        

  
?>




