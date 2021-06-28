<?php
//script atualizado em 23/04/2021
session_start();
include('conexao.php');

$login_gestor = mysqli_real_escape_string($conn, $_POST['email']);
$senha_gestor = mysqli_real_escape_string($conn, $_POST['senha']);
$query_gestor = "SELECT gst_nome FROM gestor WHERE gst_email = '{$login_gestor}' AND gst_senha = '{$senha_gestor}';";
$result_gestor = mysqli_query($conn,$query_gestor);

//o erro estava relacionado à sintaxe incorreta
if($result_gestor != null){
    $ret_gestor = $result_gestor->fetch_array(MYSQLI_ASSOC);
    $retNome_gestor = $ret_gestor['gst_nome'];
    
    $rowcount_gestor = mysqli_num_rows($result_gestor);
    if($rowcount_gestor == 1) { //era 1
        $_SESSION['gestor_logado']= true;
        $_SESSION['gestor_nome'] = $retNome_gestor;
        $_SESSION['gestor_email'] = $login_gestor;
        header('Location: /estacionamento/pages/estacionamentos.php');
        exit();
    }else{//aprimorar tratamento de erro de login e senha, a medida abaixo não teve bons resultados
    echo("Dados incorretos");//aprender a 'popar' dados na tela, javascript
    header('Location: /index.php');
    exit();
    }
}
?>