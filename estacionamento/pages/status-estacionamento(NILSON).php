<!--
Páigina específica dos estacionamentos 

-->
<?php
include('conexao.php');
include('proc-sessao-gestor.php');

//query all -- nao é pra essa page; fica melhor no controle de vagas

/*
$qry_res_futuras = "SELECT estacionamento.estac_id, estacionamento.estac_nome, estacionamento.estac_endrc, estacionamento.estac_cep, estacionamento.estac_vg_carro - mov_vagas.mvg_ocp_carro AS disp_carro, estacionamento.estac_vg_carro - mov_vagas.mvg_ocp_moto AS disp_moto,
mov_vagas.mvg_ocp_carro, mov_vagas.mvg_ocp_moto, reserva.rsv_id, reserva.rsv_data, reserva.rsv_hora, reserva.rsv_chkin, reserva.rsv_chkout, reserva.fk_rsv_estac_id, reserva.rsv_chkin_dt, reserva.rsv_chkout_dt, reserva.fk_rsv_estac_id,
reserva.fk_rsv_vei_placa, reserva.fk_rsv_vei_placa_1, reserva.fk_rsv_vei_placa_2, reserva.fk_rsv_vei_placa_3, reserva.fk_rsv_vei_placa_4, veiculo.vei_tipo
FROM (((estacionamento
INNER JOIN mov_vagas ON mov_vagas.fk_mvg_estac_id = estacionamento.estac_id) 
INNER JOIN reserva ON reserva.fk_rsv_estac_id = estacionamento.estac_id)
INNER JOIN veiculo ON veiculo.vei_placa = reserva.fk_rsv_vei_placa)		   
WHERE estacionamento.estac_id ='{$cookie_id_estac}';";
*/

/*$qry_res_futuras = "SELECT e.estac_nome, e.estac_endrc, e.estac_cep, e.estac_vg_carro, e.estac_vg_moto, m.mvg_ocp_carro, m.mvg_ocp_moto, COUNT(r.fk_rsv_estac_id) AS num_reservas
FROM ((mov_vagas m INNER JOIN estacionamento e ON e.estac_id = m.mvg_id) 
      INNER JOIN reserva r ON e.estac_id = r.fk_rsv_estac_id)
WHERE e.estac_id = '{$cookie_id_estac} AND r.rsv_data = CURRENT_DATE;";
*/

$qry_res_futuras = "SELECT e.estac_nome, e.estac_endrc, e.estac_cep, e.estac_vg_carro, e.estac_vg_moto, m.mvg_ocp_carro, m.mvg_ocp_moto
FROM mov_vagas m INNER JOIN estacionamento e ON e.estac_id = m.fk_mvg_estac_id
WHERE e.estac_id = '{$cookie_id_estac}';";

$qry_reserva_carro = "SELECT COUNT(*) AS reservaCarro
FROM reserva r INNER JOIN veiculo v ON r.fk_rsv_vei_placa = v.vei_placa
WHERE r.fk_rsv_estac_id = 3 AND r.rsv_data = CURRENT_DATE AND  v.vei_tipo = 'Carro';";


$reserva_hoje_carro = mysqli_query($conn,$qry_reserva_carro);
while($reserva_hoje_carro = mysqli_fetch_array($reserva_hoje_carro, MYSQLI_BOTH)){
  $carro_hoje = $reserva_hoje_carro['reservaCarro'];
};  

