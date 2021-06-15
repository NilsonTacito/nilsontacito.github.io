<?php
include('conexao.php');
include('processa-sessao-cliente.php');
include('reservar-vaga.php');

//alterar reserva add mais 4 campos pra placas

$res_data= $_POST['inp-data']; 
$res_hora= $_POST['inp-hora'];

if(isset($_SESSION['placas'])){
    $placa_0 = $_SESSION['placas'][0];
    $placa_1 = $_SESSION['placas'][1];
    $placa_2 = $_SESSION['placas'][2];
    $placa_3 = $_SESSION['placas'][3];
    $placa_4 = $_SESSION['placas'][4];
}

if(isset($_SESSION['placas'][0])){  //precisa do campo hora?
    $query_rvs_0="INSERT INTO reserva (rsv_data, fk_rsv_vei_placa_0, fk_mvg_estac_id) VALUES ('{$res_data}','{$placa_0}','{$cookie_id_estac}');";
    $res_rsv_0 = mysqli_query($conn, $query_rvs_0);

    //retornar id da reserva
    if($res_rsv_0 != null){
        $query_get_rsv_id = "SELECT rsv_id FROM reserva WHERE rsv_data='{$res_data}', fk_rsv_vei_placa='{$placa_0}', fk_mvg_estac_id='{$cookie_id_estac}';";
        $res_get_rsv_id = mysqli_query($conn,$query_get_rsv_id);
        if($res_get_rsv_id != null){
            $ret_rsv_id = mysqli_fetch_array($res_get_rsv_id);
            $rsv_id = $ret_rsv_id['rsv_id']; 
        }
    }    
    echo("sucesso0");
}

if(isset($_SESSION['placas'][1])){
    $query_rsv_1="INSERT INTO reserva (fk_rsv_vei_placa_1) VALUES ('{$placa_1}') WHERE rsv_id='{$rsv_id}';";
    $res_rsv_1 = mysqli_query($conn,$query_rsv_1);
    if($res_rsv_1 != null){
        echo("sucesso1");
    }
} 
if(isset($_SESSION['placas'][2])){
    $query_rsv_2="INSERT INTO reserva (fk_rsv_vei_placa_2) VALUES ('{$placa_2}') WHERE rsv_id='{$rsv_id}';";
    $res_rsv_2 = mysqli_query($conn,$query_rsv_2);
    if($res_rsv_2 != null){
        echo("sucesso2");
    }
} 
if(isset($_SESSION['placas'][3])){
    $query_rsv_3="INSERT INTO reserva (fk_rsv_vei_placa_3) VALUES ('{$placa_3}') WHERE rsv_id='{$rsv_id}';";
    $res_rsv_3 = mysqli_query($conn,$query_rsv_3);
    if($res_rsv_3 != null){
        echo("sucesso3");
    }
} 
if(isset($_SESSION['placas'][4])){
    $query_rsv_4="INSERT INTO reserva (fk_rsv_vei_placa_4) VALUES ('{$placa_4}') WHERE rsv_id='{$rsv_id}';";
    $res_rsv_4 = mysqli_query($conn,$query_rsv_1);
    if($res_rsv_4 != null){
        echo("sucesso4");
    }
} 



?>