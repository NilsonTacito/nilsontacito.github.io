<?php
//processamento da compra e/ou reserva de vagas (página mapa.php)
include("conexao.php");
include("processa-sessao-cliente.php");


//a taxa da reserva foi incluída na tabela "mov_vagas" e será removida da tabela "reserva"

//consultar dados do estacionamento (e mov_vagas)
$query_cons_reserva = "SELECT estacionamento.estac_nome, estacionamento.estac_endrc, estacionamento.estac_cep, estacionamento.estac_vg_carro, estacionamento.estac_vg_moto, estacionamento.estac_expd_ini, estacionamento.estac_expd_fim, mov_vagas.mvg_id, mov_vagas.mvg_ocp_carro, mov_vagas.mvg_ocp_moto, mov_vagas.mvg_dia_carro, mov_vagas.mvg_dia_moto, mov_vagas.mvg_hr_carro, mov_vagas.mvg_hr_moto, mov_vagas.mvg_tx_reserva
FROM (mov_vagas INNER JOIN estacionamento ON mov_vagas.fk_mvg_estac_id = estacionamento.estac_id) WHERE fk_mvg_estac_id = '{$cookie_id_estac}';"; 
$res_cons_reserva = mysqli_query($conn, $query_cons_reserva); //id =cookie

while ($ret_cons_reserva = mysqli_fetch_array($res_cons_reserva, MYSQLI_BOTH)){
    $ret_estac_nome = $ret_cons_reserva['estac_nome'];
    $ret_estac_endrc = $ret_cons_reserva['estac_endrc'];
    $ret_estac_cep = $ret_cons_reserva['estac_cep'];
    $ret_estac_capac_carro = $ret_cons_reserva['estac_vg_carro'];
    $ret_estac_capac_moto = $ret_cons_reserva['estac_vg_moto'];
    $ret_estac_expd_ini = $ret_cons_reserva['estac_expd_ini'];
    $ret_estac_expd_fim = $ret_cons_reserva['estac_expd_fim'];
    $ret_mvg_id = $ret_cons_reserva['mvg_id'];
    $ret_mvg_ocp_carro = intval($ret_cons_reserva['mvg_ocp_carro']);
    $ret_mvg_ocp_moto = intval($ret_cons_reserva['mvg_ocp_moto']);
    $ret_mvg_dia_carro = $ret_cons_reserva['mvg_dia_carro'];
    $ret_mvg_dia_moto = $ret_cons_reserva['mvg_dia_moto'];
    $ret_mvg_hr_carro = $ret_cons_reserva['mvg_hr_carro'];
    $ret_mvg_hr_moto = $ret_cons_reserva['mvg_hr_moto'];
    $ret_mvg_tx_reserva =  $ret_cons_reserva['mvg_tx_reserva'];
}

//aprender a fazer isso na query, dentro do banco...
//calcular e atualizar vagas disponíveis
//if (isset($ret_mvg_ocp_carro) and isset($ret_mvg_ocp_moto)){

$vagas_disp_carro = (intval($ret_estac_capac_carro) - intval($ret_mvg_ocp_carro));
$vagas_disp_moto = (intval($ret_estac_capac_moto) - intval($ret_mvg_ocp_moto));

$query_update_vagas_disp = "UPDATE mov_vagas SET mvg_ocp_carro='{$vagas_disp_carro}', mvg_ocp_moto='{$vagas_disp_moto}' WHERE mvg_id = '{$ret_mvg_id}';";
$res_update_vagas_disp = mysqli_query($conn, $query_update_vagas_disp);

$query_disp_vagas ="SELECT mvg_ocp_carro, mvg_ocp_moto FROM mov_vagas WHERE mvg_id = '{$ret_mvg_id}';";
$res_disp_vagas = mysqli_query($conn, $query_disp_vagas);
while ($ret_disp_vagas = mysqli_fetch_array($res_disp_vagas, MYSQLI_NUM)){
    $disp_carro = $ret_disp_vagas['mvg_ocp_carro'];
    $disp_moto = $ret_disp_vagas['mvg_ocp_moto'];
}
//}//else
//}//else

echo( "<a> ret_tx: ". $ret_mvg_tx_reserva .  " / vagas_disp_carro: " . $vagas_disp_carro . " / vagas_disp_moto: " . $vagas_disp_moto . " / disp_carro: " . $disp_carro . " / disp_moto: " . $disp_moto . "</a>");

?>