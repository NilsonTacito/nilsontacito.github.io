<?php
session_start();
include("conexao.php");

$nome_usuario = $_POST['nome']; 
$sbnome_usuario = $_POST['sobrenome'];
$documento_usuario = $_POST['documento'];
$email_usuario = $_POST['email'];
$senha_usuario = $_POST['senha'];
$telefone_usuario = $_POST['telefone'];
$endereco_usuario = $_POST['endereco'];
$cep_usuario = $_POST['cep'];

/*
$query01 = "INSERT INTO cliente(documento, email, senha, nome, sobrenome, telefone, endereco, cep) VALUES ('{$documento_usuario}','{$email_usuario}', '{$senha_usuario}','{$nome_usuario}','{$sbnome_usuario}','{$telefone_usuario}','{$endereco_usuario}','{$cep_usuario}')";
$resultado_01 = mysqli_query($conn, $query01);


function redirect($url)
{
header(sprintf('Location: %s', $url));
exit;
}*/

$querybraba = "INSERT INTO cliente(documento, email, senha, nome, sobrenome, telefone, endereco, cep) VALUES ('{$documento_usuario}','{$email_usuario}', '{$senha_usuario}','{$nome_usuario}','{$sbnome_usuario}','{$telefone_usuario}','{$endereco_usuario}','{$cep_usuario}')") === TRUE) {
    $_SESSION['usuario'] = $nome_usuario;



if (mysqli_query($conn,"INSERT INTO cliente(documento, email, senha, nome, sobrenome, telefone, endereco, cep) VALUES ('{$documento_usuario}','{$email_usuario}', '{$senha_usuario}','{$nome_usuario}','{$sbnome_usuario}','{$telefone_usuario}','{$endereco_usuario}','{$cep_usuario}')") === TRUE) {
    $_SESSION['usuario'] = $nome_usuario;
    header('Location: http://192.168.1.15/tcc/dash/examples/cadastro-veiculo.php');//mandando pra tela do cad veículo 
    exit();//e se tirar o exit?
}else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: http://192.168.1.15/tcc/login/index.html');//mandei pra tela de login... testem né?!
    exit();
}



//-- http://192.168.1.15/tcc/dash/assets/demo/demo.css

/* vamos repensar o if abaixo...

como está:
ele testa se a query foi true e, se 'sim', sessão recebe nome e manda pro cad veículo...
se 'não', sessao rece 'nao auth' e manda pro Arma de novo
- nao sei se funciona...

preciso:
1 - insert dados de user;
2 - se ok, redirecionar user pro cad veículo;
   - se não, erro na tela;

Pages:
	- /home/Index.html
    - Middle: cad-redir.php -- ESTE SCRIPT AQUI, MESMO!!!
/dash/examples/cad-veiculo 


*/


1. MySQL Snippets

This snippet will connect to your MySQL database:

$mysqli = mysqli_connect('localhost', 'DATABASE_USER', 'DATABASE_PASS', 'DATABASE_NAME');

Check for connection errors:

if (mysqli_connect_errno()) {
	die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

Select database table and display all the results:

$result = $mysqli->query('SELECT * FROM students');
while ($row = $result->fetch_assoc()) {
	echo $row['name'] . '<br>';
}

Checking the number of rows:

$result->num_rows;

Insert a new record:

$mysqli->query('INSERT INTO students (name) VALUES ("David")');

Checking the number of affected rows:

$mysqli->affected_rows;

Escape special characters in a string, this should be used if you do not prepare your statements:

$mysqli->real_escape_string($user_input_text);




9. Redirect URL

This snippet will redirect to a new page:

header("Location: http://example.com/newpage.php")


8. Sessions

This snippet will create a new session, sessions act as cookies but are stored on the server instead of the clients computer.

session_start();
$_SESSION['name'] = 'David';

Free all the session variables:

session_unset();

Destroy all the session variables:

session_destroy();



Check if request variable exists:

    if (isset($_GET['name'])) {
        // exists
    }
    
    Send form data to PHP script, HTML file:
    
    <form action="login.php" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit">
    </form>
    
    login.php:
    
    $user = $_POST['username'];
    $pass = $_POST['password'];
    echo 'Your username is '  . $user . ' and your password is ' . $pass . '.';







?>