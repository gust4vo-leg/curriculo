<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário - Curriculo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="partials/css/header.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="icon" href="imagens/logoBra.png">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <?php require_once "partials/header.php" ?>
    <div class="header">
        <h1>Crie seu Currículo</h1>
        <p>Preencha as informações abaixo para gerar e atualizar seu currículo.</p>
    </div>
    <main>
        <form method="POST" action="salvar.php" id="formCurriculo" class="form-principal">

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
                            <label for="outros">Outros (URL)</label>
                            <input type="text" id="outros" name="outros" placeholder="outros">
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset class="form-section" id="formacao">
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
    </main>

    <div class="popup-overlay escondido" id="overlayPopup">
        <div class="container-login">
            <div class="card-login">
                <form action="index.php" method="POST" class="form-popup">
                    <h2>Login</h2>

                    <div class="campo">
                        <div class="inserir">
                            <input type="email" placeholder="Email" name="email-login" />
                            <input type="password" placeholder="Senha" name="senha-login" />
                        </div>
                        <a href="#" style="font-size: .65em; margin-top: -.5em;">Esqueceu senha?</a>
                    </div>

                    <div class="click">
                        <button type="button" id="fecharPop" class="botao">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const overlayPopup = document.getElementById('overlayPopup');
        const btnAbrir = document.getElementById('abrirPop');
        const btnFechar = document.getElementById('fecharPop');

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