<?php
//processamento do form de compra e/ou reserva de vagas (página reservar-vaga.php)

include('conexao.php');
include('processa-sessao-cliente.php');
include('reservar-vaga.php');

if(isset($array[$contador])){
    $quant = 0;
    if($contador > $contadorOutput){
        for ($cont0 = $contador; $cont0 <= 0; $cont0--){
            $array_x[$quant] = $array[$contadorOutput];
            //testes abaixo
            $x = strval($array[$contador]); 
            $y = strval($array[$contadorOutput]);
            echo ($x . " - " . $y);
            $quant++;
            //array de placas
            //através das placas, saber o tipo das vagas
        }
    }
}


/*reserva:
//a data será obtida através do formulário;
//a placa também, ou será obtida buscando no banco (usando o email que está na sessão);
//ou obter placa através do formulário, talvez... colocar em variável na página reservar-vaga.php e mandar na hora do submit


//reservar vaga
$query_res = "INSERT INTO reserva (rsv_data, fk_rsv_vei_placa, fk_mvg_estac_id) VALUES ('{$var_data}','{$var_placa}','{$cookie_id_estac}');
//os demais dados são default ou será informados posteriormente... reserva ok!

//obter quantidade de vagas atuais subtraindo vagas ocupadas (mov_vagas.mvg_ocp_carro) do total (estacionamento.estac_vg_carro)
SELECT estac_vg_carro FROM estacionamento WHERE estac_id ='{$cookie_id_estac}';
SELECT mvg_ocp_carro FROM mov_vagas WHERE mvg_id ='{$cookie_id_estac}';

//como realizar este cálculo no banco?

//isso aparentemente funciona (retorna dados null como número 0)
SELECT COALESCE(CASE WHEN ISNULL (mvg_ocp_carro) THEN 0 ELSE mvg_ocp_carro END) AS mvg_ocp_carro_null_0, COALESCE(CASE WHEN ISNULL (mvg_ocp_moto) THEN 0 ELSE mvg_ocp_moto END) AS mvg_ocp_moto_null_0 FROM mov_vagas WHERE fk_mvg_estac_id = '1';
//subtrair: estac_vg_carro - mvg_ocp_carro

//por fim, fazer update do valor da subtração na table mov_vagas (atualizar vagas ocupadas)
UPDATE mov_vagas SET mvg_ocp_carro ='valor_subtracao' WHERE fk_mvg_estac_id = '{$cookie_id_estac}';

//no fim, informar: reserva realizada com sucesso!



*/

?>