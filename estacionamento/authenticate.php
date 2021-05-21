<?php
//Conectar ao banco
session_start();
include('conexao.php');

$usuario = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

/*
//verificar erro na conexão
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// mostrar erro
    exit('Falha ao conectar ao banco de dados: ' . mysqli_connect_error());
    //pendente:criar page pro erro!!
}*/

//$sql = "SELECT role FROM users WHERE username = '$DATABASE_USER'";
$sql = "SELECT email FROM cliente WHERE email = '{$usuario}' AND senha = '{$senha}'";//tirei o md5

$result = mysqli_query($conn,$sql);
//segundo Rosana, não precisamos de muitas validações de segurança, basta rodar e não ficar "burro"

//redirects de acordo com perfil
//1 home pra cada tipo de user
//as tables no banco deverão conter o campo "role" ("tipo", "perfil")
/*switch($result){
    case 1://role int(1) = cliente (será o role default quando na table de user)
        header('Location: home-cliente.php');// mudar para
        break;
    case 2://role int(1) = gestor
        header('Location: home-gestor.php');
        break;
    case 3://role int(3) = admin
        header('Location: home-admin.php');
        break;    
}*/

//$result = mysqli_query($conexao, $query);//aqui ele cria uma var pra fazer a conexão com o banco e mandar a query! olha o método do mysqli que ele usa!!!!
    

    //esse código deveria pegar o nome e colocar na sessão!
    $row = mysqli_num_rows($result);//aqui ele deve pegar o resultado formatado, provavelmente
    
    if($row == 1) {
        $_SESSION['usuario'] = $usuario;
        header('Location: /tcc/crud/testt.php');//"home-braba.php"aqui ele redireciona pra uma página que vc mandar... mas pq header? posso botar a página de home aqui!!!!
        exit();//Location: painel.php
    } else {
        $_SESSION['nao_autenticado'] = true;//aqui ele redireciona pra uma página que vc mandar... mas pq header? 
        header('Location: vardumps.php'); //'Location: index.php' em
        exit();
    }



?>

