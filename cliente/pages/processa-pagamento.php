<?php
//este arquivo deverá processar a conclusão da reserva 
include('conexao.php');
include('processa-sessao-cliente.php');

if(isset($_SESSION['id_pagamento'])){
  $id_rsv_pagseguro = $_SESSION['id_pagamento'];
}
//$_SESSION['tx_rsv_pkbr']

$qry_get_preco = "SELECT rsv_preco FROM reserva WHERE rsv_id='{$id_rsv_pagseguro}';";
$res_get_preco = mysqli_query($conn,$qry_get_preco);
while($ret_get_preco = mysqli_fetch_array($res_get_preco,MYSQLI_BOTH)){
  $rsv_preco = $ret_get_preco['rsv_preco'];
}

if(isset($_SESSION['total_carro']))
$preco_carro = $_SESSION['total_carro'] + $rsv_preco; 
$qry_carro_pgto = "UPDATE reserva SET rsv_preco='{$preco_carro}' WHERE rsv_id='{$id_rsv_pagseguro}';";
$res_carro_pgto = mysqli_query($conn,$qry_carro_pgto);

if($res_carro_pgto != null){
  header('Location: consultar-reservas.php');
  exit();
}

if(isset($_SESSION['total_moto']))
$preco_moto = $_SESSION['total_moto'] + $rsv_preco; 
$qry_moto_pgto = "UPDATE reserva SET rsv_preco='{$preco_moto}' WHERE rsv_id='{$id_rsv_pagseguro}';";
$res_moto_pgto = mysqli_query($conn,$qry_rlz_chkin);

if($res_moto_pgto != null){
  header('Location: consultar-reservas.php');
  exit();
}


?>