<?php
include('verifica_login.php');
?>
 
<h2>Olá, <?php var_dump($_SESSION['usuario']);?></h2>
<h2><a href="logout.php">Sair</a></h2>