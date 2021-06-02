<?php
    include('conexao.php');
    include('processa-sessao-cliente.php');
    //incluir processa-consultar-cliente.php ?

    $campo_tipo = $_POST['tipo_veiculo'];
    $campo_placa = $_POST['placa_veiculo'];
    $campo_modelo = $_POST['modelo_veiculo'];
    $campo_fabricante = $_POST['fabricante_veiculo'];
    $campo_cor = $_POST['cor_veiculo'];
    $campo_ano = $_POST['ano_veiculo'];
    //várias pessoas podem add o mesmo veículo? isso seria uma RN
    //colocar seletor de carro e moto em adicionar-veiculo.php

    //retornar fk do cliente na tabela do veículo (clt_doc)
    $query_doc= "SELECT clt_doc FROM cliente WHERE  clt_email = '{$login_cliente}';";
    $res_query_doc = mysqli_query($conn, $query_doc);
    $ret_doc = mysqli_fetch_array($res_query_doc,MYSQLI_ASSOC);

    //verificar se já há veículo com a mesma placa cadastrado no sistema
    $query_placa = "SELECT vei_placa FROM veiculo WHERE vei_placa = '{$campo_placa}' AND fk_clt_doc = '{$ret_doc}';";
    $res_placa = mysqli_query($conn, $query_placa);
    $ret_placa = mysqli_fetch_array($res_placa, MYSQLI_ASSOC);

    if ($ret_placa == $campo_placa){
        echo("<a> Veículo já cadastrado! </a>");
        header('Location: /cliente/pages/consultar-cadastro.php');
    }else {
        $insert_veiculo = "INSERT INTO veiculo (vei_placa, vei_tipo, vei_modelo, vei_fabricante, vei_cor, vei_ano, fk_clt_doc) VALUES ('{$campo_placa}','{$campo_tipo}','{$campo_modelo}','{$campo_fabricante}','{$campo_cor}','{$campo_ano}','{$ret_doc}')";
        $result_veiculo = mysqli_query($conn, $insert_veiculo);
        if ($result_veiculo != NULL){
            echo "<a> Veículo Cadastrado com sucesso! </a>";
            header('Location: /cliente/pages/mapa.php');
            exit();
            }else {
                echo ("<a> Erro durante o cadastro! </a>");
            }
    }
?>