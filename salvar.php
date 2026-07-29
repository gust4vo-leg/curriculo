<?php

require_once "crud.php";

$id = create($pdo, "dados_pessoais", [
    "nome" => $_POST["nome"],
    "cargo" => $_POST["cargo_pessoal"],
    "cidade" => $_POST["cidade"],
    "data_nascimento" => $_POST["data_nascimento"],
    "resumo" => $_POST["resumo"],
    "informacoes_principais" => $_POST["cidade"]
]);

create($pdo, "contatos", [
    "dados_pessoais_id" => $id,
    "email" => $_POST["email"],
    "telefone" => $_POST["telefone"],
    "linkedin" => $_POST["linkedin"],
    "outro_perfil" => $_POST["github"]
]);

create($pdo, "formacao", [
    "dados_pessoais_id" => $id,
    "instituicao" => $_POST["instituicao"],
    "curso" => $_POST["curso"],
    "periodo_inicio" => $_POST["edu_inicio"],
    "periodo_fim" => $_POST["edu_fim"]
]);

create($pdo, "experiencias", [
    "dados_pessoais_id" => $id,
    "empresa" => $_POST["empresa"],
    "funcao" => $_POST["cargo_exp"],
    "periodo_inicio" => $_POST["exp_inicio"],
    "periodo_fim" => $_POST["exp_fim"],
    "descricao" => $_POST["descricao_exp"]
]);

header("Location: curriculo.php?id=".$id);
exit;