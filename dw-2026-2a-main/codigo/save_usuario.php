<?php
require_once "conexao.php";

$nome = $_POST['nome'];
$apelido = $_POST['apelido'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$foto = $_POST['foto'];

$sql = "INSERT INTO usuario (nome, apelido, email, senha, foto)
VALUES ('$nome', '$apelido', '$email', '$senha', '$foto')";

mysqli_query ($conexao, $sql);

header("location: login.php");

?>