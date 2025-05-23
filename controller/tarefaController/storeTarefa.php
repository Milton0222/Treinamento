<?php


       $nome= $_POST['designacao'];
       $estado=$_POST['estado'];
       $inicio=$_POST['inicio'];
       $fim=$_POST['fim'];
       $id_projeto=$_POST['id_projeto'];


       /** importando a conexao com a base de dados */
       include_once('../conexao.php');

       /**comando sql para inseririr uma tarefaa na tabela tarefas */

       $sql="INSERT INTO tarefas (designacao,data_inicio,data_conclusao,estado,id_projeto)
             value('$nome','$inicio','$fim','$estado',$id_projeto);";

             $verificar=mysqli_query($conector,$sql);

  /**fechar conexxao com a bd */
             mysqli_close($conector);

             /**redireciionar para view tarefas.php */

             header('Location: ../../view/tarefas.php');
             exit;


?>