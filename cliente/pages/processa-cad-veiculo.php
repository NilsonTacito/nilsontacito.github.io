<?php
    include('conexao.php');
    include('processa-sessao-cliente.php');
    //incluir processa-consultar-cliente.php ?

    $campo_tipo = $_POST['tipo-veiculo'];
    $campo_placa = $_POST['placa_veiculo'];
    $campo_modelo = $_POST['modelo_veiculo'];
    $campo_fabricante = $_POST['fabricante_veiculo'];
    $campo_cor = $_POST['cor_veiculo'];
    $campo_ano = $_POST['ano_veiculo'];
    //várias pessoas podem add o mesmo veículo? isso seria uma RN
    //colocar seletor de carro e moto em adicionar-veiculo.php

    //retornar fk do cliente na tabela do veículo (clt_doc)
    //verificar se já há veículo com a mesma placa cadastrado no sistema
    $qry_quant_vei = "SELECT COUNT(*) vei_placa FROM veiculo WHERE fk_clt_doc='{$sess_doc}';";
    $res_quant_vei = mysqli_query($conn,$qry_quant_vei);
    $ret_quant_vei = mysqli_fetch_array($res_quant_vei, MYSQLI_ASSOC);
    $quant_vei = intval($ret_quant_vei['vei_placa']);
    if ($quant_vei > 5){
        $_SESSION['error-cad'] = "<a> Quantidade máxima de veículos cadastrados! </a>";
        header('Location: /cliente/pages/consultar-cadastro.php');
        exit();
    } 
    
    $query_placa = "SELECT vei_placa FROM veiculo WHERE vei_placa = '{$campo_placa}' AND fk_clt_doc = '{$sess_doc}';";
    $res_placa = mysqli_query($conn, $query_placa);
    $ret_placa = mysqli_fetch_array($res_placa, MYSQLI_ASSOC);

    if ($ret_placa == $campo_placa){
        $_SESSION['error-cad'] = "<a> Veículo já cadastrado! </a>";
        header('Location: /cliente/pages/consultar-cadastro.php');
    }else {
        $insert_veiculo = "INSERT INTO veiculo (vei_placa, vei_tipo, vei_modelo, vei_fabricante, vei_cor, vei_ano, fk_clt_doc) VALUES ('{$campo_placa}','{$campo_tipo}','{$campo_modelo}','{$campo_fabricante}','{$campo_cor}','{$campo_ano}','{$sess_doc}')";
        $result_veiculo = mysqli_query($conn, $insert_veiculo);
        if (!empty($result_veiculo)){
            header('Location: /cliente/pages/consultar-cadastro.php');
            exit();
            }else {
                header('Location: /cliente/pages/cadastrar-veiculo.php');
                exit();
            }
    }
?>