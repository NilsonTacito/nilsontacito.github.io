<?php
session_start();
include('conexao.php');
$login_cliente = mysqli_real_escape_string($conn, $_POST['email']);
$senha_cliente = mysqli_real_escape_string($conn, $_POST['senha']);
$query_cliente = "SELECT clt_nome FROM cliente WHERE clt_email  = '{$login_cliente}' AND clt_senha = '{$senha_cliente}'";
$result_cliente = mysqli_query($conn,$query_cliente);
$rows_cliente = mysqli_num_rows($result_cliente);

if($result_cliente != null){
    $ret_cliente = $result_cliente->fetch_array(MYSQLI_ASSOC);
    $retNome_cliente = $ret_cliente['clt_nome'];

    if($rows_cliente == 1) {
        $_SESSION['cliente_logado']= true;
        $_SESSION['cliente_nome'] = $retNome_cliente;
        $_SESSION['cliente_email'] = $login_cliente;//a sessão precisa do email caso haja necessidade de alterações cadastrais
        header('Location: /cliente/pages/mapa.php');
        exit();
    }else{//aprimorar tratamento de erro de login e senha, a medida abaixo não teve bons resultados
        echo("Dados incorretos");//aprender a 'popar' dados na tela, javascript
        header('Location: /index.php');
        exit();
    }
}
?>
