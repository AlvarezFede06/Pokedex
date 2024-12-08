<?php
session_start();
require_once("funciones.php");

$pdo = conectarDB();

$usuario = $_POST["usuario"];
$clave = $_POST["clave"];

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$clave'";
$stmt = $pdo->query($sql);

if ($stmt->rowCount() > 0) {
    $_SESSION["logueado"] = 1;
    $_SESSION["usuario"] = $usuario;
    header("Location: index.php");
    $pdo = null;
    exit();
} else {
    $_SESSION['error'] = 'Usuario o contraseña incorrectos';
    header("Location: index.php?");
    $pdo = null;
    exit();
}
