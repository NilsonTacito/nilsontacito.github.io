<!--
Página de check-out/encerramento da reserva (o submit levaria ao pagseguro)

testar com timestamp

-->
<?php
include('conexao.php');
include('processa-sessao-cliente.php');

if(isset($_SESSION['id_pagamento'])){
  $id_rsv_pagto = $_SESSION['id_pagamento'];
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
    ParkingBr - Realizar Pagamento
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
            <a class="navbar-brand" href="#pablo">Realizar Pagamento</a>
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
            <div class="card card-upgrade">
              <div class="card-header text-left">
              <?php
                $qry_rsv_pagto="SELECT estacionamento.estac_nome, 
                reserva.rsv_id, reserva.rsv_data, reserva.rsv_chkin_dt, reserva.rsv_chkout_dt, reserva.fk_rsv_vei_placa, reserva.rsv_taxa, TIMESTAMPDIFF(MINUTE, reserva.rsv_chkin_dt, reserva.rsv_chkout_dt) AS rsv_periodo_min, TIMESTAMPDIFF(HOUR, reserva.rsv_chkin_dt, reserva.rsv_chkout_dt) AS rsv_periodo_hora,
                mov_vagas.mvg_id, mov_vagas.mvg_dia_carro, mov_vagas.mvg_dia_moto, mov_vagas.mvg_hr_carro, mov_vagas.mvg_hr_moto, mov_vagas.mvg_tx_reserva, mov_vagas.mvg_tx_servico,
                veiculo.vei_tipo, veiculo.vei_modelo, veiculo.vei_fabricante
                FROM (
                ((reserva INNER JOIN estacionamento ON reserva.fk_rsv_estac_id = estacionamento.estac_id)
                INNER JOIN mov_vagas ON reserva.fk_rsv_estac_id = mov_vagas.fk_mvg_estac_id)
                INNER JOIN veiculo ON veiculo.vei_placa = reserva.fk_rsv_vei_placa) WHERE reserva.rsv_id ='{$id_rsv_pagto}';";//$id_rsv_pagto , coloquei "1" pra testar
                $res_rsv_pagto = mysqli_query($conn,$qry_rsv_pagto);                
                //$ret_qry_page_get_rsv = mysqli_fetch_array($res_qry_page_get_rsv, MYSQLI_BOTH);
                while ($ret_rsv_pagto= mysqli_fetch_array($res_rsv_pagto, MYSQLI_BOTH)){
                ?>
                <h5 class="card-title">Reserva (ID: <?php echo $ret_rsv_pagto['rsv_id']; ?>)</h5>
                  <a class="text-left">Estacionamento: <?php echo $ret_rsv_pagto['estac_nome']; ?></a>
                  <br><a class="text-left"><?php echo("Data da Reserva: " . $ret_rsv_pagto['rsv_data']); ?></a>
                  <!--placas -->
                  <br><a class="text-left"><?php echo("Veículo(s): " . $ret_rsv_pagto['fk_rsv_vei_placa']);                                    
                  ?></a>
                  <!-- p class="card-category">Are you looking for more components? Please check our Premium Version of Now UI Dashboard PRO.</p -->
              </div>
              <form action="processa-pagto-tx-reserva.php" method="POST">
              <div class="card-body">
                <div class="table-responsive table-upgrade">
                  <table class="table">
                    <thead>
                      <th></th>
                      <th class="text-right"></th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Veículo</td>
                        <td class="text-right"><?php echo($ret_rsv_pagto['vei_tipo'] . ": " . $ret_rsv_pagto['vei_fabricante'] . " " . $ret_rsv_pagto['vei_modelo'] . " (" . $ret_rsv_pagto['fk_rsv_vei_placa'] . ")"); ?></td>
                      </tr>
                      <tr>
                      <tr>
                        <td>Taxa de Reserva</td>
                        <td class="text-right"><?php echo($ret_rsv_pagto['rsv_taxa'] . "$");?></td>
                        <!-- td class="text-center"><i class="now-ui-icons ui-1_simple-remove text-danger"></i></td>
                        <td class="text-center"><i class="now-ui-icons ui-1_check text-success"></i></td -->
                      </tr>
                      <tr>
                        <td>Total A Pagar</td>
                          <td class="text-right"><?php echo($ret_rsv_pagto['rsv_taxa'] . "$");
                          $_SESSION['preco_tx_reserva'] = $ret_rsv_pagto['rsv_taxa']; } ?></td>                        
                          </td>
                        <!-- td class="text-center"><i class="now-ui-icons ui-1_simple-remove text-danger"></i></td>
                        <td class="text-center"><i class="now-ui-icons ui-1_check text-success"></i></td -->
                      </tr>
                      <tr>
                        <td></td>
                        <!-- td class="text-center">Free</td -->
                        <td class="text-right"> <button  type="submit" class="text-right btn btn-round btn-primary">Realizar Pagamento</button> </td>
                      </tr>                      
                    </tbody>
                  </table>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
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