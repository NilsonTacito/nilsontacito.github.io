<?php
    /*
    //pra onde o form do júlio me mandou, funciona!!!

    //campos do arma (html puro! no form action, mas tbm criei a page em php, não sei pq)
    include_once("conexao.php");//conecta no banco com os user de sistema!!!!primeira coisa que o algoritimo faz
    $email_usuario = $_POST['email'];
    $senha_usuario = $_POST['senha'];

    //$query = "select usuario from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";  
    
    //echo "$nome - $email";
    $result_usuario = "SELECT email, senha FROM cliente WHERE email = '{$email_usuario}'";
    //parte 1

    //pra isso, tem que ter um $conn aqui
    //select email, senha from cliente;
    //guardar dados de login na sessão

        $result_usuario = "INSERT INTO cliente(nome, documento, email, senha, telefone, endereco, cep) VALUES ('$nome_usuario','$documento_usuario','$email_usuario', '$senha_usuario','$telefone_usuario','$endereco_usuario','$cep_usuario')";
    $resultado_usuario = mysqli_query($conn, $result_usuario); ///escreve o user no banco!!!
    
    //preciso disso fazendo um select no banco!!!
    //fazer select no form, na hora do submit

    //pra isso, tem que ter um $conn aqui
    //select email, senha from cliente;
    //guardar dados de login na sessão
    ////////Ahh mulek! Aqui começa o php d login do canal-ti!
    */
    
    //form de submit 
    //submit do form do "entrar", deveria ter um form action lá!!
    session_start();
    include('conexao.php');

    //$email_usuario = $_POST['email']; //email é o nome no html ("var")
    //$senha_usuario = $_POST['senha']; //senha é o nome no html ("var")
    // como funciona o "pipe-pipe" || no PHP?
    if(empty($_POST['email']) || empty($_POST['senha'])) {//ontem eu fiz essa index.php, mas poderia ser index.html
        header('Location: index.php');//manda pra home se a var tiver vazia
        exit();
    }
    
    $usuario = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    
    //ele cria a var com a query já escrita, pegando as entradas do form html com a conexão pro banco junto de cada var que recebeu o valor vindo do html!!!
    $query = "select usuario from usuario where usuario = '{$usuario}' and senha = '{$senha}'";//tirei o md5
    
    $result = mysqli_query($conexao, $query);//aqui ele cria uma var pra fazer a conexão com o banco e mandar a query! olha o método do mysqli que ele usa!!!!
    
    $row = mysqli_num_rows($result);//aqui ele deve pegar o resultado formatado, provavelmente
    
    if($row == 1) {
        $_SESSION['usuario'] = $usuario;
        header('Location: painel.php');//aqui ele redireciona pra uma página que vc mandar... mas pq header? posso botar a página de home aqui!!!!
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;//aqui ele redireciona pra uma página que vc mandar... mas pq header? 
        header('Location: index.php');
        exit();
    }

    //depois disso é só ficar chamado a sessão em toda página!

    ?>










