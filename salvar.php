<?php

session_start();
require_once "partials/crud.php";

if (!isset($_SESSION["usuario_id"])) {
    header("Location: index.php");
    exit;
}

$curriculo = read(
    $pdo,
    "curriculos",
    "usuario_id = " . (int)$_SESSION["usuario_id"]
);

if (!$curriculo) {

    $id = create($pdo, "curriculos", [
        "usuario_id" => $_SESSION["usuario_id"],
        "nome" => $_POST["nome"],
        "cargo" => $_POST["cargo_pessoal"],
        "cidade" => $_POST["cidade"],
        "data_nascimento" => $_POST["data_nascimento"],
        "resumo" => $_POST["resumo"],
        "email" => $_POST["email"],
        "telefone" => $_POST["telefone"],
        "linkedin" => $_POST["linkedin"],
        "outros" => $_POST["outros"]
    ]);

    create($pdo, "formacao", [
        "curriculo_id" => $id,
        "instituicao" => $_POST["instituicao"],
        "curso" => $_POST["curso"],
        "nivel" => $_POST["nivel"] ?? null,
        "periodo_inicio" => $_POST["edu_inicio"],
        "periodo_fim" => $_POST["edu_fim"]
    ]);

    create($pdo, "experiencias", [
        "curriculo_id" => $id,
        "empresa" => $_POST["empresa"],
        "cargo" => $_POST["cargo_exp"],
        "periodo_inicio" => $_POST["exp_inicio"],
        "periodo_fim" => $_POST["exp_fim"],
        "descricao" => $_POST["descricao_exp"]
    ]);
} else {

    $id = $curriculo["id"];

    update($pdo, "curriculos", [
        "nome" => $_POST["nome"],
        "cargo" => $_POST["cargo_pessoal"],
        "cidade" => $_POST["cidade"],
        "data_nascimento" => $_POST["data_nascimento"],
        "resumo" => $_POST["resumo"],
        "email" => $_POST["email"],
        "telefone" => $_POST["telefone"],
        "linkedin" => $_POST["linkedin"],
        "outros" => $_POST["outros"]
    ], "id = $id");

    update($pdo, "formacao", [
        "instituicao" => $_POST["instituicao"],
        "curso" => $_POST["curso"],
        "nivel" => $_POST["nivel"] ?? null,
        "periodo_inicio" => $_POST["edu_inicio"],
        "periodo_fim" => $_POST["edu_fim"]
    ], "curriculo_id = $id");

    update($pdo, "experiencias", [
        "empresa" => $_POST["empresa"],
        "cargo" => $_POST["cargo_exp"],
        "periodo_inicio" => $_POST["exp_inicio"],
        "periodo_fim" => $_POST["exp_fim"],
        "descricao" => $_POST["descricao_exp"]
    ], "curriculo_id = $id");
}

header("Location: curriculo.php?id=" . $id);
exit;
