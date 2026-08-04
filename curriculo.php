<?php
require_once "crud.php";
session_start();

if (!isset($_SESSION["usuario_id"])) {
  header("Location: index.php");
  exit;
}

$id = (int)($_GET["id"] ?? 0);

$curriculo = read($pdo, "curriculos", "id = $id");

if (!$curriculo) {
  die("Currículo não encontrado.");
}

$formacoes = readAll($pdo, "formacao", "curriculo_id = $id");
$experiencias = readAll($pdo, "experiencias", "curriculo_id = $id");

$form = $formacoes[0] ?? [];
$exp = $experiencias[0] ?? [];

$ehDono = isset($_SESSION["usuario_id"]) &&
  $curriculo["usuario_id"] == $_SESSION["usuario_id"];

if ($curriculo["usuario_id"] != $_SESSION["usuario_id"]) {
  die("Acesso negado.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil profissional</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&display=swap">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="icon" href="imagens/logoBra.png">
</head>

<body>
  <main>
    <div class="banner"></div>

    <div class="header">
      <div class="name-row">
        <div class="info-principais">
          <h1><?= htmlspecialchars($curriculo["nome"]) ?></h1>
          <p style="color: var(--detalhes-txt); font-size: 13.5px;"><?= date("d/m/Y", strtotime($curriculo["data_nascimento"])) ?></p>
          <div class="mais-detalhes">
            <p><?= htmlspecialchars($curriculo["cidade"]) ?></p>
          </div>
        </div>
        <?php if ($ehDono): ?>
          <div class="perfil-acoes">
            <button class="btn-edit" id="abrirPop">
              <i class="bi bi-pencil-square"></i>
            </button>
          </div>
        <?php endif; ?>
      </div>

      <div class="header-main">
        <div class="contatos">
          <span><?= htmlspecialchars($curriculo["email"]) ?></span>
          <span><?= htmlspecialchars($curriculo["telefone"]) ?></span>
          <span><?= htmlspecialchars($curriculo["linkedin"]) ?></span>
          <span><?= htmlspecialchars($curriculo["outros"]) ?></span>
        </div>

        <div class="cargo">
          <span><?= htmlspecialchars($curriculo["cargo"]) ?></span>
        </div>
      </div>
    </div>

    <section class="about">
      <h2>Sobre</h2>
      <p><?= htmlspecialchars($curriculo["resumo"]) ?></p>
    </section>

    <section>
      <h2>Experiência</h2>
      <div class="linha-tempo">

        <?php foreach ($experiencias as $exp) : ?>

          <div class="entre">
            <div class="entre-body">
              <h3><?= htmlspecialchars($exp["cargo"]) ?></h3>
              <p class="meta"><strong><?= htmlspecialchars($exp["empresa"]) ?></strong> · <?= htmlspecialchars($exp["periodo_inicio"]) ?> — <?= htmlspecialchars($exp["periodo_fim"]) ?></p>
              <p><?= htmlspecialchars($exp["descricao"]) ?></p>
            </div>
          </div>

        <?php endforeach; ?>

      </div>
    </section>

    <section>
      <h2>Formação</h2>
      <div class="formacao-list">

        <?php foreach ($formacoes as $form) : ?>

          <div class="edu-card">
            <div>
              <h3><?= htmlspecialchars($form["instituicao"]) ?></h3>
              <p class="curso"><?= htmlspecialchars($form["curso"]) ?></p>
            </div>
            <span class="periodo"><?= htmlspecialchars($form["periodo_inicio"]) ?> — <?= htmlspecialchars($form["periodo_fim"]) ?></span>
          </div>

        <?php endforeach; ?>
      </div>
    </section>
  </main>

  <div id="overlayPopup" class="popup-overlay escondido">

    <div class="popup-content">

      <div class="popup-header">
        <h2>Editar Informações do Currículo</h2>
        <button id="fecharPop" type="button" class="btn-close-pop" aria-label="Fechar">&times;</button>
      </div>

      <div class="popup-body">
        <form method="POST" action="salvar.php" id="formCurriculo">

          <fieldset class="form-section">
            <legend>Dados Pessoais</legend>
            <div class="grid-2">
              <div class="form-group">
                <label for="nome">Nome completo</label>
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($curriculo["nome"]) ?>">
              </div>
              <div class="form-group">
                <label for="cargo_pessoal">Cargo</label>
                <input type="text" id="cargo_pessoal" name="cargo_pessoal"
                  value="<?= htmlspecialchars($curriculo["cargo"]) ?>">
              </div>
            </div>
            <div class="grid-2">
              <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" id="cidade" name="cidade" value="<?= htmlspecialchars($curriculo["cidade"]) ?>">
              </div>
              <div class="form-group">
                <label for="data_nascimento">Data de nascimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento" value="<?= htmlspecialchars($curriculo["data_nascimento"]) ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="resumo">Resumo profissional</label>
              <textarea id="resumo" name="resumo" rows="4"
                placeholder="Escreva um breve resumo sobre sua carreira..."><?= htmlspecialchars($curriculo["resumo"]) ?></textarea>
            </div>
          </fieldset>

          <fieldset class="form-section">
            <legend>Contato</legend>
            <div class="grid-2">
              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($curriculo["email"]) ?>">
              </div>
              <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone" value="<?= htmlspecialchars($curriculo["telefone"]) ?>">
              </div>
            </div>
            <div class="grid-2">
              <div class="form-group">
                <label for="linkedin">LinkedIn (URL)</label>
                <input type="url" id="linkedin" name="linkedin" value="<?= htmlspecialchars($curriculo["linkedin"]) ?>">
              </div>
              <div class="url">
                <div class="form-group">
                  <label for="github">Outros (URL)</label>
                  <input type="url" id="outros" name="outros" value="<?= htmlspecialchars($curriculo["outros"]) ?>">
                </div>
              </div>
            </div>
          </fieldset>

          <fieldset class="form-section">
            <legend>Formação Acadêmica</legend>
            <div class="grid-2">
              <div class="form-group">
                <label for="instituicao">Instituição</label>
                <input type="text" id="instituicao" name="instituicao" value="<?= htmlspecialchars($form["instituicao"]) ?>">
              </div>
              <div class="form-group">
                <label for="curso">Curso</label>
                <input type="text" id="curso" name="curso" value="<?= htmlspecialchars($form["curso"]) ?>">
              </div>
            </div>
            <div class="grid-2">
              <div class="form-group">
                <label for="edu_inicio">Data de início</label>
                <input type="date" id="edu_inicio" name="edu_inicio" value="<?= htmlspecialchars($form["periodo_inicio"]) ?>">
              </div>
              <div class="form-group">
                <label for="edu_fim">Data de término</label>
                <input type="date" id="edu_fim" name="edu_fim" value="<?= htmlspecialchars($form["periodo_fim"]) ?>">
              </div>
            </div>
          </fieldset>

          <fieldset class="form-section">
            <legend>Experiências Profissionais</legend>
            <div class="grid-2">
              <div class="form-group">
                <label for="empresa">Empresa</label>
                <input type="text" id="empresa" name="empresa" value="<?= htmlspecialchars($exp["empresa"]) ?>">
              </div>
              <div class="form-group">
                <label for="cargo_exp">Cargo exercido</label>
                <input type="text" id="cargo_exp" name="cargo_exp" value="<?= htmlspecialchars($exp["cargo"]) ?>">
              </div>
            </div>
            <div class="grid-2">
              <div class="form-group">
                <label for="exp_inicio">Data de início</label>
                <input type="date" id="exp_inicio" name="exp_inicio" value="<?= htmlspecialchars($exp["periodo_inicio"]) ?>">
              </div>
              <div class="form-group">
                <label for="exp_fim">Data de término</label>
                <input type="date" id="exp_fim" name="exp_fim" value="<?= htmlspecialchars($exp["periodo_fim"]) ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="descricao_exp">Descrição das atividades</label>
              <textarea id="descricao_exp" name="descricao_exp" rows="3"
                placeholder="Descreva suas responsabilidades e conquistas..."><?= htmlspecialchars($exp["descricao"]) ?></textarea>
            </div>
          </fieldset>

          <div class="popup-actions">
            <button type="button" id="btnCancelar" class="btn-secondary">Cancelar</button>
            <button type="submit" class="btn-primary">Salvar Alterações</button>
          </div>
        </form>
      </div>

    </div>
  </div>


  <script>
    const overlayPopup = document.getElementById('overlayPopup');
    const btnAbrir = document.getElementById('abrirPop');
    const btnFechar = document.getElementById('fecharPop');
    const btnCancelar = document.getElementById('btnCancelar');

    const abrirModal = () => {
      overlayPopup.classList.remove('escondido');
      document.body.style.overflow = 'hidden';
    };

    const fecharModal = () => {
      overlayPopup.classList.add('escondido');
      document.body.style.overflow = '';
    };

    if (btnAbrir) btnAbrir.addEventListener('click', abrirModal);
    btnFechar.addEventListener('click', fecharModal);
    btnCancelar.addEventListener('click', fecharModal);
  </script>
</body>

</html>