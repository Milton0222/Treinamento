<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Projectos</title>

     <link rel="stylesheet" href="dasboard.css">
     <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
</head>

<body>

     <div class="principal">

          <div class="menuSuperio">
               <div class="user">
                    <div class="dashboard">
                         <a href="dashboard.php">DASHBOARD</a>

                         <?php
                         require_once("../controller/conexao.php");

                           $sql = "SELECT *FROM pessoal;";

                         $resultado = mysqli_query($conector, $sql);

                         $sql="SELECT *FROM empresas LIMIT 1;";

                         $empresa=mysqli_query($conector,$sql);

                         $totalregisto = mysqli_num_rows($resultado);

                         ?>
                    </div>
                    <div class="perfil">
                         <select name="" id="">
                              <option value="" selected>UserName</option>
                              <option value="">Definição</option>
                              <option value="">Sair</option>
                         </select>
                    </div>

               </div>


          </div>
          <div class="conteudo">
               <div class="menuEsquerdo">
                    <a href="index.php">
                         <li class="ativar"><strong>Home</strong></li>
                    </a>
                    <ul>

                         <a href="grupos.php">
                              <li> <i class='bxr  bx-community'></i> <strong>Grupos</strong></li>
                         </a>
                         <a href="tarefas.php">
                              <li><i class='bxr  bx-calendar-check'  ></i> <strong>Tarefas</strong></li>
                         </a>
                         <a href="projectos.php">
                              <li><i class='bxr  bx-list-square'  ></i> <strong>Projetos</strong></li>
                         </a>
                         <a href="pessoas.php">
                              <li><i class='bxr  bx-user'  ></i> <strong>Funcionarios</strong></li>
                         </a>
                         <a href="">
                              <li class="sair"><i class='bxr  bx-flower-alt-2'></i> <!--<strong>Definição</strong>--></li>
                         </a>
                    </ul>

               </div>
               <div class="graficos1">
                     <table class="table" style="margin-top: 0px;">
                           <thead>
                              <?php 
                                 while($listae=mysqli_fetch_assoc($empresa)){ 
                                      $firma=$listae['designacao'];
                                      $email=$listae['objectivo'];
                                      $nif=$listae['nif'];
                                      $telefone=$listae['contacto'];

                                  echo" <th>Firma: <td>$firma</td></th><th>NIF: <td>$nif</td></th><th>Contacto: <td>$telefone</td></th><th>Objectivo: <td>$email</td></th>";
                                 }
                             ?>
                                
                           </thead>

                     </table>
                    <form action="" method="get" class="form">
                         <h3>GESTÃO DE PESSOAL</h3>
                     <a href="pessoaCriar.php"><strong>+</strong></a>
                         <div class="gsearch">
                                  
                              <input type="text" name="search" placeholder="Informe o parametro de pesquisa" required>
                              <button type="submit">Buscar</button>

                         </div>
                    </form>
                    <table class="table">
                         <thead>
                              <th>id</th>
                              <th>Nome</th>
                               <th>Função</th>
                              <th>Contacto</th>
                        
                              
                              <th>Metódo</th>
                         </thead>
                         <tbody>
                             
                              <?php

                              while ($dados = mysqli_fetch_assoc($resultado)) {
                                     $id = $dados['id'];
                                   $nome = $dados['nome'];
                                   $funcao = $dados['funcao'];
                                   $contato = $dados['contacto'];
                               


                                   echo "  <tr>
                                             <td>$id</td>
                                             <td>$nome</td>
                                             <td>$funcao</td>
                                             <td>$contato</td>
                                             <td>
                                             <div>
                                    <form action='../controller/pessoalController/deletePessoa.php' method='post'>
                                        <input type='hidden' value='$id' name='idcode'>
                                         <button type=submit class=apagar><i class=bxr  bx-trash-x></i> Apagar</button>
                                                       
                                   </form>
                                   <form action='../controller/pessoalController/updatePessoa.php' method='post'>
                                        <input type='hidden' value='$id' name='idcode'>
                                      
                                                        <button type=submit class=atualizar><i class=bxr bx-pencil-square></i>Atualizar</button>
                                   </form>
                                               </div>
                                                      
                                             </td>
                                             

                                        </tr>";
                              }

                              mysqli_close($conector);
                              ?>
                         </tbody>
                    </table>
                    <td class="grupo-metodo">
                         
                    </td>

               </div>

          </div>
     </div>

</body>

</html>