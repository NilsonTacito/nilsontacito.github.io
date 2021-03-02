<?php


//pra onde o form mandou
    include_once("conexao.php");
    $nome_usuario = $_POST['nome']; //cadê o sobrenome? kkk
    $cpf_usuario = $_POST['documento'];
    $email_usuario = $_POST['email'];
    $senha_usuario = $_POST['senha'];
    $telefone_usuario = $_POST['telefone'];
    $endereco_usuario = $_POST['endereco'];
    $cep_usuario = $_POST['cep'];
    //echo "$nome - $email";
    
    $result_usuario = "INSERT INTO cliente(nome, documento, email, senha, telefone, endereco, cep) VALUES ('$nome_usuario','$documento_usuario','$email_usuario', '$senha_usuario','$telefone_usuario','$endereco_usuario','$cep_usuario')";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    
    //preciso disso fazendo um select no banco!!!  
    
    
    
    //Ahh mulek! Aqui começa o php!
    session_start();
    include('conexao.php');
    
    if(empty($_POST['usuario']) || empty($_POST['senha'])) {
        header('Location: index.php');
        exit();
    }
    
    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    
    $query = "select usuario from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";
    
    $result = mysqli_query($conexao, $query);
    
    $row = mysqli_num_rows($result);
    
    if($row == 1) {
        $_SESSION['usuario'] = $usuario;
        header('Location: /tcc/crud/form-create.php');
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: index.php');
        exit();
    }







    ?>










  
?>