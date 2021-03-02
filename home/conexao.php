<?php
    $servidor = "192.168.1.30";
    $usuario = "sistema";
    $senha = "Test@1234";
    $dbname = "parkingbr";

    $conn = mysqli_connect($servidor,$usuario,$senha,$dbname);
    
    if(!$conn){
        die('Falha na conexao: ' . mysqli_connect_error());
    }
?>