<?php
session_start();
require_once "crud.php";

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
    header("Location: formulario.php");
    exit;
}

header("Location: curriculo.php?id=" . $curriculo["id"]);
exit;