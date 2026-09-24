<?php
session_start();

require_once "conexao.php";

if (!isset($_SESSION['idusuario'])) {
    header("location: login.php");
    exit;
}

$idusuario = $_SESSION['idusuario'];

$idpostagem = $_POST['idpostagem'];
$texto = $_POST['comentario'];

$sql = "INSERT INTO comentario (idusuario, idpostagem, texto) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt,"iis",$idusuario,$idpostagem,$texto);

mysqli_stmt_execute($stmt);

header("location: home.php");
exit;
?> 
