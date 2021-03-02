<?php //e se eu botar esse código junto com a html da home que eu preciso? if (dando certo, deixo o cad veículo embaixo), 
//dando errado volta pra hom, já vai carregar a cad, mesmo...
    session_start();
    include("conexao.php");

    /*if ( !isset($_POST['email'], $_POST['senha']) ) {
        // Could not get the data that should have been sent.
        exit('Please fill both the username and password fields!');
    }*/
   
    $nome_usuario = $_POST['nome']; 
    $sbnome_usuario = $_POST['sobrenome'];
    $documento_usuario = $_POST['documento'];
    $email_usuario = $_POST['email'];
    $senha_usuario = $_POST['senha'];
    $telefone_usuario = $_POST['telefone'];
    $endereco_usuario = $_POST['endereco'];
    $cep_usuario = $_POST['cep'];
    
    $query01 = "INSERT INTO cliente(documento, email, senha, nome, sobrenome, telefone, endereco, cep) VALUES ('{$documento_usuario}','{$email_usuario}', '{$senha_usuario}','{$nome_usuario}','{$sbnome_usuario}','{$telefone_usuario}','{$endereco_usuario}','{$cep_usuario}')";
    $resultado_01 = mysqli_query($conn, $query01);


    function redirect($url)
{
    header(sprintf('Location: %s', $url));
    exit;
}


    /*$query02 = "SELECT nome FROM cliente WHERE email = '{$email_usuario}' AND senha = '{$senha_usuario}'";
    $resultado_02 = mysqli_query($conn, $query02);

    $linha01 = mysqli_num_rows($resultado_02);

    if($linha01 == 1) {
        $_SESSION['usuario'] = $nome_usuario;
        header('Location: http://192.168.1.15/tcc/dash/examples/cadastro-veiculo.php');
        //exit;
     } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: vardumps.php');
        exit();
    }*/
    $aaa = 1;
    if($aaa + 2 === 3){
        header('Location: http://192.168.1.15/tcc/dash/examples/cadastro-veiculo.php');
        exit();
    }/*
    
    session_regenerate_id();
    $_SESSION['loggedin'] = TRUE;
    $_SESSION['name'] = $_POST['username'];
    $_SESSION['id'] = $id;
    echo 'Welcome ' . $_SESSION['name'] . '!';
} else {
    // Incorrect password
    echo 'Incorrect username and/or password!';
}
} else {
// Incorrect username
echo 'Incorrect username and/or password!';
}
*/










?>