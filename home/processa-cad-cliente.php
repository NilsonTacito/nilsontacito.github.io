<?php
    session_start();
    include('conexao.php');
    $nome_cliente = $_POST['nome'];
    $sbnome_cliente = $_POST['sobrenome'];
    $documento_cliente = $_POST['documento'];
    $email_cliente = $_POST['email'];
    $senha_cliente = $_POST['senha'];
    $telefone_cliente = $_POST['telefone'];
    $endereco_cliente = $_POST['endereco'];
    $cep_cliente = $_POST['cep'];
    //verifica email e documento no banco antes de cadastrar
    $verifica_dados = "SELECT clt_doc, clt_email FROM cliente WHERE clt_doc = '{$documento_cliente}' OR clt_email = '{$email_cliente}'";
    $result_dados = mysqli_query($conn, $verifica_dados);

    while ($retorno_dados = mysqli_fetch_array($result_dados)) {
        echo $retorno_dados['clt_doc'] = $retorno_doc;
        echo $retorno_dados['clt_email'] = $retorno_email;
        break;
    }

    if (($retorno_doc == $documento_cliente) OR ($retorno_email == $email_cliente)){
        echo("Usuário já cadastrado!");
    }else {//realiza cadastro se o email ou o documento não existirem 
        $insert_cliente = "INSERT INTO cliente (clt_doc, clt_email, clt_senha, clt_nome, clt_sbnome, clt_tel, clt_endrc, clt_cep) VALUES ('$documento_cliente', '$email_cliente', '$senha_cliente', '$nome_cliente','$sbnome_cliente', '$telefone_cliente','$endereco_cliente','$cep_cliente');";
        $resultado_cliente = mysqli_query($conn, $insert_cliente);
        if ($resultado_cliente === TRUE){//ainda não é redirecionado após o insert
            //include('processa-sessao.php');
            $select_cliente = "SELECT clt_nome FROM cliente WHERE clt_email = '{$email_cliente}' AND clt_senha ='{$senha_cliente}'";
            $result_select_cliente = mysqli_query($conn, $select_cliente);
            $row_sql_cliente = mysqli_num_rows($result_select_cliente);
            if($row_sql_cliente == 1) {
                $sql_nome_cliente = $result_select_cliente->fetch_array()[0];
                $_SESSION['cliente_logado']= true;
                $_SESSION['cliente_nome'] = $sql_nome_cliente;//a consulta ao banco pra retornar o nome funcionou no teste
                $_SESSION['cliente_email'] = $email_cliente;
                if ($sql_nome_cliente == $_SESSION['cliente_nome']){
                    header('Location: /cliente/pages/cadastrar-veiculo.php');
                    exit(0);
                }
            }
        }
    }
?>