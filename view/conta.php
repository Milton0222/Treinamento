<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel criar perfil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

      <div class="form">
         
      <div class="formulario">

      <form action="../controller/storeFirma.php" method="POST">

                 <div>
                    <label for="">Fale da Firma</label> <br>
                    <textarea name="texto" id="" cols="60" rows="5" required></textarea>
                 </div>
                  <div class="grupo1">
                     <div>
                    <label for="">Firma</label><br>
                    <input type="text" name="nome" id="" maxlength="20" minlength="5" required placeholder="Insere o nome do projeto">
                 </div>
                 <div>
                    <label for="">Nif da Firma</label><br>
                    <input type="number" name="nif" id="" maxlength="20" minlength="5" required placeholder="Insere o nif da firma">
                 </div>
                  </div>
                 
                 <div>
                    <label for="">Email</label><br>
                    <input type="email" name="email" id="" placeholder="Insere o email da firma" required>
                 </div>
                 <div>
                    <label for="">Telefone</label><br>
                    <input type="number" name="telefone" id="" placeholder="Insere o contacto da firma">
                 </div>
                 <div>
                    <label for="">Password</label><br>
                    <div class="grupo">

                       <div>
                       <label for="">Criar:</label>
                       <input type="password" name="senha" id="">
                       </div>
                       <div>
                       <label for="">Confirmar:</label>
                       <input type="password" name="confirmar_senha" id="">
                       </div>
                        
                    </div>
                 </div>

                 <div class="botao">
                      <button type="submit">Criar</button>
                      <button type="reset">Limpar</button>
                 </div>
          </form>

      </div>
          

            <div class="formDireito">
                     <h4>PAINEL CRIAR CONTA DE UTILIZADOR</h4>
                     <p>
                              A gestão de projeto é uma actividade que cordenada 
                              tempo com recursos financeiros e gestão de pessoal.
                               Esta actividade precisa de ser gerida de forma dinamica
                                e eficiente.Cria um perfil para poder controlar seus 
                                projectos e o seu team de desenvolvimento
                     </p>
                     <div class="home">
                            <a href="index.php">Home</a>
                     </div>
            </div>
                
      </div>
    
</body>
</html>