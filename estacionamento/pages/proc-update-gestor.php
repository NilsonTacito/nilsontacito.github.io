<?php
include('conexao.php');
include('proc-sessao-gestor.php');

if(!empty($_POST['gestor-telefone']){
    $gst_tel = $_POST['gestor-telefone'];
}
if(!empty($_POST['gestor-nome']){
    $gst_nome = $_POST['gestor-nome'];
}
if(!empty($_POST['gestor-sbnome']){
    $gst_sbnome = $_POST['gestor-sbnome'];
}
if(!empty($_POST['gestor-cep']){
    $gst_cep = $_POST['gestor-cep'];
}
if(!empty($_POST['gestor-endrc']){
    $gst_endrc = $_POST['gestor-endrc'];
}

$qry_update_gestor = "UPDATE gestor SET gst_nome='{$gst_nome}', gst_sbnome='{$gst_sbnome}',  gst_tel='{$gst_tel}', gst_endrc='{$gst_endrc}', gst_cep='{$gst_cep}'
WHERE gst_cnpj='{$gst_sess_doc}';";
$res_update_gestor = mysqli_query($conn, $qry_update_gestor);

if($res_update_gestor != null){
    header('Location: /estacionamento/pages/dados-cadastrais.php');
    exit();

}






?>