<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Tarefa-Criar</title>
    <link rel="stylesheet" href="dasboard.css">
</head>

<body>

    <div class="principal">

        <div class="menuSuperio">
            <div class="user">
                <div class="dashboard">
                    <a href="dashboard.php">DASHBOARD</a>

                    <?php
                    require_once("../controller/conexao.php");

                    $sql = "SELECT *FROM projetos ;";

                    $resultado = mysqli_query($conector, $sql);

                    $sql = "SELECT *FROM empresas LIMIT 1;";

                    $empresa = mysqli_query($conector, $sql);

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
                         <a href="../controller/logout.php">
            <li class="sair"><i class='bx  bx-arrow-out-up-square-half'></i> <!--<strong>Definição <i class='bxr  bx-flower-alt-2'></i></strong>--></li>
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
                            $idprojecto=$listae['id'];
                            echo " <th>Firma: <td>$firma</td></th><th>NIF: <td>$nif</td></th><th>Contacto: <td>$telefone</td></th><th>Objectivo: <td>$email</td></th>";
                        }
                        ?>

                    </thead>

                </table>
                <form action="" method="get">
                    <h3>CADASTRO DE PROJECTOS</h3>
                    <a href="projectos.php"><strong>+</strong></a>
                    <div class="gsearch">

                        <input type="text" name="search" placeholder="Informe o parametro de pesquisa" required>
                        <button type="submit">Buscar</button>

                    </div>
                </form>
                    <!--form criar projecto-->
                    <div class="row">
                        <div class="col">
                            <form action="../controller/storeProjeto.php" method="post">

                                <div>
                                    <label for="">Descrição do Projato</label> <br>
                                    <textarea name="texto" id="" cols="60" rows="5" required></textarea>
                                </div>
                                <div>
                                    <label for="">Nome</label><br>
                                    <input type="text" name="nome" id="" maxlength="20" minlength="5" required placeholder="Insere o nome do projeto">
                                </div>
                                <div>
                                    <label for="">Duração</label><br>
                                    <input type="number" name="duracao" id="" placeholder="Insere a duração do projecto em dias">
                                </div>
                                <div>
                                    <label for="">Data</label><br>
                                    <div class="grupo">

                                        <div>
                                            <label for="">Inicio:</label>
                                            <input type="date" name="inicio" id="">
                                        </div>
                                        <div>
                                            <label for="">Fim:</label>
                                            <input type="date" name="fim" id="">
                                            <?php 
                                              echo  "<input type=text name=code value=$idprojecto class=idcode>";
                                            ?>
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