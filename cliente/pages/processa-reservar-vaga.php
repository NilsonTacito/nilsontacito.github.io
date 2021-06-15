<?php
//processamento do form de compra e/ou reserva de vagas (página reservar-vaga.php)

include('conexao.php');
include('processa-sessao-cliente.php');
include('reservar-vagas.php');

//alterar reserva add mais 4 campos pra placas


$res_data= $_POST['inp-data']; 
$res_hora= $_POST['inp-hora'];

if($_POST['check-veiculo0'] != null){
    $res_vei0 = $_POST['check-veiculo0'];
        if($_POST['check-veiculo1'] != null){
            $res_vei1 = $_POST['check-veiculo1'];
        }if($_POST['check-veiculo2'] != null){
            $res_vei2 = $_POST['check-veiculo2'];
        }if($_POST['check-veiculo3'] != null){
            $res_vei3 = $_POST['check-veiculo3'];
        }if($_POST['check-veiculo4'] != null){
            $res_vei4 = $_POST['check-veiculo4'];
        }
}
/*
if(isset($_SESSION['placas'])){
    $placa_0 = $_SESSION['placas'][0];
    $placa_1 = $_SESSION['placas'][1];
    $placa_2 = $_SESSION['placas'][2];
    $placa_3 = $_SESSION['placas'][3];
    $placa_4 = $_SESSION['placas'][4];
}
*/

if(isset($res_vei0)){  //precisa do campo hora?
    $query_rvs_0="INSERT INTO reserva (rsv_data, fk_rsv_vei_placa, fk_mvg_estac_id) VALUES ('{$res_data}','{$res_vei0}','{$cookie_id_estac}');";
    $res_rsv_0 = mysqli_query($conn, $query_rvs_0);

    //retornar id da reserva
    if($res_rsv_0 != null){
        $query_get_rsv_id = "SELECT rsv_id FROM reserva WHERE rsv_data='{$res_data}', fk_rsv_vei_placa='{$res_vei0}', fk_mvg_estac_id='{$cookie_id_estac}';";
        $res_get_rsv_id = mysqli_query($conn,$query_get_rsv_id);
        if($res_get_rsv_id != null){
            $ret_rsv_id = mysqli_fetch_array($res_get_rsv_id);
            $rsv_id = $ret_rsv_id['rsv_id']; 
        }
    }    
    echo("sucesso0");
}

if(isset($res_vei1)){
    $query_rsv_1="INSERT INTO reserva (fk_rsv_vei_placa_1) VALUES ('{$res_vei1}') WHERE rsv_id='{$rsv_id}';";
    $res_rsv_1 = mysqli_query($conn,$query_rsv_1);
    if($res_rsv_1 != null){
        echo("sucesso1");
    }
} 
if(isset($res_vei2)){
    $query_rsv_2="INSERT INTO reserva (fk_rsv_vei_placa_2) VALUES ('{$res_vei2}') WHERE rsv_id='{$rsv_id}';";
    $res_rsv_2 = mysqli_query($conn,$query_rsv_2);
    if($res_rsv_2 != null){
        echo("sucesso2");
    }
} 
if(isset($res_vei3)){
    $query_rsv_3="INSERT INTO reserva (fk_rsv_vei_placa_3) VALUES ('{$res_vei3}') WHERE rsv_id='{$rsv_id}';";
    $res_rsv_3 = mysqli_query($conn,$query_rsv_3);
    if($res_rsv_3 != null){
        echo("sucesso3");
    }
}

if(isset($res_vei4)){
    $query_rsv_4="INSERT INTO reserva (fk_rsv_vei_placa_4) VALUES ('{$res_vei4}') WHERE rsv_id='{$rsv_id}';";
    $res_rsv_4 = mysqli_query($conn,$query_rsv_1);
    if($res_rsv_4 != null){
        echo("sucesso4");
    }
} 

/* 
if(isset($_SESSION['placas'][4])){
    $query_rsv_4="INSERT INTO reserva (fk_rsv_vei_placa_4) VALUES ('{$res_vei4}') WHERE rsv_id='{$rsv_id}';";
    $res_rsv_4 = mysqli_query($conn,$query_rsv_1);
    if($res_rsv_4 != null){
        echo("sucesso4");
    }
} 
*/
if ($rsv_id != null){
    header('Location: /cliente/pages/consultar-reservas.php');
    exit();
}















/*
if(isset($array[$contador])){
    $quant = 0;
    if($contador > $contadorOutput){
        for ($cont0 = $contador; $cont0 <= 0; $cont0--){
            $array_x[$quant] = $array[$contadorOutput];
            //testes abaixo
            $x = strval($array[$contador]); 
            $y = strval($array[$contadorOutput]);
            echo ($x . " - " . $y);
            $quant++;
            //array de placas
            //através das placas, saber o tipo das vagas
        }
    }
}
*/

/*reserva:
//a data será obtida através do formulário; $_POST['inp-data'], $_POST['inp-hora']
//a placa também, ou será obtida buscando no banco (usando o email que está na sessão);
//ou obter placa através do formulário, talvez... colocar em variável na página reservar-vaga.php e mandar na hora do submit

//reservar vaga
$query_res = "INSERT INTO reserva (rsv_data, fk_rsv_vei_placa, fk_mvg_estac_id) VALUES ('{$var_data}','{$var_placa}','{$cookie_id_estac}');
//os demais dados são default ou será informados posteriormente... reserva ok!







//obter quantidade de vagas atuais subtraindo vagas ocupadas (mov_vagas.mvg_ocp_carro) do total (estacionamento.estac_vg_carro)
SELECT estac_vg_carro FROM estacionamento WHERE estac_id ='{$cookie_id_estac}';
SELECT mvg_ocp_carro FROM mov_vagas WHERE mvg_id ='{$cookie_id_estac}';

//como realizar este cálculo no banco?

//isso aparentemente funciona (retorna dados null como número 0)
SELECT COALESCE(CASE WHEN ISNULL (mvg_ocp_carro) THEN 0 ELSE mvg_ocp_carro END) AS mvg_ocp_carro_null_0, COALESCE(CASE WHEN ISNULL (mvg_ocp_moto) THEN 0 ELSE mvg_ocp_moto END) AS mvg_ocp_moto_null_0 FROM mov_vagas WHERE fk_mvg_estac_id = '1';
//subtrair: estac_vg_carro - mvg_ocp_carro

//por fim, fazer update do valor da subtração na table mov_vagas (atualizar vagas ocupadas)
UPDATE mov_vagas SET mvg_ocp_carro ='valor_subtracao' WHERE fk_mvg_estac_id = '{$cookie_id_estac}';

//no fim, informar: reserva realizada com sucesso!



*/

?>