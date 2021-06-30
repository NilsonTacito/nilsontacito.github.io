<?php
//isso precisa manter a sessão em todas pages após o login
//está funcionando, implementar pro cliente e admin
session_start();
include('conexao.php');

if($_SESSION['gestor_logado'] == true){
    $nm_gestor = $_SESSION['gestor_nome'];
    $lg_gestor = $_SESSION['gestor_email'];

    $qry_gst_sess_doc = "SELECT gst_cnpj FROM gestor WHERE gst_email ='{$lg_gestor}';";
    $res_gst_sess_doc= mysqli_query($conn, $qry_gst_sess_doc);    
    
    if ($res_gst_sess_doc != null){
        $ret_gst_sess_doc = mysqli_fetch_array($res_gst_sess_doc,MYSQLI_ASSOC);
        $gst_sess_doc = $ret_gst_sess_doc['gst_cnpj'];
    }
    if (isset($_COOKIE["id-do-estac"])){
        $cookie_id_estac = $_COOKIE["id-do-estac"];
    }
}

if(!isset($_SESSION['gestor_logado'])) {
    header('Location: /index.php');
    exit();

}


?>