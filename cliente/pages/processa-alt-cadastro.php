<?php
//processamento das alterações de dados cadastrais que ocorrerão na página (na página editar-usuário.php)
include('conexao.php');
include_once('processa-sessao-cliente.php');

$nome_usuario = $_POST['nome-cliente'];
$sbnome_usuario = $_POST['sbnome-cliente'];
$telefone_usuario = $_POST['tel-cliente'];
$endereco_usuario = $_POST['endrc-cliente'];
$cep_usuario = $_POST['cep-cliente'];

$query_update = "UPDATE cliente SET clt_nome = '{$nome_usuario}', clt_sbnome = '{$sbnome_usuario}', clt_tel = '{$telefone_usuario}', clt_endrc = '{$endereco_usuario}', clt_cep = '{$cep_usuario}'  WHERE clt_email = '{$login_cliente}';";
$result_update = mysqli_query($conn, $query_update);

//validar com num rows == 5?    
if($result_update != NULL) {
    //echo "<a>Atualização realizada com sucesso!</a>";
    //select nome from cliente and update session var ou session destroy
    $query_get_dados = "SELECT clt_nome, clt_email FROM cliente WHERE clt_email ='{$login_cliente}';";
    $res_get_dados = mysqli_query($conn, $query_get_dados);
    $ret_get_dados = mysqli_fetch_array($res_get_dados, MYSQLI_ASSOC);
    $get_nome = $ret_get_dados['clt_nome'];
    $get_email = $ret_get_dados['clt_email'];
    
    //após alterar os cadastro, é necessário reiniciar a sessão (logout/login) para a página carregar corretamente, verificar 
    //abaixo, a medida
    if(!empty($get_nome) and !empty($get_email)){
    session_destroy();
    session_start();
    $_SESSION['cliente_logado'] = true;
    $_SESSION['cliente_nome'] = $get_nome;
    $_SESSION['cliente_email'] = $get_email;
    header('Location: /cliente/pages/consultar-cadastro.php');
    exit;
    }
}
?>