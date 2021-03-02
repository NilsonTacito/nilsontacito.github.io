<?php
//Conectar ao banco ---- exeplos esse files aqui
session_start();
include('conexao.php');

$usuario = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);


    $row = mysqli_num_rows($result);//aqui ele deve pegar o resultado formatado, provavelmente
    
    if($row == 1) {
        $_SESSION['usuario'] = $usuario;
        header('Location: /tcc/crud/testt.php');//"home-braba.php"aqui ele redireciona pra uma página que vc mandar... mas pq header? posso botar a página de home aqui!!!!
        exit();//Location: painel.php
    } else {
        $_SESSION['nao_autenticado'] = true;//aqui ele redireciona pra uma página que vc mandar... mas pq header? 
        header('Location: vardumps.php'); //'Location: index.php' em
        exit();
    }





    <?php
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
        header('Location: painel.php');
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: index.php');
        exit();
    }












?>

