<?php
    include_once("conexao.php");
    $razaoSocial = $_POST['razaoSocial'];
    $email_admin = $_POST['email_admin'];
    $cnpj = $_POST['cnpj'];
    $senha_admin = $_POST['senha_admin'];
    $telefone_admin = $_POST['telefone_admin'];

    $result_usuario = "INSERT INTO gestor(cnpj, email, senha, razaosocial, telefone) VALUES ('$cnpj','$email_admin','$senha_admin','$razaoSocial', '$telefone_admin')";
    $resultado_usuario = mysqli_query($conn, $result_usuario);      
?>