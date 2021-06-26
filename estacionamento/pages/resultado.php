<?php
require('conexao.php');
include('proc-sessao-gestor.php');

function parseToXML($htmlStr){
	$xmlStr=str_replace('<','&lt;',$htmlStr);
	$xmlStr=str_replace('>','&gt;',$xmlStr);
	$xmlStr=str_replace('"','&quot;',$xmlStr);
	$xmlStr=str_replace("'",'&#39;',$xmlStr);
	$xmlStr=str_replace("&",'&amp;',$xmlStr);
	return $xmlStr;
}

/*
retornar cnpj
$query_get_cnpj = SELECT gst_cnpj FROM gestor WHERE gst_email = '{$lg_gestor}';
$res_get_cnpj = mysqli_query($conn, $query_get_cnpj);
if ($res_get_cnpj != null){
  $ret_get_cnpj = mysqli_fetch_array($res_get_cnpj, MYSQLI_ASSOC);
  $cnpj = $ret_get_cnpj['gst_cnpj'];
}

esboço da query do xml
SELECT estacionamento.estac_id, estacionamento.estac_nome, estacionamento.estac_endrc, estacionamento.estac_lat, estacionamento.estac_long, estacionamento.estac_vg_carro, estacionamento.estac_vg_moto
mov_vagas.mvg_id, mov_vagas.mvg_ocp_carro 
mov_vagas.fk_mvg_estac_id = estacionamento.fk_gst_cnpj = $cnpj

*/
// Select all the rows in the markers table
$result_markers = "SELECT e.estac_id, e.estac_nome, e.estac_endrc, e.estac_lat, e.estac_long, e.estac_vg_carro - m.mvg_ocp_carro AS disp_carro, e.estac_vg_moto - m.mvg_ocp_moto AS disp_moto 
FROM estacionamento e INNER JOIN mov_vagas m ON e.estac_id = m.fk_mvg_estac_id
WHERE fk_gst_cnpj = '{$gst_sess_doc}';";

$resultado_markers = mysqli_query($conn, $result_markers);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row_markers = mysqli_fetch_array($resultado_markers,MYSQLI_BOTH)){
  // Add to XML document node
  echo '<marker ';
  echo 'idestac="' . $row_markers['estac_id'] . '" '; //add id estac
  echo 'name="' . parseToXML($row_markers['estac_nome']) . '" ';
  echo 'address="' . parseToXML($row_markers['estac_endrc']) . '" ';
  echo 'lat="' . $row_markers['estac_lat'] . '" ';
  echo 'lng="' . $row_markers['estac_long'] . '" ';
  echo 'vgCarro="' . $row_markers['disp_carro'] . '" ';
  echo 'vgMoto="' . $row_markers['disp_moto'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';



