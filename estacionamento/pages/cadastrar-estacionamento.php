<!--
Página de cadastro do estacionamento, para a qual o usuário será direcionado após cadastrar-se como gestor na home/landing page
Obs: nossa documentação informa que estes cadastros informados acima devem ser aprovados pelo administrador isto ainda não foi implementado 
-->
<?php
include("proc-sessao-gestor.php");
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
            <a href="./dados-cadastrais.php">
              <i class="now-ui-icons users_single-02"></i>
              <p>Dados Cadastrais</p>
            </a>
          </li>
          <li class="active">
            <a href="./estacionamentos.php">
              <i class="now-ui-icons shopping_shop"></i>
              <p>Estacionamentos</p>
            </a>
          </li>
          <li>
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
            <a class="navbar-brand" href="#pablo">Estacionamentos</a>
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
                <h5 class="title">Cadastre seu estacionamento</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="processa-cad-estacionamento.php">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="estac-nome" class="form-control" placeholder="Ex: Quitanda 55 Park" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" name="estac-telefone" class="form-control" placeholder="21 26245544" required>
                      </div>
                    </div>                    
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>CEP</label>
                        <input type="text" name="estac-cep" class="form-control" placeholder="248080040" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Endereço</label>
                        <input type="text" name="estac-endrc"class="form-control" placeholder="R. da Quitanda, Centro - Rio de Janeiro 55" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Total de vagas (carros)</label>
                        <input type="text" name="estac-ttl-carro" class="form-control" placeholder="100" required>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group"><!-- ver input type -->
                        <label>Total de vagas (motos)</label>
                        <input type="text" name="estac-ttl-moto" class="form-control" placeholder="80" required>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group"></div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group"><!-- ver input type -->
                        <label>Horário de abertura</label>
                        <input type="text" name="estac-exp-inicio" class="form-control" placeholder="07:00" required>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Horário de encerramento</label>
                        <input type="text" name="estac-exp-fim" class="form-control" placeholder="19:00" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label></label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label>Informe somente valores numéricos nos campos abaixo:</label>
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
                        <label>Preço por hora (carros)</label>
                        <input type="text" name="estac-hr-carro" class="form-control" placeholder="5.00" required>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group"><!-- ver input type -->
                        <label> Preço da diária (carros)</label>
                        <input type="email" name="estac-dia-carro" class="form-control" placeholder="50.00" required>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group"></div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group"><!-- ver input type -->
                        <label>Preço por hora (motos)</label>
                        <input type="email" name="estac-hr-moto" class="form-control" placeholder="4.00" required>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Preço diária (motos)</label>
                        <input type="text" name="estac-dia-moto" class="form-control" placeholder="40.00" required>
                      </div>
                    </div>
                  </div>
                  <div class="offset-top-25"><!-- tirado do Arma, melhorar -->
                    <button class="button button-block button-primary" type="submit">Cadastrar</button>
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