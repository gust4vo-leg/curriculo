<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require_once "crud.php";

$curriculo = null;

if (isset($_SESSION["usuario_id"])) {
  $curriculo = read(
    $pdo,
    "curriculos",
    "usuario_id = " . (int)$_SESSION["usuario_id"]
  );
}
?>

<header class="topo">
  <div class="topo-menu">
    <img src="imagens/logoTrans.png" class="logo">

    <div class="topo-direito">

      <?php if (isset($_SESSION["usuario_id"])) : ?>

        <?php if ($curriculo): ?>
          <a href="curriculo.php?id=<?= $curriculo["id"] ?>" class="login">
            Meu Currículo
          </a>
        <?php else: ?>
          <a href="index.php" class="login">
            Criar Currículo
          </a>
        <?php endif; ?>

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