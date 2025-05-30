<?php
include_once("../controller/validar.php");

?>
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



          $userm = $_SESSION['login'];
          $tipoU = $_SESSION['tipo'];

          $sql = "SELECT tarefas.id, tarefas.designacao, tarefas.estado,tarefas.data_inicio,tarefas.data_conclusao,
                                   pessoal.id AS 'pessoa_id', pessoal.nome, projetos.designacao AS 'projeto'
                             FROM tarefas JOIN pessoal_tarefas ON(tarefas.id=pessoal_tarefas.tarefa_id)
  				                              	JOIN pessoal ON(pessoal.id=pessoal_tarefas.pessoa_id)
  					                              JOIN projetos ON(projetos.id=tarefas.id_projeto)
  	                       	ORDER BY  pessoal_tarefas.data_atribuicao	DESC ;";

          $tarefas = mysqli_query($conector, $sql);

          $sql = "SELECT *FROM projetos;";

          $projetos = mysqli_query($conector, $sql);

          $sql1 = "SELECT *FROM pessoal;";
          $pessoal = mysqli_query($conector, $sql1);



          $qtdpprojetos = mysqli_num_rows($projetos);

          $qtdtarefas = mysqli_num_rows($tarefas);
          $qtdpessoal = mysqli_num_rows($pessoal);


          $funcionario = [];
          $qtd = [];

          $sqld = "SELECT pessoal.nome, COUNT(tarefas.estado) AS 'qtd'
      FROM pessoal JOIN pessoal_tarefas ON(pessoal.id=pessoal_tarefas.pessoa_id)
      				JOIN tarefas ON(tarefas.id=pessoal_tarefas.tarefa_id)	
      WHERE tarefas.estado='Feito'
      GROUP BY pessoal.nome;";
          $pessoald = mysqli_query($conector, $sqld);

          while ($listad = mysqli_fetch_assoc($pessoald)) {
            $funcionario[] = $listad['nome'];
            $qtd[] = $listad['qtd'];
          }

          /*Converter vector*/

          $nomeP1 = implode("','", $funcionario);
          $qtdF = implode("','", $qtd);

          /*Tarefas pendentes*/
          $funcionarioP=[];
          $qtdP=[];

               $sqld = "SELECT pessoal.nome, COUNT(tarefas.estado) AS 'qtd'
      FROM pessoal JOIN pessoal_tarefas ON(pessoal.id=pessoal_tarefas.pessoa_id)
      				JOIN tarefas ON(tarefas.id=pessoal_tarefas.tarefa_id)	
      WHERE tarefas.estado='Pendente'
      GROUP BY pessoal.nome;";
          $pessoalP = mysqli_query($conector, $sqld);

          while ($listad = mysqli_fetch_assoc($pessoalP)) {
            $funcionarioP[] = $listad['nome'];
            $qtdP[] = $listad['qtd'];
          }

          $nomeTP = implode("','", $funcionarioP);
          $qtdTP = implode("','", $qtdP);


          /** tarefas em execucao */

          /*Tarefas pendentes*/
          $funcionarioE=[];
          $qtdE=[];

               $sqld = "SELECT pessoal.nome, COUNT(tarefas.estado) AS 'qtd'
      FROM pessoal JOIN pessoal_tarefas ON(pessoal.id=pessoal_tarefas.pessoa_id)
      				JOIN tarefas ON(tarefas.id=pessoal_tarefas.tarefa_id)	
      WHERE tarefas.estado='Fazendo'
      GROUP BY pessoal.nome;";
          $pessoalE = mysqli_query($conector, $sqld);

          while ($listad = mysqli_fetch_assoc($pessoalE)) {
            $funcionarioE[] = $listad['nome'];
            $qtdE[] = $listad['qtd'];
          }

          $nomeTE = implode("','", $funcionarioE);
          $qtdTE = implode("','", $qtdE);




          mysqli_close($conector);


          ?>
        </div>
        <div class="perfil">
          <select name="" id="" disabled>
            <option value="" selected><?php print $userm; ?></option>
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
            <li><i class='bxr  bx-list-square'></i> <strong>Projetos</strong></li>
          </a>
          <?php
          if ($tipoU == 'admin') {
            print "  
                         <a href='pessoas.php'>
                              <li><i class='bxr  bx-user'  ></i> <strong>Funcionarios</strong></li>
                         </a>";
          }
          ?>
          <a href="../controller/logout.php">
            <li class="sair"><i class='bx  bx-arrow-out-up-square-half'></i> <!--<strong>Definição <i class='bxr  bx-flower-alt-2'></i></strong>--></li>
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
                <h1>+<?php echo $qtdpessoal; ?> </h1>
              </div>
            </div>
            <hr>
            <h2>Pessoal</h2>
          </div>
          <div class="item">
            <div class="info">
              <div>
                <a href=""><i class='bxr  bx-list-square'></i></a>
              </div>
              <div>
                <h1>+<?php echo $qtdpprojetos; ?></h1>
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
                <h1>+<?php echo $qtdtarefas; ?> </h1>
              </div>
            </div>
            <hr>
            <h2>Tarefas</h2>
          </div>
        </div>

        <table class="table">
          <thead>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
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

        <style>
               .relatorio{
                   display: flex;
               }
               .relatorio canvas{
                   width: 100%;
                   margin-right: 10px;
               }
        </style>
          <div class="relatorio">
            <div>
              <canvas id="myChart" class="chart1"></canvas>
            </div>
            <div>
              <canvas id="myChart1"></canvas>

            </div>
              

          </div>
           <div>
              <canvas id="myChart2"></canvas>

            </div>

        


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
            while ($listat = mysqli_fetch_assoc($tarefas)) {
              $nome = $listat['designacao'];
              $estado = $listat['estado'];
              $datac = $listat['data_conclusao'];
              $projeto = $listat['projeto'];

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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [' <?php echo $nomeP1; ?> '],
      datasets: [{
        label: '#Tarefas Concluidas',
        data: ['<?php echo $qtdF; ?>'],
        backgroundColor: [' rgb(176, 161, 27)', 'Blue', 'green', 'red'],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const ctx1 = document.getElementById('myChart1');

  new Chart(ctx1, {
    type: 'polarArea',
    data: {
      labels: [' <?php echo $nomeTE; ?> '],
      datasets: [{
        label: '#Tarefas Em Execução',
        data: ['<?php echo $qtdTE; ?>'],
        backgroundColor: [' rgb(24, 114, 28)', 'Blue', 'green', 'red'],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const ctx2 = document.getElementById('myChart2');

  new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: [' <?php echo $nomeTP; ?> '],
      datasets: [{
        label: '#Tarefas Pendentes',
        data: ['<?php echo $qtdTP; ?>'],
        backgroundColor: [' rgb(205, 6, 9)', 'Blue', 'green', 'red'],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>


</html>