<!DOCTYPE html>
<html>
<!-- Olha o pulo do gato! a página do login ser em php com o html dentro!-->
<!-- A extensão do arquivo é .php! vira o puppet! shell script, ou seja, mandar o sistema operacional realizar tarefas!-->
<!-- Ponha o código da sessão no title! ... vc nao precisa de páginas em html puro -->
    <head>
		<meta charset="utf-8">
        
        <title>
            <?php
                session_start();
                include('conexao.php');       
            ?>
        Login</title>
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="style.css" rel="stylesheet" type="text/css">
	</head>

    <body>
		<div class="login">
			<h1>Login</h1>
			<form action="authenticate.php" method="post">
				<label for="email">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="email" placeholder="Email" id="email" required> <!--mudei tudo de username pra email -->
				<label for="senha">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="senha" placeholder="Senha" id="senha" required>
				<a href = "/register/register.html"> Registre-se!</a>
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>
