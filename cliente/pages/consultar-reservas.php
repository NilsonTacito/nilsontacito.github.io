<!--
Páigina de testes, para criação do front end de consulta de reservas

Esta tela será editada para demonstrar as reservas já efetuadas pelos usuários.
Poderá demonstrar as reservas passadas e as que estão próximas de sua data de utilização.
-->
<?php
include('conexao.php');
include('processa-consultar-cliente.php');
include('processa-sessao-cliente.php');
//include('processa-consultar-reserva.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    ParkingBr - Consultar Reservas
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <div class="simple-text logo-normal" style="padding-left: 14px;"><!-- 168x40 original -->
          <img src="/home/images/logox-wt.png" alt="" width="126" height="30"/>
        </div>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./consultar-cadastro.php">
              <i class="now-ui-icons users_single-02"></i>
              <p>Editar Perfil</p>
            </a>
          </li>
          <li>
            <a href="./mapa.php">
              <i class="now-ui-icons files_paper"></i>
              <p>Reservar Vagas</p>
            </a>
          </li>
          <li class="active">
            <a href="./consultar-reservas.php">
            <i class="now-ui-icons ui-1_calendar-60"></i>
              <p>Consultar Reservas</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="logout.php">
              <i class="now-ui-icons ui-1_simple-remove"></i>
              <p>Sair</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Próximas Reservas</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <?php
                  $query_futuras_rsv = "SELECT estacionamento.estac_id, estacionamento.estac_nome, estacionamento.estac_endrc, estacionamento.estac_cep, 
                  reserva.rsv_id, reserva.rsv_data, reserva.rsv_hora, reserva.rsv_chkin, reserva.fk_rsv_vei_placa, reserva.fk_rsv_vei_placa_1, reserva.fk_rsv_vei_placa_2, reserva.fk_rsv_vei_placa_3, reserva.fk_rsv_vei_placa_4, veiculo.vei_tipo
                  FROM ((reserva
                  INNER JOIN estacionamento ON reserva.fk_rsv_estac_id = estacionamento.estac_id)
                  INNER JOIN veiculo ON veiculo.vei_placa = reserva.fk_rsv_vei_placa)
                  WHERE reserva.fk_rsv_vei_placa ='{$placa_0}' AND reserva.rsv_chkin= 'Não Realizado'
                  OR reserva.fk_rsv_vei_placa = '{$placa_1}' AND reserva.rsv_chkin= 'Não Realizado' 
                  OR reserva.fk_rsv_vei_placa = '{$placa_2}' AND reserva.rsv_chkin= 'Não Realizado' 
                  OR reserva.fk_rsv_vei_placa = '{$placa_3}' AND reserva.rsv_chkin= 'Não Realizado' 
                  OR reserva.fk_rsv_vei_placa = '{$placa_4}' AND reserva.rsv_chkin= 'Não Realizado';";
                  
                  $res_futuras_rsv = mysqli_query($conn, $query_futuras_rsv);
                  //$query0 = "SELECT documento, telefone, cep, nome FROM cliente WHERE nome = '$busca'";
                  //$resultado0 = mysqli_query($conn, $query0);
                  ?>
                  <table class="table"><!-- Alterar para informar que não há dados caso nenhuma reserva tenha sido feita antes --> 
                    <thead class=" text-primary">
                      <th>
                        Estacionamento
                      </th>
                      <th>
                        Endereço
                      </th>
                      <th>
                        Vagas Reservadas <!-- quantidade e tipo -->
                      </th>
                      <th class="text-right">
                        Data <!-- e hora -->
                      </th>
                    </thead>
                    <tbody>
                    <?php
                    if(!empty($res_futuras_rsv)){
                    while ($fut_res_campo = mysqli_fetch_array($res_futuras_rsv,MYSQLI_BOTH)) { 
                    ?>
                      <tr>
                        <td id="futuras"><!--estac nome -->                        
                          <?php
                          //escrever "em andamento" com link, caso reserva esteja em andamento
                          $id_em_andamento = $fut_res_campo['rsv_id'];                          
                          $qry_em_andamento = "SELECT rsv_chkin, rsv_chkout WHERE reserva.rsv_id='{$id_em_andmaneto}';";
                          $res_em_andamento = mysqli_query($conn, $qry_em_andamento);

                          while($ret_em_andamento = mysqli_fetch_array($res_em_andamento,MYSQLI_ASSOC)){
                            $chk_in_em_andamento = $ret_em_andamento['rsv_chkin'];
                            $chk_out_em_andamento = $ret_em_andamento['rsv_chkout']; 
                          }
                          
                          if(($chk_in_em_andamento == "Realizado") AND ($chk_out_em_andamento == "Não Realizado")){
                            $_SESSION['id_rsv_futura'] = $id_em_andamento;
                            $andamento = "Em Andamento";
                            echo ('<a href="realizar-checkout.php">' . $andamento . '</a>');
                          }

                          if(($chk_in_em_andamento != "Realizado") AND ($chk_out_em_andamento != "Não Realizado")){
                          echo ('<a href="reserva-espec.php?estac_futura=' . $fut_res_campo['estac_id'] . '&placa_futura=' . $fut_res_campo['fk_rsv_vei_placa'] . '&id_rsv_futura=' . $fut_res_campo['rsv_id'] . '">' . $fut_res_campo['estac_nome'] . '</a>'); 
                          }                          
                          ?>
                    
                        </td>
                        <td><!--estac endr e cep -->
                          <?php echo ($fut_res_campo['estac_endrc'] . " - " . $fut_res_campo['estac_cep']); ?>
                        </td>
                        <td><!--estac quant e tipo vg reservada -->
                          <?php //echo $dadox2; ?>
                        </td>
                        <td class="text-right"><!--estac data e hora -->
                          <?php                       

                          echo ($fut_res_campo['rsv_data'] . " - " . $fut_res_campo['rsv_hora']); 
                          
                          ?>
                        </td>
                      </tr>
                      <?php } }?>
                      <!-- verificar o uso do break --> 
                      <!--
                      <tr>
                        <td>
                          Minerva Hooper
                        </td>
                        <td>
                          Curaçao
                        </td>
                        <td>
                          Sinaai-Waas
                        </td>
                        <td class="text-right">
                          $23,789
                        </td>
                      </tr>
                      -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header">
                <h4 class="card-title"> Histórico de Reservas</h4>
                <!--p class="category"> Here is a subtitle for this table</p -->
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <?php
                  /*
                  ainda não mexi aqui!!!! 20/06    



                  dados necessários: Estacionamento 	Vagas 	Período 	Custo 

                  SELECT estacionamento.estac_nome, reserva.rsv_id, reserva.rsv_chkin_dt, reserva.rsv_chkout_dt, reserva.rsv_preco       
                  FROM estacionamento, reserva WHERE reserva.fk_rsv_estac_id = estacionamento.estac_id AND reserva.rsv_chkin = reserva.rsv_chkout -- ambos "Realizado"
                  
                  se check-in e check-out = realizado, a reserva é passada... os outros valores seriam 
                  como chegar à quantidade de veículos na reserva?
                  
                  não sei preciso fazer uma página específica da reserva passada, isso parece atender.
                  talvez precise pra futura...

                  SELECT estacionamento.estac_nome, reserva.rsv_id, reserva.rsv_chkin_dt, reserva.rsv_chkout_dt, reserva.rsv_preco
                  FROM ((mov_vagas
                  INNER JOIN estacionamento ON mov_vagas.mvg_id = estacionamento.estac_id)
                  INNER JOIN reserva ON mov_vagas.mvg_id = reserva.rsv_id);
                  */
                  $query1 = "SELECT estacionamento.estac_id, estacionamento.estac_nome, estacionamento.estac_endrc, estacionamento.estac_cep, 
                  reserva.rsv_id, rsv_chkin_dt, rsv_chkout_dt, reserva.rsv_chkout, reserva.fk_rsv_vei_placa, reserva.fk_rsv_vei_placa_1, reserva.fk_rsv_vei_placa_2, reserva.fk_rsv_vei_placa_3, reserva.fk_rsv_vei_placa_4, reserva.rsv_preco, veiculo.vei_tipo
                  FROM ((reserva
                  INNER JOIN estacionamento ON reserva.fk_rsv_estac_id = estacionamento.estac_id)
                  INNER JOIN veiculo ON veiculo.vei_placa = reserva.fk_rsv_vei_placa)
                  WHERE reserva.fk_rsv_vei_placa ='{$placa_0}' AND reserva.rsv_chkin= 'Realizado'
                  OR reserva.fk_rsv_vei_placa = '{$placa_1}' AND reserva.rsv_chkin= 'Realizado' 
                  OR reserva.fk_rsv_vei_placa = '{$placa_2}' AND reserva.rsv_chkin= 'Realizado' 
                  OR reserva.fk_rsv_vei_placa = '{$placa_3}' AND reserva.rsv_chkin= 'Realizado' 
                  OR reserva.fk_rsv_vei_placa = '{$placa_4}' AND reserva.rsv_chkin= 'Realizado';";
                  $resultado1 = mysqli_query($conn, $query1);
                  ?>
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Estacionamento
                      </th>
                      <th>
                        Vagas
                      </th>
                      <th>
                        Período
                      </th>
                      <th class="text-right">
                        Custo
                      </th>
                    </thead>
                    <tbody><!-- próximas reservas tbm atende ao gestor, add disponíveis na view / histórico de reservas tbm-->
                    <?php while ($dado = mysqli_fetch_array($resultado1)) {?>
                      <tr>
                        <td>
                          <?php echo $dado['nome_estac_cons']; ?>
                        </td>
                        <td>
                          <?php echo $dado['id_vaga_cons']; ?>
                        </td>
                        <td>
                          <?php echo $dado['h_ent_cons']; ?>
                        </td>
                        <td class="text-right">
                          <?php echo $dado['check_in_cons']; ?>
                        </td>
                      </tr>
                      <?php break; } ;?> 
                      <!-- testar populando o banco -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>. Modified by <a style="color:#FF7F63" > Team ParkingBR</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>