<?php
//isso precisa manter a sessão em todas pages após o login
//está funcionando, implementar pro cliente e admin
session_start();
if($_SESSION['gestor_logado'] == true){
    $nm_gestor = $_SESSION['gestor_nome'];
    $lg_gestor = $_SESSION['gestor_email'];
    if (isset($_COOKIE["id-do-estac"])){
        $cookie_id_estac = $_COOKIE["id-do-estac"];
    }
}
if(!isset($_SESSION['gestor_logado'])) {
    header('Location: /index.php');
    exit();
}


?>