<?php
//este arquivo deverá processar o cancelamento da reserva
include('conexao.php');
include('processa-sessao-cliente.php');

if(isset($_SESSION['cancel_id'])){
  $id_rsv_cancel = $_SESSION['cancel_id'];
}
$qry_cancel_rsv = "DELETE FROM reserva WHERE rsv_id='{$id_rsv_cancel}';";
$res_cancel_rsv= mysqli_query($conn,$qry_cancel_rsv);
if($res_cancel_rsv != null){
    header('Location: consultar-reservas.php');
    exit();
}

?>