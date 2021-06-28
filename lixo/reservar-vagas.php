<!--
Página de cadastro do estacionamento, para a qual o usuário será direcionado após cadastrar-se como gestor na home/landing page
Obs: nossa documentação informa que estes cadastros informados acima devem ser aprovados pelo administrador isto ainda não foi implementado 
-->
<?php
include('conexao.php');
include('processa-sessao-cliente.php');
include('backend-reservar-vaga.php');

if(($_COOKIE['disp-carro'] != null) and ($_COOKIE['disp-moto'] != null)){
    $cookie_disp_carro = $_COOKIE['disp-carro'];
    $cookie_disp_moto = $_COOKIE['disp-moto'];
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
          <li class="active">
            <a href="./mapa.php">
              <i class="now-ui-icons files_paper"></i>
              <p>Reservar Vagas</p>
            </a>
          </li>
          <li>
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
            <a class="navbar-brand" href="#pablo">Reservar Vagas</a>
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
                <h5 class="title">Faça sua reserva <?php echo $nome_cliente; ?> </h5>
              </div>
              <div class="card-body">
              <form action="processa-reservar-vaga.php" method="POST">
                <div class="row">
                    <div class="col-md-8 pr-1">
                      <div class="form-group">
                        <label>Estacionamento </label>
                        <br><?php echo $ret_estac_nome; ?><br>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>CEP</label>
                        <br><?php echo $ret_estac_cep; ?><br>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Endereço</label>
                        <br><?php echo $ret_estac_endrc; ?> <br>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                      <?php
                      
                      //$query_disp_vagas = "SELECT COALESCE(CASE WHEN ISNULL (mvg_ocp_carro) THEN 0 ELSE mvg_ocp_carro END) AS mvg_ocp_carro_null_0, COALESCE(CASE WHEN ISNULL (mvg_ocp_moto) THEN 0 ELSE mvg_ocp_moto END) AS mvg_ocp_moto_null_0 FROM mov_vagas WHERE fk_mvg_estac_id = '{$cookie_id_estac}';";
                      /*$query_disp_vagas = "SELECT mvg_ocp_carro, mvg_ocp_moto FROM mov_vagas WHERE fk_mvg_estac_id = '{$cookie_id_estac}';";
                      $res_disp_vagas = mysqli_query($conn, $query_disp_vagas);
                      while ($ret_disp_vagas = mysqli_fetch_array($res_disp_vagas, MYSQLI_BOTH)){
                          $disp_carro = $ret_disp_vagas['mvg_ocp_carro'];
                          $disp_moto = $ret_disp_vagas['mvg_ocp_moto'];
                          break;
                      }*/    
                      ?>
                        <label>Vagas dispoíveis (carros)</label>
                        <br><?php echo $cookie_disp_carro; ?><br>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group"><!-- ver input type -->
                        <label>Vagas disponíveis (motos)</label>
                        <br><?php echo $cookie_disp_moto; ?><br>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group"></div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group"><!-- estes dados estarão no banco "definitivo" -->
                        <label>Horário de abertura</label>
                        <br><?php echo ($ret_estac_expd_ini . "h"); ?><br>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Horário de encerramento</label>
                        <br><?php echo ($ret_estac_expd_fim . "h"); ?><br>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Preço por hora (carros)</label>
                        <br><?php echo ($ret_mvg_hr_carro ."$"); ?>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Preço por hora (motos)</label>
                        <?php echo ($ret_mvg_hr_moto ."$"); ?>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label></label>
                    </div>
                  </div>
                <div class="row">
                <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Diária (carros)</label>
                        <br><?php echo ($ret_mvg_dia_carro ."$"); ?><br>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Diária (motos)</label>
                        <br><?php echo ($ret_mvg_dia_moto ."$"); ?><br>
                      </div>
                    </div>  
                </div>
                <?php// } ?>
                <br><!-- daqui pra baixo, form: processa-reservar-vaga.php -->
                <!-- form action="test.php" method="POST" -->
                  <div class="row">
                    <div class="col-md-12">
                      <br>Preencha os campos abaixo de acordo com o exmeplo:
                    </div>

                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <br>
                        <label>Data</label>
                        <input type="text" class="form-control" placeholder="Ex: 13/05/2021" name="inp-data">
                      </div>
                    </div>
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <br>
                        <label for="exampleInputEmail1">Hora</label>
                        <input type="text" class="form-control" placeholder="19:30" name="inp-hora">
                      </div>
                    </div>                 
                    <!-- query dos veículos -->
                    <?php
                    //get clt_doc
                    $query_veiculos = "SELECT vei_placa, vei_tipo, vei_modelo, vei_fabricante, vei_cor, vei_ano  FROM veiculo WHERE fk_clt_doc = '{$sess_doc}';";
                    $res_veiculos = mysqli_query($conn, $query_veiculos);
                    //$_SESSION['placas'] = array();
                    
                    //abaixo, gerar o dado a ser enviado quando a checkbox for marcada
                    $tagname = "check-veiculo";
                    $contador_novo =0;
                    while ($dados_veiculos = mysqli_fetch_array($res_veiculos, MYSQLI_ASSOC)) {
                    ?>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label></label>
                    </div>
                  </div>              
                  <div class="row">
                    <div class="col-md-8 pr-1">
                      <div class="form-group"><!-- botar este form por aqui, precisará da checkbox funcionando (processa-reservar-vaga.php)-->
                        <label>Veículo <?php echo ("(" . $dados_veiculos['vei_tipo'] . ")");?> </label><!-- decidir se manda ou não aquela placa no insert -->
                        <br><?php echo ($dados_veiculos['vei_fabricante'] ." ". $dados_veiculos['vei_modelo']); ?>
                        <br><?php echo ("Placa: " . $dados_veiculos['vei_placa'] ."<br> Ano: " . $dados_veiculos['vei_ano']); 
                             if(isset($dados_veiculos['vei_placa'])){                                 
                                 array_push($_SESSION['placas'], $dados_veiculos['vei_placa']);
                              
                             } 
                        ?>
                      </div>
                    </div>
                    <?php //echo("<a>". $array[$contadorOutput] . " - " . $array[$contador] . "</a>"); ?>
                    <div class="col-md-4 pl-1">
                    <tr>
                        <td>
                          <div class="form-check pl-1">
                            <label class="form-check-label">Reservar vaga para este veículo<br>Taxa de reserva: <?php echo($ret_mvg_tx_reserva . "$"); ?>                            
                              <input class="form-check-input" type="checkbox" name="<?php echo ($tagname . strval($contador_novo));?>" value="<?php echo $dados_veiculos['vei_placa'];?>"><!-- preciso saber se isso (essa placa) é carro ou moto e somar com outras placas -->
                              <span class="form-check-sign"></span>
                            </label>
                          </div>
                        </td>
                      </tr> 
                  </div>
                  <?php $contador_novo++; } ?>
                  <br>
                  <div class="col-md-4 pl-1"><!-- tirado do Arma, melhorar -->
                    <button class="button button-block button-primary" type="submit">Reservar Vagas</button>
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