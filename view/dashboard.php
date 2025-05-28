<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
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
                  include_once('../controller/conexao.php');

                       $sql="SELECT tarefas.id, tarefas.designacao, tarefas.estado,tarefas.data_inicio,tarefas.data_conclusao,
                                   pessoal.id AS 'pessoa_id', pessoal.nome, projetos.designacao AS 'projeto'
                             FROM tarefas JOIN pessoal_tarefas ON(tarefas.id=pessoal_tarefas.tarefa_id)
  				                              	JOIN pessoal ON(pessoal.id=pessoal_tarefas.pessoa_id)
  					                              JOIN projetos ON(projetos.id=tarefas.id_projeto)
  	                       	ORDER BY  pessoal_tarefas.data_atribuicao	DESC ;";

                          $tarefas=mysqli_query($conector,$sql);

                          $qlq="SELECT COUNT(*) AS 'qtd' FROM projetos;";

                             $projetos=mysqli_query($conector,$sql);

                          
                                 


                          mysqli_close($conector);


              ?>
        </div>
        <div class="perfil">
              <select name="" id="">
                <option value="" selected>UserName</option>
                <option value="">Definição</option>
                <option> <a href="index.php"></a>Sair</option>
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
      <div class="graficos">
        <div class="cartao">
          <div class="item">
            <div class="info">
              <div>
                <a href=""><i class='bxr  bx-community'></i></a>
              </div>
              <div>
                <h1>+1</h1>
              </div>
            </div>
            <hr>
            <h2>Pessoal</h2>
          </div>
          <div class="item">
            <div class="info">
              <div>
                <a href=""><i class='bxr  bx-list-square'  ></i></a>
              </div>
              <div>
                <h1>+1</h1>
              </div>
            </div>
            <hr>
            <h2>Projetos</h2>
          </div>
          <div class="item">
            <div class="info">
              <div>
                <a href=""><i class='bxr  bx-calendar-check'></i></a>
              </div>
              <div>
                <h1>+1 </h1>
              </div>
            </div>
            <hr>
            <h2>Tarefas</h2>
          </div>
        </div>

        <table class="table">
          <thead>
            <th>Projecto</th>
            <th>Data de Inicio</th>
            <th>Dias em Falta</th>
            <th>Data de conclusão</th>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>

            </tr>
          </tbody>
        </table>

      </div>
      <div class="detalhesDireito">
        <table class="table" style="margin-top: 0px;">
          <thead>
            <th>Tarefa</th>
            <th>Estado</th>
            <th>Data de conclusão</th>
          </thead>
          <tbody>

          <?php 
                while($listat=mysqli_fetch_assoc($tarefas)){
                      $nome=$listat['designacao'];
                      $estado=$listat['estado'];
                      $datac=$listat['data_conclusao'];
                      $projeto=$listat['projeto'];

                      echo " <tr>
                          <td>$nome</td>
                          <td>$estado</td>
                          <td>$datac</td>


                        </tr>";
                }


            ?>
           
          </tbody>
        </table>

      </div>
    </div>
  </div>

</body>

</html>