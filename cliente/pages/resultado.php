<?php
require("conexao.php");

function parseToXML($htmlStr){
	$xmlStr=str_replace('<','&lt;',$htmlStr);
	$xmlStr=str_replace('>','&gt;',$xmlStr);
	$xmlStr=str_replace('"','&quot;',$xmlStr);
	$xmlStr=str_replace("'",'&#39;',$xmlStr);
	$xmlStr=str_replace("&",'&amp;',$xmlStr);
	return $xmlStr;
}

/*
Query consultando as tabelas corretas:

SELECT estacionamento.estac_id, estacionamento.estac_nome, estacionamento.estac_lat, estacionamento.estac_long, estacionamento.estac_endrc, estacionamento.estac_cep, mov_vagas.mvg_id, mov_vagas.mvg_ocp_carro, mov_vagas.mvg_ocp_moto FROM (
(mov_vagas INNER JOIN estacionamento ON mov_vagas.mvg_id = estacionamento.estac_id));

*/

// Select all the rows in the markers table
$result_markers = "SELECT * FROM markers";
$resultado_markers = mysqli_query($conn, $result_markers);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row_markers = mysqli_fetch_assoc($resultado_markers)){
  // Add to XML document node
  echo '<marker ';
  echo 'idestac="' . $row_markers['id'] . '" ';//add id estac
  echo 'name="' . parseToXML($row_markers['name']) . '" ';
  echo 'address="' . parseToXML($row_markers['address']) . '" ';
  echo 'lat="' . $row_markers['lat'] . '" ';
  echo 'lng="' . $row_markers['lng'] . '" ';
  echo 'type="' . $row_markers['type'] . '" ';
  echo 'vgCarro="' . $row_markers['vg_carro'] . '" ';
  echo 'vgMoto="' . $row_markers['vg_moto'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>