<!--
Páigina de testes, para criação do front end da página específica dos estacionamentos 

-->
<?php
include("proc-sessao-gestor.php");
//ainda não terminei de integrar com a página do mapa


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
              <i class="now-ui-icons location_map-big"></i>
              <p>Estacionamentos</p>
            </a>
          </li>
          <li class="active">
            <a href="./controle-de-vagas.php">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Controle de Vagas</p>
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
            <a class="navbar-brand" href="#pablo">Maps</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
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
            <a class="navbar-brand" href="#pablo">Estacionamentos</a>
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
                <h4 class="card-title"> Nome do estacionamento</h4><!-- return do banco -->
                <p class="category"> endereço?</p> <!-- aumentar fonte -->
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <?php
                  $query0 = "SELECT documento, telefone, cep, nome FROM cliente WHERE nome = '$busca'";
                  $resultado0 = mysqli_query($conn, $query0);
                  ?>
                  <table class="table"><!-- Alterar para informar que não há dados caso nenhuma reserva tenha sido feita antes --> 
                    <thead class=" text-primary">
                      <th>
                        Vagas para carros
                      </th>
                      <th>
                        Vagas para motos <!-- quantidade e tipo -->
                      </th>
                      <th>
                        Vagas para carros
                      </th>
                      <th>
                        Vagas para motos <!-- quantidade e tipo -->
                      </th>
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
                <h4 class="card-title">Próximas reservas</h4>
                <!--p class="category"> Here is a subtitle for this table</p -->
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <?php
                  $query1 = "SELECT nome_estac_cons, id_vaga_cons, h_ent_cons, check_in_cons FROM testcons";
                  $resultado1 = mysqli_query($conn, $query1);
                  ?>
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Estacionamento
                      </th>
                      <th>
                        Vagas para carros
                      </th>
                      <th>
                        Vagas para motos
                      </th>
                      <!--th class="text-right">
                        Custo
                      </th -->
                    </thead>
                    <tbody><!-- próximas reservas tbm atende ao gestor, add disponíveis na view / histórico de reservas tbm-->
                    <?php while ($dado = mysqli_fetch_array($resultado1)) {?>
                      <tr>
                        <td><!--mudar cor css -->
                          <a href ="estac-espec.php"><?php echo $dado['nome_estac_cons']; ?></a>
                        </td>
                        <td>
                          <?php echo $dado['id_vaga_cons']; ?>
                        </td>
                        <td>
                          <?php echo $dado['h_ent_cons']; ?>
                        </td>
                        <!--td class="text-right">
                          <!?php echo $dado['check_in_cons']; ?>
                        </td -->
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