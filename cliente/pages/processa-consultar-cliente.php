<?php
//no momento, a consulta está sendo feita na página 'consultar-cadastro.php'
//cliente: doc (cnpj/cpf), email, nome, sbnome, endereco, tel, cep 
//usar apenas como back-end de consultar-cadastro.php
include("conexao.php");
include("processa-sessao-cliente.php");
$query_cliente = "SELECT clt_doc, clt_email, clt_nome, clt_sbnome, clt_endrc, clt_tel, clt_cep FROM cliente WHERE clt_email = '{$login_cliente}';";
$res_cliente = mysqli_query($conn, $query_cliente);
if ($res_cliente != NULL){
    $array_cliente = $res_cliente->fetch_array(MYSQLI_ASSOC);
    $ret_doc_cliente = $array_cliente['clt_doc'];
    $ret_email_cliente = $array_cliente['clt_email'];
    $ret_nome_cliente = $array_cliente['clt_nome'];
    $ret_sbnome_cliente = $array_cliente['clt_sbnome'];
    $ret_endrc_cliente = $array_cliente['clt_endrc'];
    $ret_tel_cliente = $array_cliente['clt_tel'];
    $ret_cep_cliente = $array_cliente['clt_cep'];
}

//só usar while pro veículo pq pode haver mais 1 (ainda não foi testado)
//veículo: placa, tipo, modelo, fabricante, cor, ano
//a FK do 'cliente' em 'veiculo'é o 'documento'. logo, é preciso buscá-la ('gambiarra' é o campo no bd dos testes)
/*$get_id_cliente = "SELECT clt_doc FROM cliente WHERE clt_email = '{$login_cliente}';";
$res_id_cliente =  mysqli_query($conn, $get_id_cliente);
$ret_id_cliente = mysqli_fetch_array($res_id_cliente, MYSQLI_ASSOC);
$id_cliente= $ret_id_cliente['clt_doc'];*/
//$id_cliente = $res_id_cliente['clt_doc'];//get id 

/*$query_pk_cliente = "SELECT vei_placa FROM veiculo WHERE fk_clt_doc ='{$id_cliente}'; "; //$_SESSION['cliente_email']
$res_pk_cliente = mysqli_query($conn, $query_pk_cliente);
$ret_pk_cliente = mysqli_fetch_array($res_pk_cliente, MYSQLI_ASSOC); 
$pk_cliente_stored = $ret_pk_cliente['vei_placa']; //array de placas





if($pk_cliente_stored != NULL){
    $array_pk_cliente = $ret_pk_cliente->fetch_array(MYSQLI_ASSOC);
    $get_pk_cliente = $array_pk_cliente['documento'];
}else if($get_pk_cliente[0] == "") { //$ret_pk_cliente
    $get_pk_cliente = "Este cliente ainda não cadastrou veículos!";
}*/

?>