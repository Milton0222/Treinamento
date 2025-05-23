<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão Tarefas</title>
     <link rel="stylesheet" href="dasboard.css">
</head>

<?php
      include_once('../controller/conexao.php');
      $sql="SELECT *FROM projetos;";

      $projetos=mysqli_query($conector,$sql);
?>
<body>
    <div class="principal">

        <div class="menuSuperio">
            <div class="user">
                <div class="dashboard">
                    <a href="dashboard.php">DASHBOARD</a>
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
                      

                    </thead>

                </table>
                <form action="" method="get" class="form">
                    <h3>CADASTRO DE TAREFAS</h3>
                    <a href="tarefas.php"><strong>+</strong></a>
                    <div class="gsearch">

                        <input type="text" name="search" placeholder="Informe o parametro de pesquisa" required>
                        <button type="submit">Buscar</button>

                    </div>
                </form>
                    <!--form criar projecto-->
                    <div class="row">
                        <div class="col">
                            <form action="../controller/tarefaController/storeTarefa.php" method="post">

                                <div>
                                    <label for="">Designação da Tarefa</label> <br>
                                    <textarea name="designacao" id="" cols="60" rows="5" required></textarea>
                                </div>
                                <div>
                                    <label for="">Status</label><br>
                                    <select name="estado" id="">
                                        <option value="">Selecionar</option>
                                        <option value="Fazendo">Fazendo</option>
                                        <option value="Feito">Feito</option>
                                        <option value="Pendente">Pendente</option>
                                        
                                    </select>
                                </div>
                                <div>
                                    <label for="">Projecto</label><br>
                                    <select name="id_projeto" id="">
                                        <option value="">Selecionar</option>
                                        <?php

                                                while($lista=mysqli_fetch_assoc($projetos)){
                                                    $id=$lista['id'];
                                                    $nome=$lista['designacao'];
                                            
                                                      echo  " <option value=$id>$nome</option>";
                                                }
                                              

                                        ?>
                                         
                                    </select>
                                </div>
                                <div>
                                    <label for="">Data</label><br>
                                    <div class="grupo">

                                        <div>
                                            <label for="">Inicio:</label>
                                            <input type="date" name="inicio" id="">
                                        </div>
                                        <div>
                                            <label for="">Conclusão:</label>
                                            <input type="date" name="fim" id="">
                                            <input type=text name=code value="" class="idcode">
                                        </div>

                                    </div>
                                </div>

                                <div class="botao">
                                    <button type="submit">Salvar</button>
                                    <button type="reset">Limpar</button>
                                </div>
                            </form>



                        </div>
                        <div class="col" style="margin: 30px; margin-top: 100px;">
                            <h4>FAÇA A GESTÃO EM CLIQUES</h4>
                     <p>
                              A gestão de projeto é uma actividade que cordenada 
                              tempo com recursos financeiros e gestão de pessoal.
                               Esta actividade precisa de ser gerida de forma dinamica e eficiente.
                     </p>

                        </div>
                    </div>


            </div>

        </div>
    </div>




    
</body>
</html>