<!-- By: Jardel -->
<!DOCTYPE html>
<html lang="pt-br" xmlns="https://www.w3.org/1999/xhtml">
<head>
	<!-- Required meta tags -->
	<title>ParkingBr</title>
	<meta charset="UTF-8"/>

   <!-- Google Fonts - ROBOTO -->
   <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"/>
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"/>

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="index.css"/>
</head>

<body>
    <div class="top bg-dark text-light py-3" id="barra_navegacao">
        <div class="container-nav topheader">
            <div class="d-flex justify-content-between">
                <div class="center">
                    <h4>ParkingBr</h4>
                </div>
                <div class="kanan">
					<nav class="nav" id="id_menu">						
						<a class="nav-link active" href="index.html" id="nav1">Home</a>
						<a class="nav-link" href="infoGestor.html" id="nav2">Seja um Parceiro</a>
						<a class="nav-link" href="infoSobre.html" id="nav3">Quem Somos</a>
					</nav>
                </div>
            </div>
        </div>
    </div>

<div class="container overflow-auto">
	<div class="d-flex justify-content-center h-100 mt-5">
		<div class="card">
			<div class="card-header">
				<h3>Login</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form>
				<form action="action.php" method="post">
				<p>Your name: <input type="text" name="name" /></p>
				<p>Your age: <input type="text" name="age" /></p>
				<p><input type="submit" /></p>
				</form>





					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" class="form-control" placeholder="email">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="senha">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Lembrar de mim
					</div>
					<div class="form-group">
						<input type="submit" value="Entrar" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer" id="id_campo_inferior">
				<div class="d-flex justify-content-center links">
                    Ainda não tem conta?<a href="cadastroUsuario.html">Cadastre-se</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#fundo_modal" rel="modal:open">Esqueceu sua senha?</a>
					<div id="fundo_modal" class="modal">
						<div id="custom_modal">
							<h4 id="esqueceu_senha">Esqueceu sua senha?</h4>
							<div class="container-fluid">
								<form action="" method="POST" id="id_form_recuperacao" class="row">
									<input name="email_recu" style="max-width: 55%; float: left;" class="form-control" type="email" placeholder="Email" id="id_recuperacao" required/>
									<button style="float: left; margin-left: 15px;" type="submit" class="btn btn-primary" id="button_custom">Enviar</button>
								</form>
							</div>
						</div>								
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="top bg-dark text-light py-3 fixed-bottom" id="barra_navegacao">
    <div class="container-nav topheader">
        <div class="d-flex justify-content-between">
            <div class="center">
                <h6>Application developed by Jardel Cunha for test</h6>
            </div>
        </div>
    </div>
</div>

<!------ Include the above in your HEAD tag ---------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"/>
<!-- Include for modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>

</body>
</html><!-- By: Jardel -->
<!DOCTYPE html>
<html lang="pt-br" xmlns="https://www.w3.org/1999/xhtml">
<head>
	<!-- Required meta tags -->
	<title>ParkingBr</title>
	<meta charset="UTF-8"/>

   <!-- Google Fonts - ROBOTO -->
   <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"/>
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"/>

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="index.css"/>
</head>

<body>
    <div class="top bg-dark text-light py-3" id="barra_navegacao">
        <div class="container-nav topheader">
            <div class="d-flex justify-content-between">
                <div class="center">
                    <h4>ParkingBr</h4>
                </div>
                <div class="kanan">
					<nav class="nav" id="id_menu">						
						<a class="nav-link active" href="index.html" id="nav1">Home</a>
						<a class="nav-link" href="infoGestor.html" id="nav2">Seja um Parceiro</a>
						<a class="nav-link" href="infoSobre.html" id="nav3">Quem Somos</a>
					</nav>
                </div>
            </div>
        </div>
    </div>

<div class="container overflow-auto">
	<div class="d-flex justify-content-center h-100 mt-5">
		<div class="card">
			<div class="card-header">
				<h3>Login</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" class="form-control" placeholder="email">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="senha">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Lembrar de mim
					</div>
					<div class="form-group">
						<input type="submit" value="Entrar" class="btn float-right login_btn">



						//form e submit


						<form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="processa_cad_usuario.php">
							
							<div class="form-wrap">
							<input class="form-input" id="contact-name" type="text" name="nome" data-constraints="@Required">
							<label class="form-label" for="contact-name">Nome Completo</label>
							</div>

							<div class="form-wrap">
							<input class="form-input" id="contact-documento" type="text" name="documento" data-constraints="@Required">
							<label class="form-label" for="contact-documento">CPF</label><!--Documento! não só cpf -->
							</div>  

							<div class="form-wrap">
							<input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Email @Required">
							<label class="form-label" for="contact-email">E-mail</label>
							</div>

							<div class="form-wrap">
							<input class="form-input" id="contact-senha" type="password" name="senha" data-constraints="@Required">
							<label class="form-label" for="contact-senha">Senha</label>
							</div>                     
							
							<div class="form-wrap">
							<input class="form-input" id="contact-phone" type="text" name="telefone" data-constraints="@PhoneNumber @Required">
							<label class="form-label" for="contact-phone">Telefone</label>
							</div>

							<div class="form-wrap">
							<input class="form-input" id="contact-endereco" type="text" name="endereco" data-constraints="@Required">
							<label class="form-label" for="contact-endereco">Endereço</label>
							</div>

							<div class="form-wrap">
							<input class="form-input" id="contact-cep" type="text" name="cep" data-constraints="@Required">
							<label class="form-label" for="contact-cep">CEP</label>
							</div>

							<div class="offset-top-25">
							<button class="button button-block button-primary" type="submit">Concluir cadastro</button>
							</div>

						</form><a class="button-secondary text-uppercase decorative-border offset-top-30" href="#">Fazer login</a>













					</div>
				</form>
			</div>
			<div class="card-footer" id="id_campo_inferior">
				<div class="d-flex justify-content-center links">
                    Ainda não tem conta?<a href="cadastroUsuario.html">Cadastre-se</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#fundo_modal" rel="modal:open">Esqueceu sua senha?</a>
					<div id="fundo_modal" class="modal">
						<div id="custom_modal">
							<h4 id="esqueceu_senha">Esqueceu sua senha?</h4>
							<div class="container-fluid">
								<form action="" method="POST" id="id_form_recuperacao" class="row">
									<input name="email_recu" style="max-width: 55%; float: left;" class="form-control" type="email" placeholder="Email" id="id_recuperacao" required/>
									<button style="float: left; margin-left: 15px;" type="submit" class="btn btn-primary" id="button_custom">Enviar</button>
								</form>
							</div>
						</div>								
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="top bg-dark text-light py-3 fixed-bottom" id="barra_navegacao">
    <div class="container-nav topheader">
        <div class="d-flex justify-content-between">
            <div class="center">
                <h6>Application developed by Jardel Cunha for test</h6>
            </div>
        </div>
    </div>
</div>

<!------ Include the above in your HEAD tag ---------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"/>
<!-- Include for modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>

</body>
</html>



<?php
//Ahh mulek! Aqui começa o php!
session_start();
include('conexao.php');
 
if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}
 
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
 
$query = "select usuario from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";
 
$result = mysqli_query($conexao, $query);
 
$row = mysqli_num_rows($result);
 
if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}
?>