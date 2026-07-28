<?php
  $nome = $_POST['nome'] ?? '';
  $cargo = $_POST['cargo_pessoal'] ?? '';
  $cidade = $_POST['cidade'] ?? '';
  $data = $_POST['data_nascimento'] ?? '';
  $resumo = $_POST['resumo'] ?? '';

  $email = $_POST['email'] ?? '';
  $telefone = $_POST['telefone'] ?? '';
  $linkedin = $_POST['linkedin'] ?? '';
  $github = $_POST['github'] ?? '';

  $instituicao = $_POST['instituicao'] ?? '';
  $curso = $_POST['curso'] ?? '';
  $edu_inicio = $_POST['edu_inicio'] ?? '';
  $edu_fim = $_POST['edu_fim'] ?? '';

  $empresa = $_POST['empresa'] ?? '';
  $cargo_exp = $_POST['cargo_exp'] ?? '';
  $exp_inicio = $_POST['exp_inicio'] ?? '';
  $exp_fim = $_POST['exp_fim'] ?? '';
  $descricao = $_POST['descricao_exp'] ?? '';
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
</head>

<body>
  <main>
    <div class="banner"></div>

    <div class="header">
      <div class="name-row">
        <div class="info-principais">
          <h1><?= htmlspecialchars($nome) ?></h1>
          <div class="mais-detalhes">
            <p><?= htmlspecialchars($cidade) ?></p>
            <p><?= htmlspecialchars($data) ?></p>
          </div>
        </div>
        <div class="perfil-acoes">
          <button class="btn-edit" id="abrirPop"><i class="bi bi-pencil-square"></i></button>
        </div>
      </div>

      <div class="contatos">
        <span><?= htmlspecialchars($email) ?></span>
        <span>(11) 99999-0000</span>
        <span>linkedin.com/in/mariafernandes</span>
        <span>github.com/mariafernandes</span>
      </div>
    </div>

    <section class="about">
      <h2>Sobre</h2>
      <p>Profissional com 5 anos de experiência em análise de dados, especializada em transformar
        informações complexas em decisões de negócio. Forte domínio de SQL, Python e visualização de
        dados, com histórico de projetos que aumentaram a eficiência operacional em equipes multidisciplinares.</p>
    </section>

    <section>
      <h2>Experiência</h2>
      <div class="linha-tempo">

        <div class="entre">
          <div class="entre-body">
            <h3>Analista de Dados Pleno</h3>
            <p class="meta"><strong>Empresa Alfa Tecnologia</strong> · jan 2023 — atual</p>
            <p>Liderança de projetos de BI, criação de dashboards e automação de relatórios que
              reduziram o tempo de análise da equipe em 40%.</p>
          </div>
        </div>

        <div class="entre">
          <div class="entre-body">
            <h3>Analista de Dados Júnior</h3>
            <p class="meta"><strong>Empresa Beta Consultoria</strong> · mar 2021 — dez 2022</p>
            <p>Apoio na construção de pipelines de dados e elaboração de relatórios gerenciais
              para times comerciais.</p>
          </div>
        </div>

        <div class="entre">
          <div class="entre-body">
            <h3>Estagiária de TI</h3>
            <p class="meta"><strong>Empresa Gama Sistemas</strong> · jul 2019 — fev 2021</p>
            <p>Suporte a projetos internos e primeiros contatos com análise e organização de dados.</p>
          </div>
        </div>

      </div>
    </section>

    <section>
      <h2>Formação</h2>
      <div class="formacao-list">

        <div class="edu-card">
          <div>
            <h3>Universidade Federal</h3>
            <p class="curso">Ciência da Computação</p>
          </div>
          <span class="periodo">2016 — 2020</span>
        </div>

        <div class="edu-card">
          <div>
            <h3>Instituto de Tecnologia</h3>
            <p class="curso">Pós-graduação em Ciência de Dados</p>
          </div>
          <span class="periodo">2021 — 2022</span>
        </div>

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
        <form method="POST" action="curriculo.php" id="formCurriculo">

          <fieldset class="form-section">
            <legend>Dados Pessoais</legend>
            <div class="grid-2-col">
              <div class="form-group">
                <label for="nome">Nome completo</label>
                <input type="text" id="nome" name="nome" placeholder="Ex: Maria Fernandes">
              </div>
              <div class="form-group">
                <label for="cargo_pessoal">Cargo</label>
                <input type="text" id="cargo_pessoal" name="cargo_pessoal"
                  placeholder="Ex: Analista de Dados Pleno">
              </div>
            </div>
            <div class="grid-2-col">
              <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" id="cidade" name="cidade" placeholder="Ex: São Paulo, SP">
              </div>
              <div class="form-group">
                <label for="data_nascimento">Data de nascimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento">
              </div>
            </div>
            <div class="form-group">
              <label for="resumo">Resumo profissional</label>
              <textarea id="resumo" name="resumo" rows="4"
                placeholder="Escreva um breve resumo sobre sua carreira..."></textarea>
            </div>
          </fieldset>

          <fieldset class="form-section">
            <legend>Contatos</legend>
            <div class="grid-2-col">
              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="nome@exemplo.com">
              </div>
              <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone" placeholder="(11) 99999-0000">
              </div>
            </div>
            <div class="grid-2-col">
              <div class="form-group">
                <label for="linkedin">LinkedIn (URL)</label>
                <input type="url" id="linkedin" name="linkedin" placeholder="://linkedin.com">
              </div>
              <div class="url">
                <div class="form-group">
                  <label for="github">GitHub (URL)</label>
                  <input type="url" id="github" name="github" placeholder="://github.com">
                </div>
              </div>
            </div>
            <div class="grid-3-col">
              <div class="form-group">
                <label for="outros">Outros</label>
                <input type="text" id="outros" name="outros" placeholder="outros">
              </div>
            </div>
          </fieldset>

          <fieldset class="form-section">
            <legend>Formação Acadêmica</legend>
            <div class="grid-2-col">
              <div class="form-group">
                <label for="instituicao">Instituição</label>
                <input type="text" id="instituicao" name="instituicao" placeholder="Ex: Universidade Federal">
              </div>
              <div class="form-group">
                <label for="curso">Curso</label>
                <input type="text" id="curso" name="curso" placeholder="Ex: Ciência da Computação">
              </div>
            </div>
            <div class="grid-2-col">
              <div class="form-group">
                <label for="edu_inicio">Data de início</label>
                <input type="date" id="edu_inicio" name="edu_inicio">
              </div>
              <div class="form-group">
                <label for="edu_fim">Data de término</label>
                <input type="date" id="edu_fim" name="edu_fim">
              </div>
            </div>
          </fieldset>

          <fieldset class="form-section">
            <legend>Experiências Profissionais</legend>
            <div class="grid-2-col">
              <div class="form-group">
                <label for="empresa">Empresa</label>
                <input type="text" id="empresa" name="empresa" placeholder="Ex: Alfa Tecnologia">
              </div>
              <div class="form-group">
                <label for="cargo_exp">Cargo exercido</label>
                <input type="text" id="cargo_exp" name="cargo_exp" placeholder="Ex: Analista Júnior">
              </div>
            </div>
            <div class="grid-2-col">
              <div class="form-group">
                <label for="exp_inicio">Data de início</label>
                <input type="date" id="exp_inicio" name="exp_inicio">
              </div>
              <div class="form-group">
                <label for="exp_fim">Data de término</label>
                <input type="date" id="exp_fim" name="exp_fim">
              </div>
            </div>
            <div class="form-group">
              <label for="descricao_exp">Descrição das atividades</label>
              <textarea id="descricao_exp" name="descricao_exp" rows="3"
                placeholder="Descreva suas responsabilidades e conquistas..."></textarea>
            </div>
          </fieldset>

          <div class="popup-actions">
            <button type="button" id="btnCancelar" class="btn-secondary">Cancelar</button>
            <button type="submit" class="btn-primary">Salvar Currículo</button>
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