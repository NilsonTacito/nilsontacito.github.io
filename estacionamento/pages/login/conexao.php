<?php
$servidor="192.168.1.30";
$usuario="sistema";
$senha="Test@1234";
$database="parkingbr";
$conn= mysqli_connect($servidor, $usuario, $senha, $database) or die ('Não foi possível conectar');
?>