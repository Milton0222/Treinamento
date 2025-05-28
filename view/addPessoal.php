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
                                $grupo_id=$_POST['idGrupo'];

                                   

                            $sql="SELECT *FROM pessoal where funcao='tecnico';";
                                 /*executar comando*/ 
                                
                                 $pessoal=mysqli_query($conector,$sql);

                            /**buscar users supervisor */
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


                    </thead>

                </table>
                <form action="" method="get" class="form">
                    <h3>Adicionar Pessoal</h3>
                    <a href="tarefas.php"><strong>+</strong></a>
                    <div class="gsearch">

                        <input type="text" name="search" placeholder="Informe o parametro de pesquisa" required>
                        <button type="submit">Buscar</button>

                    </div>
                </form>
                <!--form add pessoal-->
                <div class="row">
                    <div class="col">
                        <form action="../controller/grupoController/addGrupo.php" method="post">

                            <div>
                                <label for=""></label> <br>
                                <textarea name="designacao" id="" cols="60" rows="5" disabled>1-Seleciona o funcionario;
2-Envia o formulario;
3-Em seguida a plataforma vai adicionar o funcionario ao grupo.
                                </textarea>
                            </div>
                             <div>
                                    <input type="hidden" name="id_grupo" value=<?php echo $grupo_id;?>>
                                    <label for="">Data</label>
                                    <input type="date" name="datar" id="" required>
                               
                             </div>
                            <div>
                                <label for="">Funcionario</label><br>
                                <select name="pessoal_id" id="" required>
                                    <option value="">Selecionar</option>
                                    <?php
                                    while ($listas = mysqli_fetch_assoc($pessoal)) {
                                        $name = $listas['nome'];
                                        $id = $listas['id'];

                                        echo "  <option value=$id>$name</option>";
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