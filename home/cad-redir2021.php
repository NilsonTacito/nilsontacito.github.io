<?php
session_start();

include("conexao.php");
$nome_usuario = $_POST['nome']; 
$sbnome_usuario = $_POST['sobrenome'];
$documento_usuario = $_POST['documento'];
$email_usuario = $_POST['email'];
$senha_usuario = $_POST['senha'];
$telefone_usuario = $_POST['telefone'];
$endereco_usuario = $_POST['endereco'];
$cep_usuario = $_POST['cep'];

$querycriaruser = "INSERT INTO cliente (documento, email, senha, nome, sobrenome, telefone, endereco, cep) VALUES ('{$documento_usuario}','{$email_usuario}', '{$senha_usuario}','{$nome_usuario}','{$sbnome_usuario}','{$telefone_usuario}','{$endereco_usuario}','{$cep_usuario}')";
$resultbolado = mysqli_query($conn, $querycriaruser);
//echo "New record created successfully";
$_SESSION['usuario'] = $nome_usuario;
header('Location: /tcc/dash/examples/cadastro-veiculo.php');
exit();
?>
