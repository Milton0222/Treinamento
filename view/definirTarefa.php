<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão Tarefas</title>
    <link rel="stylesheet" href="dasboard.css">
</head>



<body>
    <div class="principal">

        <div class="menuSuperio">
            <div class="user">
                <div class="dashboard">
                    <a href="dashboard.php">DASHBOARD</a>

                        <?php
                            include_once('../controller/conexao.php');

                            /**  buscar grupo e funcionario */
                                $grupo_id=$_POST['idcode'];
                                $pid=$_POST['idpessoa'];

                                   

                            $sql="SELECT *FROM pessoal where id=$pid;";
                                 /*executar comando*/ 
                                
                                 $pessoal=mysqli_query($conector,$sql);

                              /**buscar as tarefas do projjecto */

                              while($lista=mysqli_fetch_assoc($pessoal)){
                                      $idp=$lista['id'];
                                      $nomep=$lista['nome'];
                                      $funcao=$lista['funcao'];
                                      $contacto=$lista['contacto'];
                              }

                         $sql="SELECT tarefas.id, tarefas.designacao
                              FROM projetos JOIN tarefas ON(projetos.id=tarefas.id_projeto)
                                                       JOIN grupos  ON(grupos.projeto_id=projetos.id)
                              WHERE grupos.id=$grupo_id";

                              $tarefasProjeto=mysqli_query($conector,$sql);
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
                   <a href="../controller/logout.php">
            <li class="sair"><i class='bx  bx-arrow-out-up-square-half'></i> <!--<strong>Definição <i class='bxr  bx-flower-alt-2'></i></strong>--></li>
          </a>
                </ul>

            </div>
            <div class="graficos1">
                <table class="table" style="margin-top: 0px;">
                    <thead>


                    </thead>

                </table>
                <form action="" method="get" class="form">
                    <h3><?php echo "Sr(a) ".$nomep  ?> </h3>
                    <a href="tarefas.php"><strong>+</strong></a>
                    <div class="gsearch">

                        <input type="text" name="search" placeholder="Informe o parametro de pesquisa" required>
                        <button type="submit">Buscar</button>

                    </div>
                </form>
                <!--form add pessoal-->
                <div class="row">
                    <div class="col">
                        <form action="../controller/grupoController/definirTarefa.php" method="post">

                           
                             <div>
                                    <input type="hidden" name="id_grupo" value=<?php echo $grupo_id;?>>
                                    <input type="hidden" name="id_pessoa" value=<?php echo $idp;?>>

                                    <label for="">Data</label>
                                    <input type="date" name="datar" id="" required>
                               
                             </div>
                            <div>
                                <label for="">Tarefas</label><br>
                                <select name="tarefa_id" id="" required>
                                    <option value="">Selecionar</option>
                                    <?php
                                    while ($listas = mysqli_fetch_assoc($tarefasProjeto)) {
                                        $nome = $listas['designacao'];
                                        $id = $listas['id'];

                                        echo "  <option value=$id>$nome</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                          
                            <div class="botao">
                                <button type="submit">Enviar</button>
                                <button type="reset">Limpar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col" style="margin: 30px; margin-top: 100px;">
                        <h4>DADOS DO TÉCNICO</h4>
                            <table>
                                  <tr><th>ID: <td><?php echo $idp;?></td></th></tr>
                                  <tr><th>Nome: <td><?php echo $nomep;?></td></th></tr>
                                  <tr><th>Função: <td><?php echo $funcao;?></td></th></tr>
                                  <tr><th>Contacto: <td><?php echo $contacto;?></td></th></tr>

                            </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>