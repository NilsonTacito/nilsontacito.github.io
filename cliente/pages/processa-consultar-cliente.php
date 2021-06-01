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


?>