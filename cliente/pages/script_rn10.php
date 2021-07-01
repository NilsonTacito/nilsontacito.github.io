<?php
/*
Script da tarefa de cancelamento da reserva
*/

include('conexao.php');
$qry_get_data= "SELECT rsv_id, TIMESTAMPDIFF(MINUTE, NOW(), rsv_data) AS diff, rsv_chkin, rsv_chkin_dt FROM reserva;";
$res_get_data= mysqli_query($conn,$qry_get_data);

$cont= 0;
$rsv_data['id']= array();
$rsv_data['diff']= array();
$rsv_data['chkin']= array();
$rsv_data['rsv_chkin_dt']= array();

while($ret_get_data = mysqli_fetch_array($res_get_data, MYSQLI_ASSOC)){
    $rsv_data['id'][$cont] = $ret_get_data['rsv_id'];
    $rsv_data['diff'][$cont] = $ret_get_data['diff'];
    $rsv_data['chkin'][$cont] = $ret_get_data['rsv_chkin'];
    $rsv_data['chkin_dt'][$cont] = $ret_get_data['rsv_chkin_dt'];
    $cont++;
}

$length_id = count($rsv_data['id']);

for($i=0;$i<$length_id;$i++){
    if(($rsv_data['diff'][$i] > 3000) AND ($rsv_data['chkin'][$i] == 'nok')){
        $updt_id = $rsv_data['id'][$i];
        $qry_rn010="UPDATE reserva SET rsv_chkin='ok', rsv_chkout='ok' WHERE rsv_id='{$updt_id}';";
        $res_rn010 = mysqli_query($conn, $qry_rn010);
        
        /* 
        condições mostrar reserva como "cancelada" pro cliente:

        if((rsv_chkin='ok') AND (rsv_chkout='ok') AND (rsv_chkin_dt= null) AND (rsv_chkout_dt = null)){
        echo "reserva cancelada";
        }       
        
        //saída, teste:
        if($res_rn010 != null){
            $qry_echo_rn010="SELECT rsv_id, rsv_chkin, rsv_chkout FROM reserva WHERE rsv_id='{$updt_id}';";
            $res_echo_rn010 = mysqli_query($conn, $qry_echo_rn010);
            while($ret_echo_rn010 = mysqli_fetch_array($res_echo_rn010, MYSQLI_ASSOC)){
                echo("ID: ". $ret_echo_rn010['rsv_id'] . " - Check In: " . $ret_echo_rn010['rsv_chkin'] . " - Check Out: " . $ret_echo_rn010['rsv_chkout']);
            }            
        }
        */           
    }        
}

?>