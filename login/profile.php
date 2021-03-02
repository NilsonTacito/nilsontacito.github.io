<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {//isset = tá setado/rodando assim?
    header('Location: index.html');//se nao tá setado, volta pro login
	exit;
}

$DATABASE_HOST = '192.168.1.11';
$DATABASE_USER = $_SESSION['username'];
$DATABASE_PASS = $_SESSION['password'];
$DATABASE_NAME = 'TESTLOGIN';
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

//$con->prepare('SELECT password, email FROM users WHERE id = ?');

$DATABASE_HOST = '192.168.1.11';
$DATABASE_USER = $_POST["username"];
$DATABASE_PASS = $_POST["password"];
$DATABASE_NAME = 'TESTLOGIN';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM users WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();

/*
$insert_produto="insert into cadastro(nome_produto,descricao)
values ('$prod_nome','$prod_desc')";

if($conn->query($insert_produto) === true){
	echo "Linha Inserida";
} else {
	echo "Erro: ".$insert_produto."<br>".$conn->error;	
}

	$conn->close(); */


	/*
//post actiivation
if ($account['activation_code'] == 'activated') {
	// account is activated
	// Display home page etc
} else {
	// account is not activated
	// redirect user or display an error
}*/
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Website Title</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
                        <td><?=$_SESSION['name']?></td>                  
					</tr>
					<tr>
						<td>Password:</td>
                        <td><?=$_SESSION['password']?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$_SESSION['email']?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>

