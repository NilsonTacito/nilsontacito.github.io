<?php
    session_start();
    $_SESSION['usuario'] = $gambi;

    include("conexao.php");
    $campo_tipo = $_POST['tipo_veiculo'];
    $campo_placa = $_POST['placa_veiculo'];
    $campo_modelo = $_POST['modelo_veiculo'];
    $campo_fabricante = $_POST['fabricante_veiculo'];
    $campo_cor = $_POST['cor_veiculo'];
    $campo_ano = $_POST['ano_veiculo'];
    //várias pessoas podem add o mesmo veículo? isso seria uma RN
    //colocar seletor de carro e moto em adicionar-veiculo.php

    //quando o banco estiver finalizado, $gambi verificará a fk do cliente na tabela do veículo (esta veriável terá seu nome alterado) 
    $verifica_veiculo = "SELECT placa FROM veiculo WHERE placa = '{$campo_placa}' AND gambiarra = '{$gambi}'";
    $result_verifica = mysqli_query($conn, $verifica_veiculo);

    if ($result_verifica == $campo_placa){
        echo("Veículo já cadastrado!");
    }else {
        $insert_veiculo = "INSERT INTO veiculo (placa, tipoveiculo, modelo, fabricante, cor, ano) VALUES ('$campo_placa','$campo_tipo','$campo_modelo','$campo_fabricante ', '$campo_cor','$campo_ano')";
        $result_veiculo = mysqli_query($conn, $insert_veiculo);
        if ($result_veiculo != NULL){
            header('Location: /cliente/pages/editar-usuario.php');
            exit();
            }else {
                echo ("Erro durante o cadastro!");
            }
    }
?>