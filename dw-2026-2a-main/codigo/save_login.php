<?php
session_start();

require_once "conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuario WHERE email = ? AND senha = ?";
$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

if ($usuario = mysqli_fetch_assoc($resultado)) {

    $_SESSION['idusuario'] = $usuario['idusuario'];

    header("location: home.php");
    exit;

} else {
    echo "Email ou senha incorretos.";
}
?>
