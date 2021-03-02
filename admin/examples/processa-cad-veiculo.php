<?php

//pra onde o form mandou
    //session_start();
    include("conexao.php");
    $campo_tipo = $_POST['tipo_veiculo']; //cadê o sobrenome? kkk //tipo_veiculo name da var html
    $campo_placa = $_POST['placa_veiculo'];//placa_veiculo
    $campo_modelo = $_POST['modelo_veiculo'];//modelo_veiculo
    $campo_fabricante = $_POST['fabricante_veiculo'];//fabricante_veiculo
    $campo_cor = $_POST['cor_veiculo'];//cor_veiculo
    $campo_ano = $_POST['ano_veiculo'];//ano_veiculo
    
    //aqui rola o insert
    $result_veiculo = "INSERT INTO veiculo (tipoveiculo, placa, modelo, fabricante, cor, ano) VALUES ('$campo_tipo','$campo_placa','$campo_modelo','$campo_fabricante ', '$campo_cor','$campo_ano')";
    $resultado_veiculo = mysqli_query($conn, $result_veiculo);
    //checar erro no insert
    
    //preciso disso fazendo um select no banco!!!  
    
    //aqui rola o select pros dados recém inputados
    /*$query = "SELECT nome FROM cliente WHERE email = '{$email_usuario}' AND senha = '{$senha_usuario}'";
    
    $result = mysqli_query($conn, $query);
    
    $row = mysqli_num_rows($result);
    

    if($row == 1) {
        $_SESSION['usuario'] = $nome_usuario;
        header('Location: /tcc/crud/form-create.php');
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: index.php');
        exit();
        }*/

        header('Location: /dash/examples/vanilla.php');//mandando pra tela do cad veículo
        exit();
?>