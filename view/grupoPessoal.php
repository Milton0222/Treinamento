<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Grupo-Pessoal</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
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

                         $id_grupo = $_POST['idGrupo'];

                         $sql = "SELECT *FROM pessoal;";

                         $resultado = mysqli_query($conector, $sql);

                         $sql = "SELECT *FROM empresas LIMIT 1;";

                         $empresa = mysqli_query($conector, $sql);

                         $totalregisto = mysqli_num_rows($resultado);

                         $sql = "SELECT grupos.designacao,grupos.qtdPessoal,grupos.id,grupos.supervisor,projetos.designacao AS 'projeto'
                                      ,pessoal.nome, pessoal.contacto,pessoal.funcao,pessoal.id as 'pessoa_id'
                                    FROM grupo_pessoal JOIN grupos ON(grupo_pessoal.grupo=grupos.id)
   						                    	JOIN	pessoal ON(pessoal.id=grupo_pessoal.pessoa_id)
   						                    	JOIN projetos ON(grupos.projeto_id=projetos.id)
                                    where grupos.id=$id_grupo;";

                         $grupo = mysqli_query($conector, $sql);


                       

                         mysqli_close($conector);
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
                              <li><i class='bxr  bx-calendar-check'></i> <strong>Tarefas</strong></li>
                         </a>
                         <a href="projectos.php">
                              <li><i class='bxr  bx-list-square'></i> <strong>Projetos</strong></li>
                         </a>
                         <a href="pessoas.php">
                              <li><i class='bxr  bx-user'></i> <strong>Funcionarios</strong></li>
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
                              while ($listae = mysqli_fetch_assoc($empresa)) {
                                   $firma = $listae['designacao'];
                                   $email = $listae['objectivo'];
                                   $nif = $listae['nif'];
                                   $telefone = $listae['contacto'];

                                   echo " <th>Firma: <td>$firma</td></th><th>NIF: <td>$nif</td></th><th>Contacto: <td>$telefone</td></th><th>Objectivo: <td>$email</td></th>";
                              }
                              ?>

                         </thead>

                    </table>
                    <form action="" method="get" class="form">
                         <h3>Grupos e Pessoal</h3>
                         <a href="pessoaCriar.php"><strong>+</strong></a>
                         <div class="gsearch">

                              <input type="text" name="search" placeholder="Informe o parametro de pesquisa" required>
                              <button type="submit">Buscar</button>

                         </div>
                    </form>
                    <table class="table">
                         <thead>
                              <th>Grupo</th>
                              <th>Projecto</th>
                              <th>Técnico</th>
                              <th>Função</th>
                              <th>Contacto</th>


                              <th>Metódo</th>
                         </thead>
                         <tbody>

                              <?php

                              while ($dados = mysqli_fetch_assoc($grupo)) {
                                   $id = $dados['id'];
                                   $pid=$dados['pessoa_id'];
                                   $projeto1 = $dados['projeto'];
                                   $nome = $dados['nome'];
                                   $funcao = $dados['funcao'];
                                   $contato = $dados['contacto'];
                                   $gruponome = $dados['designacao'];



                                   echo "  <tr>
                                   <td>$gruponome</td>
                                             <td>$projeto1</td>
                                             <td>$nome</td>
                                             <td>$funcao</td>
                                             <td>$contato</td>
                                             <td>
                                             <div>
                                                       <form action='definirTarefa.php' method='post'>
                                                            <input type='hidden' value='$id' name='idcode'>
                                                            <input type='hidden' value='$pid' name='idpessoa'>
                                                       <div class='modal-footer' style='display:flex;'>
                                                       <button type='submit' class='atualizar' >Definir</button>
                                                       </div>               
                                                                                                         
                                                       </form>
                                  
                                               </div>
                                                      
                                             </td>
                                             

                                        </tr>";
                              }

                              ?>

                         </tbody>
                    </table>
                    <td class="grupo-metodo">

                    </td>

               </div>

          </div>
     </div>

</body>
<script src="../bootstrap/js/bootstrap.js"></script>

</html>