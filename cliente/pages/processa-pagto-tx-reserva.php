<?php
//este arquivo deverá processar a conclusão da reserva 
include('conexao.php');
include('processa-sessao-cliente.php');

if(isset($_SESSION['id_pagamento'])){
  $id_rsv_pagseguro = $_SESSION['id_pagamento'];
}

//$_SESSION['rsv_taxa_preco']

if(!empty($id_rsv_pagseguro))
$preco_tx_reserva = $_SESSION['preco_tx_reserva']; 
$qry_carro_pgto = "UPDATE reserva SET rsv_preco='{$preco_tx_reserva}' WHERE rsv_id='{$id_rsv_pagseguro}';";
$res_carro_pgto = mysqli_query($conn,$qry_carro_pgto);

if($res_carro_pgto != null){
  header('Location: consultar-reservas.php');
  exit();
}




?>