<?php
//pode ser útil pro usuário
include('conexao.php');
include('proc-sessao-gestor.php');
$select_gestor = "SELECT gst_cnpj, gst_email, gst_rzsocial, gst_nome, gst_sbnome, gst_tel, gst_endrc, gst_cep FROM gestor WHERE gst_email = '{$lg_gestor}';";
$res_gestor = mysqli_query($conn, $select_gestor);

if ($res_gestor != null){
  $agoravai = mysqli_fetch_array($res_gestor,MYSQLI_ASSOC);
  $ret_cnpj = $agoravai['gst_cnpj'];
  $ret_email = $agoravai['gst_email'];
  $ret_rzsocial = $agoravai['gst_rzsocial'];
  $ret_nome = $agoravai['gst_nome'];
  $ret_sbnome = $agoravai['gst_sbnome'];
  $ret_telefone = $agoravai['gst_tel'];
  $ret_endereco = $agoravai['gst_endrc'];
  $ret_cep = $agoravai['gst_cep']; 
  
}

?>