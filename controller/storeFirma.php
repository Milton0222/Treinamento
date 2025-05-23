<?php
require_once("conexao.php");

/**recebendo dados do formulario */
$email = $_POST['email'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$obs = $_POST['texto'];
$nif = $_POST['nif'];
$senha = $_POST['senha'];

/**criando usuario admim */
$sql = "INSERT INTO users (userName,passwords,tipo) value('$email','$senha','admin')";
if ($email != null) {
    mysqli_query($conector, $sql);
    /**pegando o ultimo id */
    $idUser = mysqli_insert_id($conector);

    /**criando empresa */
    $sql = "INSERT INTO empresas (designacao,objectivo,nif,contacto,responsavel) value('$nome','$obs','$nif',$telefone,$idUser)";
    mysqli_query($conector, $sql);

    mysqli_close($conector);

    header("Location: ../view/projectos.php");
} else {
    header("Location: ../view/conta.php");
}
