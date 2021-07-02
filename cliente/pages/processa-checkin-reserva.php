<?php
//este arquivo (verificar se precisará de página) deverá deverá processar o momento do check-in (qr_code fica pras futuras implementações)
include('conexao.php');
include('processa-sessao-cliente.php');

if(isset($_SESSION['chkin_res_id'])){
  $id_rsv_futura = $_SESSION['chkin_res_id'];
}

$qry_rlz_chkin = "UPDATE reserva SET rsv_chkin='ok', rsv_chkin_dt=NOW() WHERE rsv_id='{$id_rsv_futura}';";
$res_rlz_chkin = mysqli_query($conn,$qry_rlz_chkin);

if($res_rlz_chkin != null){
  $_SESSION['chkout_pg_id'] = $id_rsv_futura;
  header('Location: realizar-checkout.php');
  exit();
}


/*
update check in;
update check in date;
where fk_rsv_vei_placa;

onde eu guardo o id das reservas antigas ou em andamento pelo cliente?
isso tbm servirá para gestor e estacionamento, nao preciso, filtro pro chk out - fk cliente/estac

insert now
select now();
+---------------------+
| now()               |
+---------------------+
| 2021-06-27 23:38:17 



*/

?>