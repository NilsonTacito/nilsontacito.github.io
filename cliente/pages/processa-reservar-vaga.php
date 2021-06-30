<?php
//processamento do form de compra e/ou reserva de vagas (página reservar-vaga.php)

include('conexao.php');
include('processa-sessao-cliente.php');

$res_dia= $_POST['res-dia']; 
$res_mes= $_POST['res-mes'];
$res_ano= $_POST['res-ano'];
$res_hora= $_POST['res-hora'];
$res_veiculo= $_POST['res-veiculo'];

$res_datetime = ($res_ano . "-" . $res_mes . "-" . $res_dia . " " . $res_hora . ":00"); 

//res-dia, res-mes, res-ano, res-hora, res-veciulo
//STR_TO_DATE('04/04/2012 04:03:35 AM', '%d/%m/%Y %r')

$qry_time_diff = "SELECT TIMESTAMPDIFF(DAY,current_date(),STR_TO_DATE('{$res_datetime}', '%d/%m/%Y %r')) AS diff_data;";
$res_time_diff = mysqli_query($conn, $qry_time_diff);
$ret_time_diff = mysqli_fetch_array($res_time_diff, MYSQLI_BOTH);
$time_diff = intval($ret_time_diff['diff_data']);

if($time_diff > 7){
    //$_SESSION['errors'] = array();
    $error_time_diff = '<a style="color: red;">Erro: Data agendada para reserva acima do limite permitido!</a>';
    $_SESSION['error_time_diff'] = $error_time_diff;
    header('Location: /cliente/pages/reservar-vagas.php');
    exit();
}


if(!empty($res_veiculo)){//insert
    
    $query_rsv_0="INSERT INTO reserva (rsv_data, fk_rsv_estac_id, fk_rsv_vei_placa) VALUES ('{$res_datetime}', '{$cookie_id_estac}', '{$res_veiculo}');";
    $res_rsv_0 = mysqli_query($conn, $query_rsv_0);
    
    $qry_last_id ="SELECT last_insert_id();";
    $res_last_id = mysqli_query($conn, $qry_last_id);  
    $ret_last_id = mysqli_fetch_array($res_last_id, MYSQLI_BOTH);
    $last_id = intval($ret_last_id['last_insert_id()']);

    //get vagas ocupadas (fazer isso dentro do if, num join)
    $qry_get_mvg = "SELECT mvg_id, mvg_ocp_carro, mvg_ocp_moto FROM mov_vagas WHERE fk_mvg_estac_id='{$cookie_id_estac}';";
    $res_get_mvg = mysqli_query($conn, $qry_get_mvg);

    while($ret_get_mvg = mysqli_fetch_array($res_get_mvg)){
        $ret_proc_mvg_id = intval($ret_get_mvg['mvg_id']);  
        $ret_mvg_carros_disp = intval($ret_get_mvg['mvg_ocp_carro']);
        $ret_mvg_motos_disp = intval($ret_get_mvg['mvg_ocp_moto']);

    }


    if($res_rsv_0 != null){
        //saber se placas é de carro ou moto -- pegar dados da mv aqui??
        $qry_tipo_vei_placa_0 = "SELECT vei_tipo FROM veiculo WHERE vei_placa ='{$res_veiculo}';";
        $res_tipo_vei_placa_0 = mysqli_query($conn, $qry_tipo_vei_placa_0);
        $_SESSION['test_0'] = array();
        if(!empty($res_tipo_vei_placa_0)){
            $ret_tipo_vei_placa_0 = mysqli_fetch_array($res_tipo_vei_placa_0, MYSQLI_ASSOC);
            $tipo_vei_placa_0 = strval($ret_tipo_vei_placa_0['vei_tipo']);

            switch($tipo_vei_placa_0){
                case "carro" :
                    $mvg_carro_disp_0 = $ret_mvg_carros_disp + 1;
                    $qry_updt_carro_disp_0 = "UPDATE mov_vagas SET mvg_ocp_carro='{$mvg_carro_disp_0}' WHERE mvg_id='{$ret_proc_mvg_id}';";
                    $res_updt_carro_disp_0 = mysqli_query($conn, $qry_updt_carro_disp_0);

                    //$_SESSION['test_0'][0] = var_dump($mvg_carro_disp_0 . " - " . $ret_mvg_carros_disp . " - " . $ret_proc_mvg_id . " - " . $qyr_update_carro_disp_1);
                    if ($res_updt_carro_disp_0 != null){
                        header('Location: /cliente/pages/consultar-reservas.php');
                        exit();
                    }                    
                    break;

                case "Carro" :
                    $mvg_carro_disp_1 = $ret_mvg_carros_disp + 1;
                    $qry_updt_carro_disp_1 = "UPDATE mov_vagas SET mvg_ocp_carro='{$mvg_carro_disp_1}' WHERE mvg_id='{$ret_proc_mvg_id}';";
                    $res_updt_carro_disp_1 = mysqli_query($conn, $qry_updt_carro_disp_1);

                    if ($res_updt_carro_disp_1 != null){
                        header('Location: /cliente/pages/consultar-reservas.php');
                        exit();
                    }    
                    break;

                case "moto" :
                    $mvg_moto_disp_0 = $ret_mvg_motos_disp + 1;                    
                    $qry_updt_moto_disp_0 = "UPDATE mov_vagas SET mvg_ocp_moto='{$mvg_moto_disp_0}' WHERE mvg_id='{$ret_proc_mvg_id}';";
                    $res_updt_moto_disp_0 = mysqli_query($conn, $qry_updt_moto_disp_0);

                    if ($res_updt_moto_disp_0 != null){
                        header('Location: /cliente/pages/consultar-reservas.php');
                        exit();
                    }
                    break;

                case "Moto" :
                    $mvg_moto_disp_1 = $ret_mvg_motos_disp + 1;
                    $qry_updt_moto_disp_1 = "UPDATE mov_vagas SET mvg_ocp_moto='{$mvg_moto_disp_1}' WHERE mvg_id='{$ret_proc_mvg_id}';";
                    $res_updt_moto_disp_1 = mysqli_query($conn, $qry_updt_moto_disp_0);

                    if ($res_updt_moto_disp_1 != null){
                        header('Location: /cliente/pages/consultar-reservas.php');
                        exit();
                    }
                    break;
            }
        }
    } // aqui acaba o update
    
    //retornar id da reserva, sor pq 1 tem que ser true mas não ambos
    if(!empty($last_id)){
        header('Location: /cliente/pages/consultar-reservas.php');
        exit();
    }        //window alert aqui   

} //fim da placa 0

