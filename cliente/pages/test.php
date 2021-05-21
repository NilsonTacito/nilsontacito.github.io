<?php
include("conexao2.php");
include("processa-sessao.cliente.php");
$query0="SELECT mvg_ocp_carro, mvg_ocp_moto FROM mov_vagas WHERE mvg_id='1';";
$res0 = mysqli_query($conn,$query0);

$ret0 = $res0->fetch_array(MYSQLI_NUM);
$val0 = intval($ret0['mvg_ocp_carro']);
$val1 = intval($ret0['mvg_ocp_moto']);

$blabla0 = ($val0 + 0);
$blabla1 = ($val1 + 0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>
    </title>
</head>
<body>
    test.php
<p><?php
//echo $val0;
echo $val1;
//echo ("blabla0 = " . $blabla0);
//echo ("blabla1 = " . $blabla1);
//var_dump($res0);
?>
</p>

</body>
</html>