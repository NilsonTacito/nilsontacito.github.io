<?php
include('conexao.php');
session_start();
if($_SESSION['cliente_logado'] == true){
    $nome_cliente = $_SESSION['cliente_nome'];
    $login_cliente = $_SESSION['cliente_email'];

    //get doc na sessao
    $query_sess_get_doc = "SELECT clt_doc FROM cliente WHERE clt_email ='{$login_cliente}';";
    $res_sess_get_doc = mysqli_query($conn,$query_sess_get_doc);

    if ($res_sess_get_doc != null){
    $ret_sess_get_doc= mysqli_fetch_array($res_sess_get_doc,MYSQLI_ASSOC);
    $sess_doc = $ret_sess_get_doc['clt_doc'];

        //get placas num array na sessão
        if($sess_doc != null){
            $_SESSION['placas'] = array();    
            $query_sess_get_placas = "SELECT vei_placa FROM veiculo WHERE fk_clt_doc ='{$sess_doc}';";
            $res_sess_get_placas = mysqli_query($conn,$query_sess_get_placas);
    
            if($res_sess_get_placas != null){
                $cont_array_placas = 0; //não funciona sem contador pra definir o índice
                while ($ret_sess_get_placas = mysqli_fetch_array($res_sess_get_placas,MYSQLI_ASSOC)){
                    $_SESSION['placas'][$cont_array_placas] = $ret_sess_get_placas['vei_placa'];
                    $cont_array_placas++;
                }            
            }
        }
    }

    if(!empty($_SESSION['placas'])){
        $placa_0 = $_SESSION['placas'][0];
        
        if(!empty($_SESSION['placas'][1])){
        $placa_1 = $_SESSION['placas'][1];
        }
        if(!empty($_SESSION['placas'][2])){
        $placa_2 = $_SESSION['placas'][2];
        }
        if(!empty($_SESSION['placas'][3])){
        $placa_3 = $_SESSION['placas'][3];
        }
        if(!empty($_SESSION['placas'][4])){
        $placa_4 = $_SESSION['placas'][4];
        }
      }
      
    //guarda id do estac num cookie pra usar na hora de reservar
    if (isset($_COOKIE["id-do-estac"])){
        $cookie_id_estac = $_COOKIE["id-do-estac"];
    }
}

if(!isset($_SESSION['cliente_logado'])) {
    header('Location: /index.php');
    exit();
}
?>