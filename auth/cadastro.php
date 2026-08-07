<?php
session_start();
require_once "../partials/crud.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../cadastrar.php");
    exit;
}

$nome = trim($_POST["nome-cadastro"] ?? "");
$email = trim($_POST["email-cadastro"] ?? "");
$senha = $_POST["senha-cadastro"] ?? "";
$confirmar = $_POST["confirmar-senha-cadastro"] ?? "";

if ($nome === "" || $email === "" || $senha === "" || $confirmar === "") {
    die("Preencha todos os campos.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("E-mail inválido.");
}

if ($senha !== $confirmar) {
    die("As senhas não coincidem.");
}

// Verifica se o e-mail já existe
$stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
$stmt->execute([$email]);

if ($stmt->fetch()) {
    die("Este e-mail já está cadastrado.");
}

// Criptografa a senha
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

// Salva o usuário
$id = create($pdo, "usuarios", [
    "nome" => $nome,
    "email" => $email,
    "senha" => $senhaHash
]);

// Faz login automaticamente
$_SESSION["usuario_id"] = $id;
$_SESSION["nome"] = $nome;

header("Location: ../index.php");
exit;