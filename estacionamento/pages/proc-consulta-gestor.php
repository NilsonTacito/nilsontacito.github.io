<?php
//pode ser útil pro usuário
include("conexao.php");
include_once("proc-sessao-gestor.php");
$select_gestor = "SELECT cnpj, email, razaosocial, nome, sobrenome, telefone, endereco, cep FROM gestor WHERE email = '{$lg_gestor}';";
$res_gestor = mysqli_query($conn, $select_gestor);

if ($res_gestor != null){
  $agoravai = $res_gestor->fetch_array(MYSQLI_ASSOC);

  $ret_cnpj = $agoravai["cnpj"];
  $ret_email = $agoravai["email"];
  $ret_rzsocial = $agoravai["razaosocial"];
  $ret_nome = $agoravai["nome"];
  $ret_sbnome = $agoravai["sobrenome"];
  $ret_telefone = $agoravai["telefone"];
  $ret_endereco = $agoravai["endereco"];
  $ret_cep = $agoravai["cep"];
}

?>