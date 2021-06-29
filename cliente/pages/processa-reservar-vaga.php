<?php
//processamento do form de compra e/ou reserva de vagas (página reservar-vaga.php)

include('conexao.php');
include('processa-sessao-cliente.php');

$res_data= $_POST['inp-data']; 
$res_hora= $_POST['inp-hora'];
$res_veiculo = $_POST['inp-veciulo'];
var_dump($res_veiculo);
//res-dia, res-mes, res-ano, res-hora

if(!empty($res_veiculo)){//insert
    
    $query_rsv_0="INSERT INTO reserva (rsv_data, fk_rsv_estac_id, fk_rsv_vei_placa, rsv_hora) VALUES ('{$res_data}', '{$cookie_id_estac}', '{$res_veiculo}', '{$res_hora}');";
    $res_rsv_0 = mysqli_query($conn, $query_rsv_0);
    
    $qry_last_id ="SELECT last_insert_id();";
    $res_last_id = mysqli_query($conn, $qry_last_id);  
    $ret_last_id = mysqli_fetch_array($res_last_id, MYSQLI_BOTH);
    $last_id = intval($ret_last_id['last_insert_id()']);

    var_dump($res_rsv_0 . ' - ' . $last_id);

    //get vagas ocupadas (fazer isso dentro do if, num join)
    $qry_get_mov_vagas = "SELECT mvg_id, mvg_ocp_carro, mvg_ocp_moto FROM mov_vagas WHERE fk_mvg_estac_id = '{$cookie_id_estac}';";
    $res_get_mov_vagas = mysqli_query($conn, $qry_get_mov_vagas);
    if ($res_get_mov_vagas != null){
        while($ret_get_mov_vagas = mysqli_fetch_array($res_get_mov_vagas, MYSQLI_BOTH)){
            $ret_proc_mvg_id = $ret_get_mov_vagas['mvg_id'];
            $ret_mvg_carros_disp = intval($ret_get_mov_vagas['mvg_ocp_carro']);
            $ret_mvg_motos_disp = intval($ret_get_mov_vagas['mvg_ocp_moto']);
        }
    }

    if($res_rsv_0 != null){
        //saber se placas é de carro ou moto -- pegar dados da mv aqui??
        $qry_tipo_vei_placa_0 = "SELECT vei_tipo FROM veiculo WHERE vei_placa ='{$res_veiculo}';";
        $res_tipo_vei_placa_0 = mysqli_query($conn, $qry_tipo_vei_placa_0);

        if(!empty($res_tipo_vei_placa_0)){
            $ret_tipo_vei_placa_0 = mysqli_fetch_array($res_tipo_vei_placa_0, MYSQLI_ASSOC);
            $tipo_vei_placa_0 = $ret_tipo_vei_placa_0['vei_tipo'];

            switch($tipo_vei_placa_0){
                case "carro" :
                    $mvg_carro_disp_0 = $ret_mvg_carros_disp + 1;
                    $qyr_update_carro_disp_0 = "UPDATE mov_vagas SET mvg_ocp_carro='{$mvg_carros_disp_0}' WHERE mvg_id = '{$ret_proc_mvg_id}';";
                    $res_update_carro_disp_0 = mysqli_query($conn,$qyr_update_carro_disp_0);
                    if ($res_update_carro_disp_0 != null){
                        header('Location: /cliente/pages/consultar-reservas.php');
                        exit();
                    }                    
                    break;

                case "Carro" :
                    $mvg_carro_disp_1 = $ret_mvg_carros_disp + 1;
                    $qyr_update_carro_disp_1 = "UPDATE mov_vagas SET mvg_ocp_carro='{$mvg_carros_disp_1}' WHERE mvg_id = '{$ret_proc_mvg_id}';";
                    $res_update_carro_disp_1 = mysqli_query($conn,$qyr_update_carro_disp_1);
                    if ($res_update_carro_disp_1 != null){
                        header('Location: /cliente/pages/consultar-reservas.php');
                        exit();
                    }    
                    break;

                case "moto" :
                    $mvg_moto_disp_0 = $ret_mvg_motos_disp + 1;
                    $qyr_update_moto_disp_0 = "UPDATE mov_vagas SET mvg_ocp_moto='{$mvg_moto_disp_0}' WHERE mvg_id = '{$ret_proc_mvg_id}';";
                    $res_update_moto_disp_0 = mysqli_query($conn,$qyr_update_moto_disp_0);
                    if ($res_update_moto_disp_0 != null){
                        header('Location: /cliente/pages/consultar-reservas.php');
                        exit();
                    }
                    break;

                case "Moto" :
                    $mvg_moto_disp_1 = $ret_mvg_motos_disp + 1;
                    $qyr_update_moto_disp_1 = "UPDATE mov_vagas SET mvg_ocp_moto='{$mvg_moto_disp_1}' WHERE mvg_id = '{$ret_proc_mvg_id}';";
                    $res_update_moto_disp_1 = mysqli_query($conn,$qyr_update_moto_disp_0);
                    if ($res_update_moto_disp_1 != null){
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

