<?php
/* Conexão com o banco de dados

criar previamente o usuário do sistema:
CREATE USER 'sistema'@'%' IDENTIFIED BY 'Test@1234';
GRANT ALL ON parkingbr.* TO 'sistema'@'%';
Obs: revisar posteriormente as permissões deste usuário */

$servidor="192.168.1.30";
$usuario="sistema";
$senha="Test@1234";
$database="parkingbr_2021";
$conn= mysqli_connect($servidor, $usuario, $senha, $database) or die ('Não foi possível conectar');
    
?>