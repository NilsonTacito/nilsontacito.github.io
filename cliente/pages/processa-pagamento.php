<?php
//este arquivo deverá processar a conclusão da reserva 
include('conexao.php');
include('processa-sessao-cliente.php');

if(isset($_SESSION['id_rsv_futura'])){
  $id_rsv_pagseguro = $_SESSION['id_rsv_futura'];
}

if(isset($_POST['preco-carro']))
$car_test = $_POST['preco-carro']; 
$qry_rlz_chkout = "UPDATE reserva SET rsv_preco='{$car_test}'WHERE rsv_id='{$id_rsv_pagseguro}';";
$res_rlz_chkout = mysqli_query($conn,$qry_rlz_chkin);

if($res_rlz_chkout != null){
  header('Location: consultar-reserva.php');
  exit();
}

?>