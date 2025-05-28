<?php 
     $nome=$_POST['nome'];
     $funcao=$_POST['funcao'];
     $contacto=$_POST['contacto'];

     $sql="INSERT INTO pessoal (nome,contacto,funcao) value('$nome',$contacto,'$funcao');";

     include_once('../conexao.php');

     $verificar=mysqli_query($conector,$sql);

     if($funcao=='gestor'){
         $sql="INSERT INTO users (userName,passwords,tipo) value('$nome','1234-2025','admin');";
         $user=mysqli_query($conector,$sql);
     }else{
          $sql="INSERT INTO users (userName,passwords,tipo) value('$nome','1234-2025','$funcao');";
         $user=mysqli_query($conector,$sql);
     }

    


     mysqli_close($conector);

        header('Location:../../view/pessoas.php');
        exit;



?>