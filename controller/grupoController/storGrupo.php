<?php 

     $qtd=$_POST['qtd_pessoal'];
     $supervisor=$_POST['supervisor'];
     $projeto=$_POST['id_projeto'];
     $nome=$_POST['designacao'];


     $sql="INSERT INTO grupos (designacao,qtdPessoal,supervisor,projeto_id) value('$nome',$qtd,$supervisor,$projeto);";

     include_once('../conexao.php');

     $verificar=mysqli_query($conector,$sql);

         mysqli_close($conector);

         header('Location:../../view/grupos.php');
           exit;

?>