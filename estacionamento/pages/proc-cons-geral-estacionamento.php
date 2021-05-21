<?php
/*
Script de consulta dos dados do estacionamento feito para processar a página controle-de-vagas.php
*/
include('conexao.php');
include("proc-sessao-gestor.php");
/*
$nm_gestor = $_SESSION['gestor_nome'];
$lg_gestor = $_SESSION['gestor_email'];
*/
//buscar cnpj/pk gestor para realização das demais consultas
$query_pk_gestor = "SELECT cnpj FROM gestor WHERE email = '{$lg_gestor}'";
$ret_pk_gestor = mysqli_query($conn, $query_pk_gestor);
$res_pk_gestor = $ret_pk_gestor->fetch_array(MYSQLI_ASSOC);
$pk_gestor = $res_pk_gestor['cnpj'];

//contar estacionamentoss
$query_count_estac = "SELECT COUNT(*) AS quant FROM mvg_test WHERE dono_mvg ='{$pk_gestor}'";//se não utilizar "AS" não funciona
$ret_count_estac = mysqli_query($conn,$query_count_estac);
$res_count_estac = mysqli_fetch_assoc($ret_count_estac); //fetch associative array
$prs_count_estac = $res_count_estac['quant'];

?>