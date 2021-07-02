<!--
Páigina de testes, para criação do front end de consulta de reservas

Esta tela será editada para demonstrar as reservas já efetuadas pelos usuários.
Poderá demonstrar as reservas passadas e as que estão próximas de sua data de utilização.
-->
<?php
include('conexao.php');
include('processa-consultar-cliente.php');
include('processa-sessao-cliente.php');

//limpar error alert da reserva
if(isset($_SESSION['error_time_diff'])){
  unset($_SESSION['error_time_diff']);
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
                  $query_futuras_rsv = "SELECT e.estac_nome, e.estac_endrc, v.vei_modelo, cast(r.rsv_data AS DATE) AS reserva_data
                  FROM estacionamento e INNER JOIN reserva r ON e.estac_id = r.fk_rsv_estac_id 
                  INNER JOIN veiculo v ON v.vei_placa = r.fk_rsv_vei_placa
                  INNER JOIN cliente c ON c.clt_doc = v.fk_clt_doc
                  WHERE c.clt_email = '{$login_cliente}';";                  
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
                        Veiculo <!-- quantidade e tipo -->
                      </th>
                      <th>
                        Data <!-- e hora -->
                      </th>
                    </thead>
                    <tbody>

                    <?php
                        $res_futuras_rsv = mysqli_query($conn, $query_futuras_rsv);
                            if(!empty($res_futuras_rsv)){
                                while ($fut_res_campo = mysqli_fetch_array($res_futuras_rsv,MYSQLI_BOTH)) { 
                                    $reserva_data = $fut_res_campo['reserva_data'];
                                    if($reserva_data >= date('Y-m-d')){
                                        $estac_nome = $fut_res_campo['estac_nome'];
                                        $estac_endrc = $fut_res_campo['estac_endrc'];
                                        $vei_modelo = $fut_res_campo['vei_modelo'];

                                        echo("<tr>"); 
                                            echo("<td>");
                                                echo($estac_nome);
                                            echo("</td>");
                                            echo("<td>");
                                                echo($estac_endrc);
                                            echo("</td>");
                                            echo("<td>");
                                                echo($vei_modelo);
                                            echo("</td>");
                                            echo("<td>");
                                                echo($reserva_data);
                                            echo("</td>");
                                        echo("</tr>");
                        }}};
                      ?>      
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
                        $qry_hist_rsv = "SELECT e.estac_nome, r.rsv_preco, v.vei_modelo, DATE_FORMAT(rsv_chkin_dt, '%d/%m/%Y %h:%i') AS hr_entrada,
                        DATE_FORMAT(rsv_chkout_dt, '%d/%m/%Y %h:%i') AS hr_saida,
                        TIMEDIFF(r.rsv_chkin_dt, r.rsv_chkout_dt) AS res_periodo,
                        cast(r.rsv_data AS DATE) AS reserva_data                  
                        FROM reserva r INNER JOIN estacionamento e ON r.fk_rsv_estac_id = e.estac_id
                        INNER JOIN veiculo v ON v.vei_placa = r.fk_rsv_vei_placa
                        INNER JOIN cliente c ON c.clt_doc = v.fk_clt_doc
                        WHERE c.clt_email = '{$login_cliente}';";
                        $resultado1 = mysqli_query($conn,$qry_hist_rsv);
                    ?>

                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Estacionamento
                      </th>
                      <th>
                        Veiculo
                      </th>
                      <th>
                        Período
                      </th>
                      <th class="text-right">
                        Custo
                      </th>
                    </thead>
                    <tbody><!-- próximas reservas tbm atende ao gestor, add disponíveis na view / histórico de reservas tbm--> 
                        <?php while ($dado = mysqli_fetch_array($resultado1, MYSQLI_ASSOC)) {

                            if($dado['reserva_data'] <= date('Y-m-d')){

                            echo ("<tr>");
                                echo ("<td>");
                                    echo $dado['estac_nome'];
                                echo ("</td>");
                                echo ("<td>");
                                    echo ($dado['vei_modelo']);
                                echo("</td>");
                                echo("<td>");
                                    echo ($dado['hr_entrada'] . " - " . $dado['hr_saida'] . " (" . $dado['res_periodo'] . "h)");
                                echo("</td>");
                                echo("<td>");
                                    echo ($dado['rsv_preco'] . "$");
                                echo("</td>
                            </tr>");
                        }};
                        ?>
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