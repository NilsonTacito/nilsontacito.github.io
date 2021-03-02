<?php

session_start();
include("conexao.php");

if (!isset($_POST['email'], $_POST['senha'])) {
    $_SESSION['loggedoff'] = true;
    header('Location: vardumps.php');
    exit();
} else {   
    $nome_usuario = $_POST['nome']; 
    $sbnome_usuario = $_POST['sobrenome'];
    $documento_usuario = $_POST['documento'];
    $email_usuario = $_POST['email'];
    $senha_usuario = $_POST['senha'];
    $telefone_usuario = $_POST['telefone'];
    $endereco_usuario = $_POST['endereco'];
    $cep_usuario = $_POST['cep'];

    $query01 = "INSERT INTO cliente(documento, email, senha, nome, sobrenome, telefone, endereco, cep) VALUES ('{$documento_usuario}','{$email_usuario}', '{$senha_usuario}','{$nome_usuario}','{$sbnome_usuario}','{$telefone_usuario}','{$endereco_usuario}','{$cep_usuario}')";
    $resultado_01 = mysqli_query($conn, $query01);
        
    $rowcount=mysqli_num_rows($resultado_01);

    if($rowcount != null){
        $_SESSION['nome'] = $nome_usuário;
        $_SESSION['loggedin'] = TRUE;
        header('Location: cadastro-veiculo.php');
        exit();
    }
}

?>