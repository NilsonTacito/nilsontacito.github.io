<?php
//isso precisa manter a sessão em todas pages após o login
//está funcionando, implementar pro cliente e admin
session_start();
if($_SESSION['gestor_logado'] == null){
    $_SESSION['gestor_logado']= true;
}
$nm_gestor = $_SESSION['gestor_nome'];
$lg_gestor = $_SESSION['gestor_email'];
?>