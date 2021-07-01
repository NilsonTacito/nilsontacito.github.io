<?php
include('conexao.php');
include('processa-sessao-cliente.php');

if(isset($_SESSION['placa_alterar'])){
    $placa_alterar = $_SESSION['placa_alterar']; 
}

$alt_tipo = $_POST['tipo_veiculo'];
$alt_modelo = $_POST['modelo_veiculo'];
$alt_fabricante = $_POST['fabricante_veiculo'];
$alt_cor = $_POST['cor_veiculo'];
$alt_ano = $_POST['ano_veiculo'];

$qry_alt_veiculo = "UPDATE veiculo SET vei_tipo='{$alt_tipo}', vei_modelo='{$alt_modelo}', vei_fabricante='{$alt_fabricante}', vei_cor='{$alt_cor}', vei_ano='{$alt_ano}' WHERE vei_placa='{$placa_alterar}' ;";
$res_alt_veiculo = mysqli_query($conn, $qry_alt_veiculo);
if($res_alt_veiculo != null){
    header('Location: consultar-cadastro.php');
    exit();
}
























?>