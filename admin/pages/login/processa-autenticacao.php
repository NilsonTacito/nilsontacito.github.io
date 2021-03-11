<?php
session_start();
include('conexao.php');
$usuario = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);
$sql = "SELECT nome FROM administrador WHERE email = '{$usuario}' AND senha = '{$senha}'";
$result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);
    if($row == 1) {
        $logado = $result->fetch_array()[0];//esta é a maneira correta de trabalhar com o resultado da query
        $_SESSION['usuario'] = $logado;//motivo: mysqli_query() retorna um objeto, não uma string
        header('Location: /cliente/pages/mapa.php');
        exit();
    }

?>
