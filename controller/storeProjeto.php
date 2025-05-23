<?php
include_once("conexao.php");
// etapa  1 ppegando dados do formulario

$texto = $_POST['texto'];
$nome = $_POST['nome'];
$duracao = $_POST['duracao'];
$inicio = $_POST['inicio'];
$fim = $_POST['fim'];
$id_empresa = $_POST['code'];
$sms = "$nome, Projeto registado.";

$code1=mysqli_insert_id($conector);



$sql = "INSERT INTO projetos (designacao,descricao,duracao,data_inicio,data_conclusao,empresa_id,id)
 VALUES('$nome','$texto',$duracao,'$inicio','$fim',$id_empresa,$cod1+$duracao);";

//inserir dados na bd 

if ($nome != null) {

    if (mysqli_query($conector, $sql)) {
        $id = mysqli_insert_id($conector);
        echo "Projecto registado com sucesso. Anota o codigo de registro $id";
    } else
        echo "Projecto não registado.";
}

mysqli_close($conector);
header('Location: ../view/projectos.php');
exit;
