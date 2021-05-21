<?php
//processamento das alterações de dados cadastrais que ocorrerão na página (na página editar-usuário.php)
    session_start();
    $mail_session = $_SESSION['email'];
    
    include("conexao.php");
    $nome_usuario = $_POST['nome'];
    $sbnome_usuario = $_POST['sobrenome'];
    $telefone_usuario = $_POST['telefone'];
    $endereco_usuario = $_POST['endereco'];
    $cep_usuario = $_POST['cep'];

    $query_update = "UPDATE cliente SET nome = '{$nome_usuario}', sobrenome = '{$sbnome_usuario}', telefone = '{$telefone_usuario}', endereco = '{$endereco_usuario}', cep = '{$cep_usuario}'  WHERE email = '{$mail_session}'";
    $result_update = mysqli_query($conn, $query_update);
    
    if($result_update != NULL) {
        echo "Atualização realizada com sucesso!";
        header('Location: /cliente/pages/consultar-cadastro.php');
        exit;
    }//após alterar os cadastro, é necessário reiniciar a sessão (logout/login) para a página carregar corretamente, verificar 

?>