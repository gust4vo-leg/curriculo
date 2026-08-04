<?php
session_start();
?>

<header class="topo">
  <div class="topo-menu">
    <img src="imagens/logoTrans.png" class="logo">

    <div class="topo-direito">

      <?php if (isset($_SESSION["usuario_id"])) : ?>

        <span class="usuario">
          Olá, <?= htmlspecialchars($_SESSION["nome"]) ?>
        </span>
        <a href="curriculo.php" class="login">
          Meu Currículo
        </a>
        
        <a href="logout.php" class="cadastrar">
          Sair
        </a>

      <?php else : ?>

        <button type="button" class="login" id="abrirPop">
          Login
        </button>

        <a href="cadastrar.php" class="cadastrar">
          Cadastrar
        </a>

      <?php endif; ?>

    </div>
  </div>
</header>