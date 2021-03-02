<?php

//pra onde o form mandou
    //session_start();
    include_once("conexao.php");
    $nome_usuario = $_POST['nome']; //cadê o sobrenome? kkk
    $sbnome_usuario = $_POST['sobrenome'];
    $documento_usuario = $_POST['documento'];
    $email_usuario = $_POST['email'];
    $senha_usuario = $_POST['senha'];
    $telefone_usuario = $_POST['telefone'];
    $endereco_usuario = $_POST['endereco'];
    $cep_usuario = $_POST['cep'];
    
    //aqui rola o insert
    $result_usuario = "INSERT INTO cliente(nome, sobrenome, documento, email, senha, telefone, endereco, cep) VALUES ('$nome_usuario','$sbnome_usuario','$documento_usuario','$email_usuario', '$senha_usuario','$telefone_usuario','$endereco_usuario','$cep_usuario')";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    //checar erro no insert
    
    //preciso disso fazendo um select no banco!!!  
    
    //aqui rola o select pros dados recém inputados
    /*$query = "SELECT nome FROM cliente WHERE email = '{$email_usuario}' AND senha = '{$senha_usuario}'";
    
    $result = mysqli_query($conn, $query);
    
    $row = mysqli_num_rows($result);
    

    if($row == 1) {
        $_SESSION['usuario'] = $nome_usuario;
        header('Location: /tcc/crud/form-create.php');
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: index.php');
        exit();
        }*/

        header('Location: /tcc/dash/examples/cadastro-veiculo.php');//mandando pra tela do cad veículo
        exit();
?>