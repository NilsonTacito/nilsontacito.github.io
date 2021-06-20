<?php
//processamento do form de compra e/ou reserva de vagas (página reservar-vaga.php)

include('conexao.php');
include('processa-sessao-cliente.php');
//include('reservar-vagas.php');

$res_data= $_POST['inp-data']; 
$res_hora= $_POST['inp-hora'];

//get valores checkbox
if($_POST['check-veiculo0'] != null){ // !empty($vars) seria melhor?
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
remover fk_rsv_id da mov vagas? mantive...
add to reserva fk_mvg_estac_id ou mvg id?
preciso do mvg_id na reserva?
*/



if(!empty($res_vei0)){//insert
    
    $query_rvs_0="INSERT INTO reserva (rsv_data, fk_rsv_estac_id, fk_rsv_vei_placa, rsv_hora) VALUES ('{$res_data}', '{$cookie_id_estac}', '{$res_vei0}', '{$res_hora}');";
    $res_rsv_0 = mysqli_query($conn, $query_rvs_0);
    $rows_res_rsv_0 = mysqli_num_rows($res_rsv_0); //Query OK, 1 row affected (0.22 sec), se tá errado, nenhuma row é afetada -- if (mysqli_num_row == 1) {
    //preciso de uma var pra saber a quant de rows? nao, a própria $res_ me traz isso

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

    if($rows_res_rsv_0 == 1){
        //saber se placas é de carro ou moto -- pegar dados da mv aqui??
        $qry_tipo_vei_placa_0 = "SELECT vei_tipo FROM veiculo WHERE vei_placa ='{$res_vei0}';";
        $res_tipo_vei_placa_0 = mysqli_query($conn, $qry_tipo_vei_placa_0);

        if(!empty($res_tipo_vei_placa_0)){
            $ret_tipo_vei_placa_0 = mysqli_fetch_array($res_tipo_vei_placa_0, MYSQLI_ASSOC);
            $tipo_vei_placa_0 = $ret_tipo_vei_placa_0['vei_tipo'];

            //usar case aqui??
            if($tipo_vei_placa_0 == "carro"){
                $mvg_carro_disp_0 = $ret_mvg_carros_disp - 1;
                $qyr_update_carro_disp_0 = "UPDATE mov_vagas SET mvg_ocp_carro='{$mvg_carros_disp_0}' WHERE mvg_id = '{$ret_proc_mvg_id}';";
                $res_update_carro_disp_0 = mysqli_query($conn,$qyr_update_carro_disp_0);//Query OK, 1 row affected (0.16 sec)
                /* testar depois
                $rows_update_carro_disp_0 = mysqli_num_rows($res_update_carro_disp_0);
                if($rows_update_carro_disp_0 == 1){
                }*/
            }
            if($tipo_vei_placa_0 == "moto"){
                $mvg_moto_disp_0 = $ret_mvg_motos_disp - 1;
                $qyr_update_moto_disp_0 = "UPDATE mov_vagas SET mvg_ocp_moto='{$mvg_moto_disp_0}' WHERE mvg_id = '{$ret_proc_mvg_id}';";
                $res_update_moto_disp_0 = mysqli_query($conn,$qyr_update_moto_disp_0);
                /* testar depois
                $rows_update_moto_disp_0 = mysqli_num_rows($res_update_moto_disp_0);
                if($rows_update_moto_disp_0 == 1){
                }*/
            }
        } // aqui acaba o update

        //retornar id da reserva, sor pq 1 tem que ser true mas não ambos
        if(($res_update_carro_disp_0 != null) xor ($res_update_moto_disp_0 != null)){ //SELECT rsv_id FROM reserva WHERE rsv_data='31-05-21' and fk_rsv_vei_placa='LIC5886' and fk_rsv_estac_id='1', usar num rows
            $query_get_rsv_id = "SELECT rsv_id FROM reserva WHERE rsv_data='{$res_data}' AND rsv_hora='{$res_hora}' AND fk_rsv_vei_placa='{$res_vei0}' AND fk_rsv_estac_id='{$cookie_id_estac}';";
            $res_get_rsv_id = mysqli_query($conn,$query_get_rsv_id);
            if(!empty($res_get_rsv_id)){
                $ret_rsv_id = mysqli_fetch_array($res_get_rsv_id);
                $rsv_id = $ret_rsv_id['rsv_id']; 
            }
            if(empty($rsv_id)){//teste, o normal é mandar pra consulta -- se não retorna id, manda pra alterar (sem critério na escolha dessa page)
                header('Location: /cliente/pages/alterar-veiculo.php');
                exit();
            }
        }
        //window alert aqui   
        echo("sucesso0");

    } //fim da placa 0


    //placa 1
    if(empty($res_vei1)){
        header('Location: /cliente/pages/consultar-reservas.php');
        exit();
    } 
    if(!empty($res_vei1)){
        $query_rsv_1="UPDATE reserva SET fk_rsv_vei_placa_1 ='{$res_vei1}' WHERE rsv_id='{$rsv_id}';";
        $res_rsv_1 = mysqli_query($conn,$query_rsv_1);
        $rows_res_rsv_1= mysqli_num_rows($res_rsv_1); 

            //get vagas ocupadas (fazer isso dentro do if, num join)
            $qry_get_mov_vagas1 = "SELECT mvg_ocp_carro, mvg_ocp_moto FROM mov_vagas WHERE fk_mvg_estac_id = '{$cookie_id_estac}';";
            $res_get_mov_vaga1 = mysqli_query($conn, $qry_get_mov_vagas1);
            if ($res_get_mov_vagas1 != null){
                while($ret_get_mov_vagas1 = mysqli_fetch_array($res_get_mov_vagas1, MYSQLI_BOTH)){
                    $ret_mvg_carros_disp1 = intval($ret_get_mov_vagas1['mvg_ocp_carro']);
                    $ret_mvg_motos_disp1 = intval($ret_get_mov_vagas1['mvg_ocp_moto']);
                }
            }
        
            if($rows_res_rsv_1 == 1){
                $qry_tipo_vei_placa_1 = "SELECT vei_tipo FROM veiculo WHERE vei_placa ='{$res_vei1}';";
                $res_tipo_vei_placa_1 = mysqli_query($conn, $qry_tipo_vei_placa_1);
        
                if(!empty($res_tipo_vei_placa_1)){
                    $ret_tipo_vei_placa_1 = mysqli_fetch_array($res_tipo_vei_placa_1, MYSQLI_ASSOC);
                    $tipo_vei_placa_1 = $ret_tipo_vei_placa_1['vei_tipo'];
        
                    //usar case aqui??
                    if($tipo_vei_placa_1 == "carro"){
                        $mvg_carro_disp_1 = $ret_mvg_carros_disp1 - 1;
                        $qyr_update_carro_disp_1 = "UPDATE mov_vagas SET mvg_ocp_carro='{$mvg_carros_disp_1}' WHERE mvg_id = '{$ret_proc_mvg_id}';";
                        $res_update_carro_disp_1 = mysqli_query($conn,$qyr_update_carro_disp_1);//Query OK, 1 row affected (0.16 sec)
                        /* testar depois
                        $rows_update_carro_disp_0 = mysqli_num_rows($res_update_carro_disp_0);
                        if($rows_update_carro_disp_0 == 1){
                        }*/
                    }
                    if($tipo_vei_placa_1 == "moto"){
                        $mvg_moto_disp_1 = $ret_mvg_motos_disp1 - 1;
                        $qyr_update_moto_disp_1 = "UPDATE mov_vagas SET mvg_ocp_moto='{$mvg_moto_disp_1}' WHERE mvg_id = '{$ret_proc_mvg_id}';";
                        $res_update_moto_disp_1 = mysqli_query($conn,$qyr_update_moto_disp_1);
                        /* testar depois
                        $rows_update_moto_disp_0 = mysqli_num_rows($res_update_moto_disp_0);
                        if($rows_update_moto_disp_0 == 1){
                        }*/
                    }
                } // aqui acaba o update
                      
                //window alert aqui   
                echo("sucesso1");
        
            } //fim da placa 1
        
        if($res_rsv_1 != null){

            echo("sucesso1");
        }
    }

    //placa 2
    if(empty($res_vei2)){
        header('Location: /cliente/pages/consultar-reservas.php');
        exit();
    }
    if(!empty($res_vei2)){
        $query_rsv_2="INSERT INTO reserva (fk_rsv_vei_placa_2) VALUES ('{$res_vei2}') WHERE rsv_id='{$rsv_id}';";
        $res_rsv_2 = mysqli_query($conn,$query_rsv_2);

        $rows_res_rsv_2= mysqli_num_rows($res_rsv_2); 

        //get vagas ocupadas (fazer isso dentro do if, num join)
        $qry_get_mov_vagas2 = "SELECT mvg_ocp_carro, mvg_ocp_moto FROM mov_vagas WHERE fk_mvg_estac_id = '{$cookie_id_estac}';";
        $res_get_mov_vaga2 = mysqli_query($conn, $qry_get_mov_vagas2);
        if ($res_get_mov_vagas2 != null){
            while($ret_get_mov_vagas2 = mysqli_fetch_array($res_get_mov_vagas2 MYSQLI_BOTH)){
                $ret_mvg_carros_disp2 = intval($ret_get_mov_vagas2['mvg_ocp_carro']);
                $ret_mvg_motos_disp2= intval($ret_get_mov_vagas2['mvg_ocp_moto']);
            }
        }
    
        if($rows_res_rsv_2 == 1){
            $qry_tipo_vei_placa_2 = "SELECT vei_tipo FROM veiculo WHERE vei_placa ='{$res_vei2}';";
            $res_tipo_vei_placa_2 = mysqli_query($conn, $qry_tipo_vei_placa_2);
    
            if(!empty($res_tipo_vei_placa_2)){
                $ret_tipo_vei_placa_2 = mysqli_fetch_array($res_tipo_vei_placa_2, MYSQLI_ASSOC);
                $tipo_vei_placa_2 = $ret_tipo_vei_placa_2['vei_tipo'];
    
                //usar case aqui??
                if($tipo_vei_placa_2 == "carro"){
                    $mvg_carro_disp_2 = $ret_mvg_carros_disp2 - 1;
                    $qyr_update_carro_disp_2 = "UPDATE mov_vagas SET mvg_ocp_carro='{$mvg_carros_disp_2}' WHERE mvg_id = '{$ret_proc_mvg_id}';";
                    $res_update_carro_disp_2 = mysqli_query($conn,$qyr_update_carro_disp_2);//Query OK, 1 row affected (0.16 sec)
                    /* testar depois
                    $rows_update_carro_disp_0 = mysqli_num_rows($res_update_carro_disp_0);
                    if($rows_update_carro_disp_0 == 1){
                    }*/
                }
                if($tipo_vei_placa_2 == "moto"){
                    $mvg_moto_disp_2 = $ret_mvg_motos_disp2 - 1;
                    $qyr_update_moto_disp_2 = "UPDATE mov_vagas SET mvg_ocp_moto='{$mvg_moto_disp_2}' WHERE mvg_id = '{$ret_proc_mvg_id}';";
                    $res_update_moto_disp_2 = mysqli_query($conn,$qyr_update_moto_disp_2);
                    /* testar depois
                    $rows_update_moto_disp_0 = mysqli_num_rows($res_update_moto_disp_0);
                    if($rows_update_moto_disp_0 == 1){
                    }*/
                }
            } // aqui acaba o update
                  
            //window alert aqui   
            echo("sucesso2");
    
        } //fim da placa 1
    
        if($res_rsv_2 != null){

            echo("sucesso2");
        }
    }
    
    //placa3
    if(empty($res_vei3)){
        header('Location: /cliente/pages/consultar-reservas.php');
        exit();
    }
    if(!empty($res_vei3)){
        $query_rsv_3="INSERT INTO reserva (fk_rsv_vei_placa_3) VALUES ('{$res_vei3}') WHERE rsv_id='{$rsv_id}';";
        $res_rsv_3 = mysqli_query($conn,$query_rsv_3);
        $rows_res_rsv_3= mysqli_num_rows($res_rsv_3); 

        //get vagas ocupadas (fazer isso dentro do if, num join)
        $qry_get_mov_vagas3 = "SELECT mvg_ocp_carro, mvg_ocp_moto FROM mov_vagas WHERE fk_mvg_estac_id = '{$cookie_id_estac}';";
        $res_get_mov_vaga3 = mysqli_query($conn, $qry_get_mov_vagas3);
        if ($res_get_mov_vagas2 != null){
            while($ret_get_mov_vagas3 = mysqli_fetch_array($res_get_mov_vagas3 MYSQLI_BOTH)){
                $ret_mvg_carros_disp3 = intval($ret_get_mov_vagas3['mvg_ocp_carro']);
                $ret_mvg_motos_disp3= intval($ret_get_mov_vagas3['mvg_ocp_moto']);
            }
        }
    
        if($rows_res_rsv_3 == 1){
            $qry_tipo_vei_placa_3 = "SELECT vei_tipo FROM veiculo WHERE vei_placa ='{$res_vei3}';";
            $res_tipo_vei_placa_3 = mysqli_query($conn, $qry_tipo_vei_placa_3);
    
            if(!empty($res_tipo_vei_placa_3)){
                $ret_tipo_vei_placa_3 = mysqli_fetch_array($res_tipo_vei_placa_2, MYSQLI_ASSOC);
                $tipo_vei_placa_3 = $ret_tipo_vei_placa_3['vei_tipo'];
    
                //usar case aqui??
                if($tipo_vei_placa_3 == "carro"){
                    $mvg_carro_disp_3 = $ret_mvg_carros_disp3 - 1;
                    $qyr_update_carro_disp_3 = "UPDATE mov_vagas SET mvg_ocp_carro='{$mvg_carros_disp_3}' WHERE mvg_id = '{$ret_proc_mvg_id}';";
                    $res_update_carro_disp_3 = mysqli_query($conn,$qyr_update_carro_disp_3);//Query OK, 1 row affected (0.16 sec)
                    /* testar depois
                    $rows_update_carro_disp_0 = mysqli_num_rows($res_update_carro_disp_0);
                    if($rows_update_carro_disp_0 == 1){
                    }*/
                }
                if($tipo_vei_placa_3 == "moto"){
                    $mvg_moto_disp_3 = $ret_mvg_motos_disp3 - 1;
                    $qyr_update_moto_disp_3 = "UPDATE mov_vagas SET mvg_ocp_moto='{$mvg_moto_disp_3}' WHERE mvg_id = '{$ret_proc_mvg_id}';";
                    $res_update_moto_disp_3 = mysqli_query($conn,$qyr_update_moto_disp_3);
                    /* testar depois
                    $rows_update_moto_disp_0 = mysqli_num_rows($res_update_moto_disp_0);
                    if($rows_update_moto_disp_0 == 1){
                    }*/
                }
            } // aqui acaba o update
                  
            //window alert aqui   
            echo("sucesso3");
    
        } //fim da placa 1
    
        if($res_rsv_3 != null){
            echo("sucesso3");
        }
    }
    
    //placa 4
    if(empty($res_vei4)){
        header('Location: /cliente/pages/consultar-reservas.php');
        exit();
    }
    if(!empty($res_vei4)){
        $query_rsv_4="INSERT INTO reserva (fk_rsv_vei_placa_4) VALUES ('{$res_vei4}') WHERE rsv_id='{$rsv_id}';";
        $res_rsv_4 = mysqli_query($conn,$query_rsv_4);
        //--

        $rows_res_rsv_4= mysqli_num_rows($res_rsv_4); 

        //get vagas ocupadas (fazer isso dentro do if, num join)
        $qry_get_mov_vagas4 = "SELECT mvg_ocp_carro, mvg_ocp_moto FROM mov_vagas WHERE fk_mvg_estac_id = '{$cookie_id_estac}';";
        $res_get_mov_vaga4 = mysqli_query($conn, $qry_get_mov_vagas4);
        if ($res_get_mov_vagas4 != null){
            while($ret_get_mov_vagas4 = mysqli_fetch_array($res_get_mov_vagas4 MYSQLI_BOTH)){
                $ret_mvg_carros_disp4 = intval($ret_get_mov_vagas4['mvg_ocp_carro']);
                $ret_mvg_motos_disp4= intval($ret_get_mov_vagas4['mvg_ocp_moto']);
            }
        }
    
        if($rows_res_rsv_4 == 1){
            $qry_tipo_vei_placa_4 = "SELECT vei_tipo FROM veiculo WHERE vei_placa ='{$res_vei4}';";
            $res_tipo_vei_placa_4 = mysqli_query($conn, $qry_tipo_vei_placa_4);
    
            if(!empty($res_tipo_vei_placa_2)){
                $ret_tipo_vei_placa_2 = mysqli_fetch_array($res_tipo_vei_placa_2, MYSQLI_ASSOC);
                $tipo_vei_placa_2 = $ret_tipo_vei_placa_2['vei_tipo'];
    
                //usar case aqui??
                if($tipo_vei_placa_2 == "carro"){
                    $mvg_carro_disp_2 = $ret_mvg_carros_disp2 - 1;
                    $qyr_update_carro_disp_2 = "UPDATE mov_vagas SET mvg_ocp_carro='{$mvg_carros_disp_2}' WHERE mvg_id = '{$ret_proc_mvg_id}';";
                    $res_update_carro_disp_2 = mysqli_query($conn,$qyr_update_carro_disp_2);//Query OK, 1 row affected (0.16 sec)
                    /* testar depois
                    $rows_update_carro_disp_0 = mysqli_num_rows($res_update_carro_disp_0);
                    if($rows_update_carro_disp_0 == 1){
                    }*/
                }
                if($tipo_vei_placa_4 == "moto"){
                    $mvg_moto_disp_2 = $ret_mvg_motos_disp4 - 1;
                    $qyr_update_moto_disp_4 = "UPDATE mov_vagas SET mvg_ocp_moto='{$mvg_moto_disp_4}' WHERE mvg_id = '{$ret_proc_mvg_id}';";
                    $res_update_moto_disp_4 = mysqli_query($conn,$qyr_update_moto_disp_4);
                    /* testar depois
                    $rows_update_moto_disp_0 = mysqli_num_rows($res_update_moto_disp_0);
                    if($rows_update_moto_disp_0 == 1){
                    }*/
                }
            } // aqui acaba o update
                  
            //window alert aqui   
            echo("sucesso4");
    
        } //fim da placa 1
    
        if($res_rsv_4 != null){

            echo("sucesso4");
        }
    }
        //----
        if($res_rsv_4 != null){
            echo("sucesso4");
        }
    } 
}


//pra onde eu mando depois disso tudo?

?>