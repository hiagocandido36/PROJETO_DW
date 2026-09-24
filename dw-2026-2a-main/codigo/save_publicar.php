<?php
require_once "conexao.php";

$idusuario = $_POST['idusuario'];
$texto = $_POST['texto'];

$sql = "INSERT INTO postagem (texto, idusuario) VALUES (?, ?)";
$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "si", $texto, $idusuario);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

header("location: home.php");





?>