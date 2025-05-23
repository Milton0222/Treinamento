<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

      <div class="form">
         
      <div class="formulario">

      <form action="registar.php" method="post">

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
                       </div>
                        
                    </div>
                 </div>

                 <div class="botao">
                      <button type="submit">Registar</button>
                      <button type="reset">Limpar</button>
                 </div>
          </form>

      </div>
          

            <div class="formDireito">
                     <h4>CADASTRA SEUS PROJETOS</h4>
                     <p>
                              A gestão de projeto é uma actividade que cordenada 
                              tempo com recursos financeiros e gestão de pessoal.
                               Esta actividade precisa de ser gerida de forma dinamica e eficiente.
                     </p>
                     <div class="home">
                            <a href="index.php">Home</a>
                     </div>
            </div>
                
      </div>
    
</body>
</html>