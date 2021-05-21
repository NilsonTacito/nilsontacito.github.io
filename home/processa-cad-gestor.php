<?php
    session_start();
    include("conexao.php");
    $gestor_razaosocial = $_POST['razaosocial-gestor'];
    $gestor_cnpj = $_POST['cnpj-gestor'];
    $gestor_email = $_POST['email-gestor'];
    $gestor_senha = $_POST['senha-gestor'];
    $gestor_nome = $_POST['nome-gestor'];
    $gestor_sbnome = $_POST['sbnome-gestor'];
    $gestor_endereco = $_POST['endereco-gestor'];
    $gestor_cep = $_POST['cep-gestor'];
    $gestor_telefone = $_POST['telefone-gestor'];

    //busca dados existentes no banco e só cadastra caso não os encontre
    $select_gestor = "SELECT cnpj, email FROM gestor WHERE cnpj = '{$gestor_cnpj}' OR email = '{$gestor_email}'";
    $result_gestor = mysqli_query($conn, $select_gestor);

    //guarda em variáveis
    while ($retorno_gestor = mysqli_fetch_array($result_gestor)) {
        echo $retorno_gestor['cnpj'] = $retorno_cnpj;
        echo $retorno_gestor['email'] = $retorno_email;
        break;
    }

    //aprimorar esta parte, mostrar mensagem na tela
    if (($retorno_cnpj == $gestor_cnpj) OR ($retorno_email == $gestor_email)) {//caso os dados não existam, vai mostrar erro de variável não definida no log do http 
        echo("Usuário já cadastrado!");
    }
    else {//não existem dados
        $insert_gestor = "INSERT INTO gestor(cnpj, email, senha, razaosocial, nome, sobrenome, telefone, endereco, cep) VALUES ('{$gestor_cnpj}','{$gestor_email}','{$gestor_senha}','{$gestor_razaosocial}','{$gestor_nome}', '{$gestor_sbnome}', '{$gestor_telefone}', '{$gestor_endereco}','{$gestor_cep}')";
        $resultado_gestor = mysqli_query($conn, $insert_gestor);     
        if ($resultado_gestor == TRUE){//consultar o nome no banco pra retonar e colocar na sessão         
            $sql = "SELECT nome FROM gestor WHERE email = '{$gestor_email}' AND senha = '{$gestor_senha}'";
            $result_sql = mysqli_query($conn,$sql);
            $row_sql = mysqli_num_rows($result_sql);
            if($row_sql == 1) {
                $sql_nome_gestor = $result_sql->fetch_array()[0];
                $_SESSION['gestor_logado']= true;
                $_SESSION['gestor_nome'] = $sql_nome_gestor;//a consulta ao banco pra retornar o nome funcionou no teste
                $_SESSION['gestor_email'] = $gestor_email;
                header('Location: /estacionamento/pages/cadastrar-estacionamento.php');
                exit();//o usuário não foi redirecionado no teste
            }
        }
        
    }

?>