<!--
Página de consulta da reserva e criada para realização do check in/check out.

página final da reserva (hora de estacionar):

mostrar na tela:
rsv_data
rsv_chkin Não Realizado
fk_rsv_estac_id (retornar pra mostrar dados do estac)
fk_rsv_vei_placa (todos veiculos)

realizar check in = estacionar (informar abaixo)
realizar check out = sair e calcular e mostrar "final page" (botão ok pra pagar)

-->
<?php
include('conexao.php');
include('processa-sessao-cliente.php');

//redirecionar para página do check out se já tiver realizado check in
if(isset($_GET['id_rsv_futura'])){
  $chk_out_rsv_id = $_GET['id_rsv_futura'];

  $qry_chk_out_rsv_id = "SELECT rsv_chkin, rsv_chkout FROM reserva WHERE rsv_id= '{$chk_out_rsv_id}';";
  $res_chk_out_rsv_id = mysqli_query($conn, $qry_chk_out_rsv_id);
    
  while($ret_chk_out_rsv_id = mysqli_fetch_array($res_chk_out_rsv_id, MYSLI_ASSOC)){
    $chk_futura_chkin = $ret_chk_out_rsv_id['rsv_chkin'];
    $chk_futura_chkout = $ret_chk_out_rsv_id['rsv_out'];
  } 

  if(($chk_futura_chkin == 'Realizado') AND ($chk_futura_chkout == 'Não Realizado')){
    $_SESSION['id_rsv_futura'] = $chk_out_rsv_id;
    header('Location: realizar-checkout.php');
    exit();
  }
   
}

include('backend-checkin-reserva.php');
include('processa-checkin-reserva.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    ParkingBr - Cadastrar Estacionamento
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
            <a class="navbar-brand" href="#pablo">Consultar Reservas</a>
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
                <h5 class="title">Deseja realizar check-in no estacionamento, <?php echo $nome_cliente; ?>? </h5>
                <?php

                if(isset($_GET['estac_futura']) AND isset($_GET['placa_futura'])){
                  $estac_res_futura = $_GET['estac_futura'];
                  $placa_res_futura = $_GET['placa_futura'];                
                }

                $qry_page_get_rsv="SELECT estacionamento.estac_nome, estacionamento.estac_endrc, estacionamento.estac_cep, estacionamento.estac_expd_ini, estacionamento.estac_expd_fim,
                reserva.rsv_id, reserva.rsv_data, reserva.rsv_chkin, reserva.rsv_chkin, reserva.rsv_data, reserva.fk_rsv_vei_placa, reserva.fk_rsv_vei_placa_1, reserva.fk_rsv_vei_placa_2, reserva.fk_rsv_vei_placa_3, reserva.fk_rsv_vei_placa_4,
                vei_placa, vei_tipo, vei_modelo, vei_fabricante, vei_cor, vei_ano
                FROM ((reserva
                INNER JOIN estacionamento ON reserva.fk_rsv_estac_id = estacionamento.estac_id)
                INNER JOIN veiculo ON veiculo.vei_placa = reserva.fk_rsv_vei_placa) 
                WHERE reserva.fk_rsv_estac_id ='{$estac_res_futura}' AND reserva.fk_rsv_vei_placa ='{$placa_res_futura}';";
                $res_qry_page_get_rsv = mysqli_query($conn,$qry_page_get_rsv);                
                //$ret_qry_page_get_rsv = mysqli_fetch_array($res_qry_page_get_rsv, MYSQLI_BOTH);
                while ($ret_qry_page_get_rsv = mysqli_fetch_array($res_qry_page_get_rsv, MYSQLI_BOTH)) {
                ?>
              </div>
              <div class="card-body">
              <form method="POST" action="processa-checkin-reserva.php"><!-- alterar este form -->
                <div class="row">
                    <div class="col-md-8 pr-1">
                      <div class="form-group">
                        <label>Estacionamento </label>
                        <br><?php echo strval($ret_qry_page_get_rsv['estac_nome']); ?><br>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>CEP</label>
                        <br><?php echo strval($ret_qry_page_get_rsv['estac_cep']); ?><br>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Endereço</label>
                        <br><?php echo strval($ret_qry_page_get_rsv['estac_endrc']); ?> <br>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Data da Reserva</label>
                        <br><?php echo strval($ret_qry_page_get_rsv['rsv_data']);?>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group"><!-- ver input type -->
                        <label>Horário da reserva: </label>
                        <br><?php echo strval($ret_qry_page_get_rsv['rsv_hora']);?>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group"></div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group"><!-- estes dados estarão no banco "definitivo" -->
                        <label>Horário de abertura</label>
                        <br><?php echo strval($ret_qry_page_get_rsv['estac_expd_ini']);?>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Horário de encerramento</label>
                        <br><?php echo strval($ret_qry_page_get_rsv['estac_expd_fim']);?>
                      </div>
                    </div>
                  </div>
                <!-- daqui pra baixo, form: ...php -->
                <!-- form action="test.php" method="POST" -->
                  <div class="row">
                    <div class="col-md-12">
                      <br>Ao realizar o check-in, você estará informando que seus veículos foram estacionados na vaga e seu tempo de utilização da mesma será computado:
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
                        <label>Veículo <?php echo ("(" . $ret_qry_page_get_rsv['vei_tipo'] . ")");?> </label><!-- decidir se manda ou não aquela placa no insert -->
                        <br><?php echo ($ret_qry_page_get_rsv['vei_fabricante'] ." ". $ret_qry_page_get_rsv['vei_modelo']); ?>
                        <br><?php echo ("Placa: " . $ret_qry_page_get_rsv['vei_placa'] ."<br> Ano: " . $ret_qry_page_get_rsv['vei_ano']); ?>
                      </div>
                    </div>
                    <?php } ?>
                    <div class="col-md-4 pl-1">
                    <tr>
                        
                    </tr> 
                  </div>
                  <?php //$contador_novo++; } ?>
                  <br>
                  <div class="col-md-4 pl-1"><!-- tirado do Arma, melhorar -->
                    <button class="button button-block button-primary" type="submit">Realizar Check-In</button>
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
</html>