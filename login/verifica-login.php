<?php
session_start();
if(!$_SESSION['usuario']) {
	header('Location: /tcc/home/index.html');
	exit();
}
?>