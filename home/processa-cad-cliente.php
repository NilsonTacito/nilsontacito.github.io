<?php
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

    while ($retorno_dados = mysqli_fetch_array($result_dados, MYSQLI_ASSOC)) {
        $retorno_doc = $retorno_dados['clt_doc'];
        $retorno_email = $retorno_dados['clt_email'];
        break;
    }
    if (($retorno_doc == $documento_cliente) OR ($retorno_email == $email_cliente)){
        echo "<a>Usuário já cadastrado!</a>";
    }else {//realiza cadastro se o email ou o documento não existirem 
        $insert_cliente = "INSERT INTO cliente (clt_doc, clt_email, clt_senha, clt_nome, clt_sbnome, clt_tel, clt_endrc, clt_cep) VALUES ('$documento_cliente', '$email_cliente', '$senha_cliente', '$nome_cliente','$sbnome_cliente', '$telefone_cliente','$endereco_cliente','$cep_cliente');";
        $resultado_cliente = mysqli_query($conn, $insert_cliente);
        if (isset($resultado_cliente)){//ainda não é redirecionado após o insert
            echo("<script>console.log('if2 ok'); window.location.href='http://192.168.1.30/cliente/pages/mapa.php'; </script>");
            //include('processa-sessao.php');
            $select_cliente = "SELECT clt_nome FROM cliente WHERE clt_email = '{$email_cliente}' AND clt_senha ='{$senha_cliente}'";
            $result_select_cliente = mysqli_query($conn, $select_cliente);
            $nome0 = mysqli_fetch_array($result_select_cliente, MYSQLI_ASSOC);
            $nome1 = $nome0['clt_nome'];
            if(isset($nome1)){
                echo("<script> console.log('if1 ok');</scrpit>");
                session_start();
                $_SESSION['cliente_logado']= true;
                $_SESSION['cliente_nome'] = $nome1;//a consulta ao banco pra retornar o nome funcionou no teste
                $_SESSION['cliente_email'] = $email_cliente;
                if ($nome1 == $_SESSION['cliente_nome']){
                    //header('Location: /cliente/pages/cadastrar-veiculo.php');
                    exit();
                }else{
                    header('/cliente/pages/login/index.html');
                    exit();
                }

                header('Location: /cliente/pages/mapa.php');
                exit();
            }    

        }
    }
?>