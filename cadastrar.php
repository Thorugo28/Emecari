<?php
session_start();
include("php/conexão.php");

$nome = mysqli_real_escape_string($mysqli, trim($_POST['nome']));
$sobrenome = mysqli_real_escape_string($mysqli, trim($_POST['sobrenome']));
$cpf = mysqli_real_escape_string($mysqli, trim($_POST['cpf']));
$celular = mysqli_real_escape_string($mysqli, trim($_POST['cpf']));
$estado = mysqli_real_escape_string($mysqli, trim($_POST['estado']));
$cidade = mysqli_real_escape_string($mysqli, trim($_POST['cidade']));
$endereco = mysqli_real_escape_string($mysqli, trim($_POST['endereço']));
$email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
$senha = mysqli_real_escape_string($mysqli, trim($_POST['senha']));

$sql = "select count(*) as total from usuarios where email = '$email'";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['email_existe'] = true;
	header('Location: cadastro.php');
	exit;
}

$sql = "INSERT INTO usuarios (nome, sobrenome, cpf, celular, estado, cidade, endereço, email, senha, data_cadastro) VALUES ('$nome', '$sobrenome', '$cpf', '$celular', '$estado', '$cidade', '$endereco', '$email', '$senha', NOW())";

if($mysqli->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$mysqli->close();

header('Location: php/painel.php');
exit;
?>