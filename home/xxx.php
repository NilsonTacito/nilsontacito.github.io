<?php
session_start();
include('conexao.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT nome FROM cliente WHERE email = '{$email}' AND senha = '{$senha}'";
$result = mysqli_query($conn,$sql);

$_SESSION['logado'] = TRUE;
$_SESSION['nome'] = $result;

$row = mysqli_num_rows($result);
    if($row == 1) {
        header('Location: http://192.168.1.30/tcc/dash/examples/cadastro-veiculo.php');
        exit();
    }
?>

