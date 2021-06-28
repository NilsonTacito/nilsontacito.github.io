<?php
include('processa-sessao-cliente.php');
if(isset($_SESSION['placas'])){
    $placa_0 = $_SESSION['placas'][0];
    $placa_1 = $_SESSION['placas'][1];
    $placa_2 = $_SESSION['placas'][2];
    $placa_3 = $_SESSION['placas'][3];
    $placa_4 = $_SESSION['placas'][4];
}
echo $placa_1;
echo $sess_doc;

?>