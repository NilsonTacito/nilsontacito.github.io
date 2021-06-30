<?php
$res_ano = "2021";
$res_mes = "06";
$res_dia = "29";
$res_hora = "17:50";

$res_datetime = ($res_ano . "-" . $res_mes . "-" . $res_dia . " " . $res_hora . ":00"); 
echo $res_datetime;
include('conexao.php');
$qry_get_mvg = "SELECT mvg_id, mvg_ocp_carro, mvg_ocp_moto FROM mov_vagas WHERE fk_mvg_estac_id='1';";
$res_get_mvg = mysqli_query($conn, $qry_get_mvg);

while($ret_get_mvg = mysqli_fetch_array($res_get_mvg)){

    $ret_proc_mvg_id = intval($ret_get_mvg['mvg_id']);  
    $ret_mvg_carros_disp = intval($ret_get_mvg['mvg_ocp_carro']);
    $ret_mvg_motos_disp = intval($ret_get_mvg['mvg_ocp_moto']);

}

echo($ret_proc_mvg_id . " - " . $ret_mvg_carros_disp . " - " . $ret_mvg_motos_disp);
?>