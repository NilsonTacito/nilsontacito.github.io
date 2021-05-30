<?php
//processamento do form de compra e/ou reserva de vagas (página reservar-vaga.php)
include('conexao.php');
include('processa-sessao-cliente.php');
/*reserva:
get data by form;
get placa (by email);//get placa no form, se possível... ou pega e põe numa var //fazer isso em reservar-vaga.php
$query_res = "INSERT INTO reserva (rsv_data, fk_rsv_vei_placa, fk_mvg_estac_id) VALUES ('{$var_data}','{$var_placa}','{$cookie_id_estac}');
//acima, insert ok (reserva feita!)


//retorna valores das tables, subtrair do total a quantidade de ocupadas
SELECT estac_vg_carro FROM estacionamento WHERE estac_id ='{$cookie_id_estac}';
SELECT mvg_ocp_carro FROM mov_vagas WHERE mvg_id ='{$cookie_id_estac}';

//fazer update do valor da subtração na table mov_vagas (atualizar vagas ocupadas)
UPDATE mov_vagas SET mvg_ocp_carro ='valor_subtracao' WHERE fk_mvg_estac_id = '{$cookie_id_estac}';

null como zero
SELECT COALESCE(CASE WHEN ISNULL mvg_ocp_carro) THEN 0 ELSE mvg_ocp_carro END) AS ttl_carro, COALESCE(CASE WHEN ISNULL (mvg_ocp__moto) THEN 0 ELSE mvg_ocp_moto END) AS ttl_moto FROM mov_vagas WHERE estac_id = '1';
SELECT COALESCE(CASE WHEN ISNULL (estac_vg_moto) THEN 0 ELSE estac_vg_moto END) AS ttl_moto FROM estacionamento WHERE estac_id = '1'

isso funciona
SELECT COALESCE(CASE WHEN ISNULL (mvg_ocp_carro) THEN 0 ELSE mvg_ocp_carro END) AS ttl_carro, COALESCE(CASE WHEN ISNULL (mvg_ocp_moto) THEN 0 ELSE mvg_ocp_moto END) AS ttl_moto FROM mov_vagas WHERE fk_mvg_estac_id = '1';


*/

?>