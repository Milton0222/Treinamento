<?php 

      /*imporatr o arquiivo de conexao*/
      include_once('../conexao.php');

      $id_pessoa=$_POST['id_pessoa'];
      $id_tarefa=$_POST['tarefa_id'];
      $datar=$_POST['datar'];

         $sql="INSERT INTO pessoal_tarefas (tarefa_id,pessoa_id,data_atribuicao) value($id_tarefa,$id_pessoa,'$datar');";

            $verificar=mysqli_query($conector,$sql);

               mysqli_close($conector);

               header('Location:../../view/grupos.php');
                   exit;

         echo "Grupo: ".$codeGrupo;




?>