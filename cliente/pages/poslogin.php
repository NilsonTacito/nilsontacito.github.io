<!--
Página para a qual o usuário é redirecionado após o cadastro no "Arma".
-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    ParkingBr - Cadastre Seu Veículo
    <?php
    //início da sessão
    session_start();
    ?>
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
<!-- ele criou uma classe css pro body? foi isso-->
<body class="user-profile">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
      <!-- Adicionar o e retirar o link -->
        <a class="simple-text logo-normal">
          ParkingBr
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav"><!-- nav do menu lateral -->
          <li>
            <a>
              <i class="now-ui-icons education_atom"></i>
              <p>Editar Perfil</p>
            </a>
          </li>
          <li class="active ">
            <a>
              <i class="now-ui-icons users_single-02"></i>
              <p>Cadastrar Veículo</p>
            </a>
          </li>
          <li><!-- Reservar Vagas! -->
            <a>
              <i class="now-ui-icons location_map-big"></i>
              <p>Reservar Vagas</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="./upgrade.html"><!-- adicionar código do logout --> 
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Logout</p>
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
            <a class="navbar-brand" href="#pablo">Cadastro De Veículos</a>
          </div>          
        </div>
      </nav>
      <!-- End Navbar --><!--aqui começa a parte das consultas pra mostrar os dados ou cadastrar o veículo -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Cadastre Seu Veículo, <?php echo($_SESSION['usuario']);?></h5>
              </div><!--Placa, Tipo, Modelo, Fabricante, Cor, Ano  -->
              <div class="card-body">
                <form method="POST" action="processa-cad-veiculo.php"><!-- adicionar form action pra enviar o cadastro do veículo-->
                  <!--Abaixo, o campo do tipo do veículo -->
                  <div class="row"><!--tem que fazer o botão de submit lá embaixo -->
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Tipo</label>
                        <input name="tipo_veiculo" type="text" class="form-control" placeholder="carro ou moto" >
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Placa</label>
                        <input name="placa_veiculo" type="text" class="form-control" placeholder="ABC-1234">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Modelo</label>
                        <input name="modelo_veiculo" type="text" class="form-control" placeholder="Civic XLS, Golf GTI, etc...">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Fabricante</label>
                        <input name="fabricante_veiculo" type="text" class="form-control" placeholder="Ford, Mercedes Benz, BMW, etc...">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Cor</label>
                        <input name="cor_veiculo" type="text" class="form-control" placeholder="Cinza Carra, Azul Platinum, etc...">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Ano</label>
                        <input name="ano_veiculo" type="text" class="form-control" placeholder="1997">
                      </div>
                    </div>
                  </div>
                  
                  <div class="offset-top-25"><!-- alterar posição deste botão -->
                    <button class="button button-block button-primary" type="submit">Concluir cadastro</button>
                  </div>                
                 
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label></label>
                        <textarea rows="4" cols="80" class="form-control" value="Mike"></textarea>
                      </div>
                    </div>
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
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>. Changed by <a style="color:#FF7F63" > Team ParkingBR</a>.
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