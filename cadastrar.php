<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/cadastrar.css">
    <link rel="icon" href="imagens/logoBra.png">
    <link rel="stylesheet" href="css/global.css">
  </head>
  <body>
    <div class="container-cadastro">
      <div class="card-cadastro">
        <form action="cadastro.php" method="POST">
          <h2>Cadastrar-se</h2>

          <div class="campo">
            <div class="inserir">
              <label for="nome">Nome Completo</label>
              <input type="text" placeholder="Ex: Mario Cleber" name="nome-cadastro" required/>
            </div>
            <div class="inserir">
              <label for="senha">E-mail</label>
              <input type="email" placeholder="Ex: mariocleber@gmail.com" name="email-cadastro" required/>
            </div>
            <div class="inserir">
              <label for="senha">Senha</label>
              <input type="password" placeholder="Senha" name="senha-cadastro" required/>
            </div>
            <div class="inserir">
                <label for="confirmar-senha">Confirmar Senha</label>
                <input type="password" placeholder="Confirmar Senha" name="confirmar-senha-cadastro" required/>
            </div>
          </div>

          <div class="click">
            <button type="reset" class="cancelar"> Cancelar</button>
            <button type="submit" class="botao">Cadastrar-se</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
