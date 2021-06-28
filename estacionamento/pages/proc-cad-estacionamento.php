<?php
//processamento do cadstro de estacionamentos)
include('conexao.php');
include('proc-sessao-gestor.php');

$estac_nome = $_POST['estac-nome'];
$estac_telefone = $_POST['estac-telefone'];
$estac_cep = $_POST['estac-cep'];
$estac_endrc = $_POST['estac-endrc'];
$estac_ttl_carro = $_POST['estac-ttl-carro'];
$estac_ttl_moto = $_POST['estac-ttl-moto'];
$estac_expd_inicio = $_POST['estac-exp-inicio'];
$estac_expd_fim = $_POST['estac-exp-fim'];
$estac_hr_carro = $_POST['estac-hr-carro'];
$estac_dia_carro = $_POST['estac-dia-carro'];
$estac_hr_moto = $_POST['estac-hr-moto'];
$estac_dia_moto = $_POST['estac-dia-moto'];

//Regra de negócio, 70% das vagas no ParkingBr
$rn_carro = intval(($estac_ttl_carro / 100) * 70);
$rn_moto = intval(($estac_ttl_moto / 100) * 70);

$qry_insert_estac = "INSERT INTO estacionamento (estac_nome, estac_endrc, estac_cep, estac_vg_carro, estac_vg_moto, estac_expd_ini, estac_expd_fim, fk_gst_cnpj, estac_tel) 
VALUES ('{$estac_nome}', '{$estac_endrc}', '{$estac_cep}', '{$rn_carro}', '{$rn_moto}', '{$estac_expd_inicio}', '{$estac_expd_fim}', '{$gst_sess_doc}', '{$estac_telefone}');
INSERT INTO mov_vagas (mvg_dia_carro, mvg_dia_moto, mvg_hr_carro, mvg_hr_moto, fk_mvg_estac_id)
VALUES ('{$estac_dia_carro}', '{$estac_dia_moto}', '{$estac_hr_carro}', '{$estac_hr_moto}', LAST_INSERT_ID());
COMMIT;";
$res_insert_estac = mysqli_query($conn, $$qry_insert_estac);
if($res_insert_estac != null){
    header('Location: /estacionamento/pages/estacionamentos.php');
    exit();
}

?>