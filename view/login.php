<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Acesso</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form">
         
         <div class="formulario">
   
         <form action="../controller/auth.php" method="Post">
   
                   
                    <div>
                       <label for="">UserName</label><br>
                       <input type="text" name="nome"  required>
                    </div>
                    <div>
                       <label for="">Passsword</label><br>
                       <input type="password" name="password" id="" required>
                    </div>
                    
   
                    <div class="botao">
                         <button type="submit">Entrar</button>
                         <button type="reset">Limpar</button>
                    </div>
             </form>
   
         </div>
             
   
               <div class="formDireito">
                        <h4>PAINEL DE ACESSO</h4>
                        <p>
                                 A gestão de projeto é uma actividade que cordenada 
                                 tempo com recursos financeiros e gestão de pessoal.
                                Para uma boa gestão e controlo de dados, ensere ssuas credncias de acesso.
                        </p>
                        <div class="home">
                               <a href="index.php">Home</a>
                        </div>
               </div>
                   
         </div>
   
    
</body>
</html>