$res_res_futuras = mysqli_query($conn,$qry_res_futuras);
while($ret_res_futuras = mysqli_fetch_array($res_res_futuras, MYSQLI_BOTH)){
  $estac_nome = $ret_res_futuras['estac_nome'];
  $estac_endrc = $ret_res_futuras['estac_endrc'];
  $estac_cep = $ret_res_futuras['estac_cep'];
  $estac_vg_carro = $ret_res_futuras['estac_vg_carro'];
  $estac_vg_moto = $ret_res_futuras['estac_vg_moto'];
  $estac_ocp_carro = $ret_res_futuras['mvg_ocp_carro'];
  $estac_ocp_moto = $ret_res_futuras['mvg_ocp_moto'];

//$estac = $ret_res_futuras['estac_id'];
//$estac_disp_carro = $ret_res_futuras['disp_carro'];
//$estac_disp_moto = $ret_res_futuras['disp_moto'];
//$estac_rsv_id = $ret_res_futuras['rsv_id'];
//$estac_rsv_data = $ret_res_futuras['rsv_data'];
//$estac_rsv_hora = $ret_res_futuras['rsv_hora'];
//$estac_rsv_chk_in = $ret_res_futuras['rsv_chkin'];
//$estac_rsv_chk_out = $ret_res_futuras['rsv_chkout'];
//$estac_id = $ret_res_futuras['fk_rsv_estac_id'];
//$estac_chk_in_dt = $ret_res_futuras['rsv_chkin_dt'];
//$estac_chk_out_dt = $ret_res_futuras['rsv_chkout_dt'];
// = $ret_res_futuras['fk_rsv_estac_id'];
//$rsv_vei_placa_0 = $ret_res_futuras['fk_rsv_vei_placa'];
//$rsv_vei_placa_1 = $ret_res_futuras['fk_rsv_vei_placa_1'];
//$rsv_vei_placa_2 = $ret_res_futuras['fk_rsv_vei_placa_2'];
//$rsv_vei_placa_3 = $ret_res_futuras['fk_rsv_vei_placa_3'];
//$rsv_vei_placa_4 = $ret_res_futuras['fk_rsv_vei_placa_4'];
//$rsv_vei_tipo = $ret_res_futuras['veiculo.vei_tipo']; //testar isso
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    ParkingBr - Dados Cadastrais do Gestor de Estacionamentos
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

<body class="user-profile">
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
            <a href="./dados-cadastrais.php">
              <i class="now-ui-icons users_single-02"></i>
              <p>Dados Cadastrais</p>
            </a>
          </li>
          <li>
            <a href="./estacionamentos.php">
              <i class="now-ui-icons shopping_shop"></i>
              <p>Estacionamentos</p>
            </a>
          </li>
          <li class="active">
            <a href="./controle-de-vagas.php">
              <i class="now-ui-icons business_chart-bar-32"></i>
              <p>Controle de Vagas</p>
            </a>
          </li>
          <li>
            <a href="./relatorios.php">
              <i class="now-ui-icons files_paper"></i>
              <p>Relatórios</p>
            </a>
          </li>          
          <li class="active-pro">
            <a href="./logout.php">
              <i class="now-ui-icons ui-1_simple-remove"></i>
              <p>Sair</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
    <!-- Navbar -->
       <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Controle de Vagas</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
        </div>
      </nav>
      <!-- end navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"><?php echo $estac_nome; ?></h4><!-- return do banco -->
                <p class="category"><?php echo($estac_endrc . ", " .  $estac_cep); ?></p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table"><!-- Alterar para informar que não há dados caso nenhuma reserva tenha sido feita antes --> 
                    <thead class=" text-primary">
                      <th>
                        Vagas (Carros)
                      </th>
                      <th>
                        Vagas (Motos)
                      </th>
                      <!--th>
                        Horário
                      </th>
                      th>
                        Vagas para motos // quantidade e tipo -->
                      <!-- /th -->
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <?php echo intval($estac_vg_carro-$estac_ocp_carro); ?> : Disponíveis 
                          <br> <?php echo intval($estac_ocp_carro); ?> : Ocupadas
                          <br> <?php echo intval($carro_hoje); ?> : Reservadas para Hoje
                        <td>
                         <?php echo intval($estac_vg_moto); ?> : Disponíveis
                          <br><?php echo intval($estac_ocp_moto); ?> : Ocupadas
                          <br>R: Reservadas para Hoje
                        </td>
                        <!-- td>
                          Sinaai-Waas
                        </td>
                        <td class="text-right">
                          $23,789
                        </td -->
                      </tr>

                    </tbody>
                  </table>

                  <table class="table"><!-- Alterar para informar que não há dados caso nenhuma reserva tenha sido feita antes -->
                  <h4 class="card-title"> Próximas Reservas</h4> 
                    <thead class=" text-primary">
                      <th>
                        Reserva (ID)
                      </th>
                      <th>
                        Cliente
                      </th>
                      <th>
                        Veículos <!-- quantidade e tipo -->
                      </th>
                      <th>
                        Horário
                      </th>
                      <!-- th>
                        Vagas para motos // quantidade e tipo -->
                      <!-- /th -->
                    </thead>
                    <tbody>
                    <?php while ($testedado = mysqli_fetch_array($resultado0)) {?> <!--  meu erro estava sendo usar $conn->fetch_array() sem parâmetro -->
                      
                      <tr>
                        <td> <!-- Total, ocupadas, reservadas-->
                          <?php echo $testedado['cep']; ?>
                        </td>
                        <td>
                          <?php echo $testedado['telefone']; ?>                        
                        </td>                        
                        <td> <!-- Total, ocupadas, reservadas-->
                          <?php echo $testedado['documento']; ?>
                        </td>
                        <td>
                          <?php echo $testedado['telefone']; ?>                         
                        </td>
                      </tr>
                      
                      <?php break;} ?>

                      <tr>
                        <td>
                          ID: x
                        </td>
                        <td>
                          Cliente: Minerva Hooper
                        </td>
                        <td>
                          x Carros / x Motos
                        </td>
                        <td>
                          Sinaai-Waas
                        </td>
                      </tr>

                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
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