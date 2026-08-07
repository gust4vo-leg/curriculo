<?php
session_start();
require_once "partials/crud.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$email = trim($_POST["email"] ?? "");
$senha = $_POST["senha-login"] ?? "";

if ($email === "" || $senha === "") {
    header("Location: index.php?login=1&erro=1");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->execute([$email]);

$usuario = $stmt->fetch();

if (!$usuario) {
    header("Location: index.php?login=1&erro=1");
    exit;
}

if (!password_verify($senha, $usuario["senha"])) {
    header("Location: index.php?login=1&erro=1");
    exit;
}

$_SESSION["usuario_id"] = $usuario["id"];
$_SESSION["nome"] = $usuario["nome"];

header("Location: index.php");
exit;
