<?php
//este arquivo deverá processar a conclusão da reserva 
include('conexao.php');
include('processa-sessao-cliente.php');

if(isset($_SESSION['id_rsv_futura'])){
  $id_rsv_chkout = $_SESSION['id_rsv_futura'];
}

$qry_rlz_chkout = "UPDATE reserva SET rsv_chkout='ok', rsv_chkout_dt=NOW() WHERE rsv_id='{$id_rsv_chkout}';";
$res_rlz_chkout = mysqli_query($conn,$qry_rlz_chkin);

if($res_rlz_chkout != null){
  header('Location: realizar-pagamento.php');
  exit();
}

?>