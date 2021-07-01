<?php
/*
Script da tarefa de cancelamento da reserva
*/

include('conexao.php');                //diferença entre agora e hora agendada na reserva em minutos  
$qry_get_data= "SELECT reserva.rsv_id, TIMESTAMPDIFF(MINUTE, NOW(), reserva.rsv_data) AS diff, reserva.rsv_chkin, reserva.rsv_chkin_dt, reserva.fk_rsv_mvg_id, veiculo.vei_tipo 
FROM reserva
INNER JOIN veiculo ON veiculo.vei_placa = reserva.fk_rsv_vei_placa;";
$res_get_data= mysqli_query($conn,$qry_get_data);

$cont= 0;
$rsv_data['id']= array();
$rsv_data['diff']= array();
$rsv_data['chkin']= array();
$rsv_data['rsv_chkin_dt']= array();
$rsv_data['fk_rsv_mvg_id']= array();
$rsv_data['vei_tipo ']= array();


while($ret_get_data = mysqli_fetch_array($res_get_data, MYSQLI_ASSOC)){
    $rsv_data['id'][$cont] = $ret_get_data['rsv_id'];
    $rsv_data['diff'][$cont] = $ret_get_data['diff'];
    $rsv_data['chkin'][$cont] = $ret_get_data['rsv_chkin'];
    $rsv_data['chkin_dt'][$cont] = $ret_get_data['rsv_chkin_dt'];
    $rsv_data['fk_rsv_mvg_id'][$cont] = $ret_get_data['fk_rsv_mvg_id'];
    $rsv_data['vei_tipo'][$cont] = $ret_get_data['vei_tipo'];
    $cont++;
}

$length_id = count($rsv_data['id']);

for($i=0;$i<$length_id;$i++){ 
    //abaixo, mudar pra 15 na Hostinger
    if(($rsv_data['diff'][$i] > 3000) AND ($rsv_data['chkin'][$i] == 'nok')){
        $updt_id = $rsv_data['id'][$i];
        $qry_rn010="UPDATE reserva SET rsv_chkin='ok', rsv_chkout='ok' WHERE rsv_id='{$updt_id}';";
        $res_rn010 = mysqli_query($conn, $qry_rn010); //cancelar é isso: chkin e chkout ok, sem alterar timestamps  (chkin_dt e chkout_dt = null)
        
        $mvg_id = $rsv_data['fk_rsv_mvg_id'][$i];
        $qry_vg_ocp = "SELECT mvg_ocp_carro, mvg_ocp_moto FROM mov_vagas WHERE mvg_id='{$mvg_id}';";
        $res_vg_ocp = mysqli_query($conn,$qry_vg_ocp);
        while($ret_vg_ocp = mysqli_fetch_array($res_vg_ocp, MYSQLI_ASSOC)){
            $ocp_carro = intval($res_vg_ocp['mvg_ocp_carro']);
            $ocp_moto = intval($res_vg_ocp['mvg_ocp_moto']);
        }
      
        //select mvg ocp carro, mvg ocp moto where mvg_id = fk_mvg_id
        $arr_tipo = $rsv_data['vei_tipo'][$i];

        if(($arr_tipo == "Carro") OR ($arr_tipo == "carro")){
            $ocp_carro_updt = $ocp_carro - 1;
            $qry_updt_carro = "UPDATE mov_vagas SET mvg_ocp_carro='{$ocp_carro_updt}' WHERE mvg_id='{$mvg_id}' ;";
            $res_updt_carro = mysqli_query($conn, $qry_updt_carro);    
        }

        //moto
        if(($arr_tipo == "Moto") OR ($arr_tipo == "moto")){
            $ocp_moto_updt = $ocp_moto - 1;
            $qry_updt_moto = "UPDATE mov_vagas SET mvg_ocp_moto='{$ocp_moto_updt}' WHERE mvg_id='{$mvg_id}' ;";
            $res_updt_moto = mysqli_query($conn, $qry_updt_moto); 
        }
        
    }        
}

?>