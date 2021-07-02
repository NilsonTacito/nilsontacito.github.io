<!--
Página de consulta da reserva e criada para realização do check out.

-->
<?php
include('conexao.php');
include('processa-sessao-cliente.php');
//$_SESSION['chkout_pg_id']id reserva vindo da page do check in

if(isset($_SESSION['chkout_pg_id'])){
  $id_rsv_rlz_chkout = $_SESSION['chkout_pg_id'];
}

if(isset($_GET['id_chkout'])){
  $chkout_estac_res_futura = $_GET['id_chkout'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    ParkingBr - Realizar Check-Out
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
          <li  class="active">
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
            <a class="navbar-brand" href="#pablo">Realizar Check-out</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">

        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Deseja realizar check-out no estacionamento, <?php echo $nome_cliente; ?>? </h5>
                <?php //TIME_FORMAT(reserva.rsv_chkin_dt, '%h:%i') -- botar condição pro checkou 
                $qry_rsv_rlz_chkout="SELECT estacionamento.estac_nome, estacionamento.estac_endrc, estacionamento.estac_cep, TIME_FORMAT(estacionamento.estac_expd_ini, '%h:%i') AS estac_expd_ini, TIME_FORMAT(estacionamento.estac_expd_fim, '%h:%i') AS estac_expd_fim, 
                reserva.rsv_id, reserva.rsv_data, reserva.rsv_chkin, TIME_FORMAT(reserva.rsv_chkin_dt, '%h:%i') AS chkin_dt, TIME_FORMAT(reserva.rsv_data, '%h:%i') AS rsv_hora, reserva.fk_rsv_vei_placa,
                veiculo.vei_tipo, vei_modelo, vei_fabricante, vei_ano
                FROM ((reserva
                INNER JOIN estacionamento ON reserva.fk_rsv_estac_id = estacionamento.estac_id)
                INNER JOIN veiculo ON veiculo.vei_placa = reserva.fk_rsv_vei_placa) WHERE reserva.rsv_id ='{$chkout_estac_res_futura}';";//$id_rsv_rlz_chkout , coloquei "1" pra testar
                $res_rsv_rlz_chkout = mysqli_query($conn,$qry_rsv_rlz_chkout);                
                //$ret_qry_page_get_rsv = mysqli_fetch_array($res_qry_page_get_rsv, MYSQLI_BOTH);
                while ($ret_rsv_rlz_chkout= mysqli_fetch_array($res_rsv_rlz_chkout, MYSQLI_BOTH)) {
                 $_SESSION['proc_chkout'] = $ret_rsv_rlz_chkout['rsv_id'];
                ?>
              </div>
              <div class="card-body">
              <form method="POST" action="processa-checkout-reserva.php"><!-- alterar este form -->
                <div class="row">
                    <div class="col-md-8 pr-1">
                      <div class="form-group">
                        <label>Estacionamento </label>
                        <br><?php echo strval($ret_rsv_rlz_chkout['estac_nome']); ?><br>
                      </div>
                    </div>
                    <div class="col-md-2 pl-1">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Endereço</label>
                        <br><?php echo ($ret_rsv_rlz_chkout['estac_endrc'] . ", CEP: " . $ret_rsv_rlz_chkout['estac_cep']); ?> <br>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Data da Reserva</label>
                        <br><?php echo strval($ret_rsv_rlz_chkout['rsv_data']);?>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group"><!-- ver input type -->
                        <label>Horário do check-in: </label>
                        <br><?php echo strval($ret_rsv_rlz_chkout['chkin_dt']);?>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group"></div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group"><!-- estes dados estarão no banco "definitivo" -->
                        <label>Horário de abertura</label>
                        <br><?php echo strval($ret_rsv_rlz_chkout['estac_expd_ini']);?>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Horário de encerramento</label>
                        <br><?php echo strval($ret_rsv_rlz_chkout['estac_expd_fim']);?>
                      </div>
                    </div>
                  </div>
                <!-- daqui pra baixo, form: ...php -->
                <!-- form action="test.php" method="POST" -->
                  <div class="row">
                    <div class="col-md-12">
                      <br>Ao realizar o check-out, você estará encerrando seu período de utilização da vaga para realização do processo de pagamento.
                    </div>               
                    <!-- query dos veículos -->
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                    <?php //var_dump($estac_res_futura . " - " . $placa_res_futura . " - " . $ret_qry_page_get_rsv['vei_tipo'] . " - " . $ret_qry_page_get_rsv['estac_expd_fim']); ?>
                      <label></label>
                    </div>
                  </div>              
                  <div class="row">
                    <div class="col-md-8 pr-1">
                      <div class="form-group"><!-- botar este form por aqui, precisará da checkbox funcionando (processa-reservar-vaga.php)  - vei_placa, vei_tipo, vei_modelo, vei_fabricante, vei_cor, vei_ano -->
                        <label>Veículo <?php echo ("(" . $ret_rsv_rlz_chkout['vei_tipo'] . ")");?> </label><!-- decidir se manda ou não aquela placa no insert -->
                        <br><?php echo ($ret_rsv_rlz_chkout['vei_fabricante'] . " " . $ret_rsv_rlz_chkout['vei_modelo']); ?>
                        <br><?php echo ("Placa: " . $ret_rsv_rlz_chkout['fk_rsv_vei_placa'] . "<br> Ano: " . $ret_rsv_rlz_chkout['vei_ano']);
                        }
                        ?>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                    <tr>
                        
                    </tr> 
                  </div>
                  <?php //$contador_novo++; } ?>
                  <br>
                  <div class="col-md-4 pl-1"><!-- tirado do Arma, melhorar -->
                    <button class="button button-block button-primary" type="submit">Realizar Check-Out</button>
                    <?php //echo("<a> ac: " . $array[$contador] . " - aco: " . $array[$contadorOutput] . " </a>"); ?>
                  </div> 
                </form>
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
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.  Modified by <a style="color:#FF7F63" > Team ParkingBR</a>.
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