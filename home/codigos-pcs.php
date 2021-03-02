<?php

if ($mysqli->query("CREATE TEMPORARY TABLE myCity LIKE City") === TRUE) {
    printf("Table myCity successfully created.\n");
}

//INSERT INTO cliente(documento, email, senha, nome, sobrenome, telefone, endereco, cep) VALUES ('{$documento_usuario}','{$email_usuario}', '{$senha_usuario}','{$nome_usuario}','{$sbnome_usuario}','{$telefone_usuario}','{$endereco_usuario}','{$cep_usuario}')";

if(!$query01){
    die("Falha na conexao: " . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

}


function redirect($url)
{
    header(sprintf('Location: %s', $url));
    exit;
}



    include ("incs/ligacao.inc.php");
    include('session.php');
    $user_check=$_SESSION['login_user'];
    session_start();

        $utilizador = $mysqli->query("SELECT perfil from login where username='$user_check'");
        $result = $utilizador->fetch_assoc();

        if($result['perfil'] == 0){
      header('Location: menu.php');
        }


    elseif($result['perfil'] == 1){
        header('Location:menu.php');
    }
    $result = $mysqli->query("SELECT `perfil` from login where username='$user_check'");
    $result = $result->fetch_assoc();

    if($result['perfil'] == 0)
{
    header('Location: aaa.php');
}

elseif($result['perfil'] == 1)
{
    header('Location:bbb.php');
}



insert pica

if (mysqli_query($conn,"INSERT INTO cliente(documento, email, senha, nome, sobrenome, telefone, endereco, cep) VALUES ('{$documento_usuario}','{$email_usuario}', '{$senha_usuario}','{$nome_usuario}','{$sbnome_usuario}','{$telefone_usuario}','{$endereco_usuario}','{$cep_usuario}')") === TRUE){

}

*/
