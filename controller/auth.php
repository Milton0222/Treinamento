<?php 

       $username=$_POST['nome'];
       $senha=$_POST['password'];


       /* criar conexao com o banco de dados*/

       include_once("conexao.php");

       /** comando sql para buscar o user */
         $sql="SELECT *from users where userName='$username' and passwords='$senha';";

            $usuario=mysqli_query($conector, $sql);


           

            if($dados=mysqli_fetch_assoc($usuario)){
                    $name=$dados['userName'];
                    $senha=$dados['passwords'];
                    $tipo=$dados['tipo'];

                    /*criar <sessao**/

                    session_start();
                    $_SESSION['login']=$username;
                    $_SESSION['tipo']=$tipo;

                     mysqli_close($conector);
                    header("Location:../view/dashboard.php");
                    exit;


            }else{
                  header('Location: ../view/login.php?erro=Dados de acesso errados.');
                    exit;
            }

       echo  $username."<br>".$senha;


?>