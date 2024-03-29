<!--

remove o veículo aqui


Página de edição dos dados cadastrais
esta página deve:
- abrir realizando uma consulta no banco e mostrar os dados atuais do usuário
- permitir sua edição limpando os campos e permitindo submit ou redirecionando para páginas que realizem esta tarefa
-->
<?php
include("conexao.php");
include("processa-sessao-cliente.php");
include("processa-consultar-cliente.php");
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
    ParkingBr - Editar Dados Cadastrais
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
        <li class="active ">
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
            <a class="navbar-brand" href="#pablo">Dados Cadastrais</a>
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
                <h5 class="title">Dados Cadastrais</h5>
              </div>
              <div class="card-body"> <!-- teste de retorno de dados do banco realizado com sucesso -->
                <form method="POST" action="alterar-cadastro.php">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Documento (CPF/CNPJ)</label>
                        <br><?php echo $ret_doc_cliente; ?>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <br><?php echo $ret_email_cliente ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Nome Completo</label>
                        <br><?php echo ($ret_nome_cliente . " " . $ret_sbnome_cliente);  ?>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <br><?php echo $ret_tel_cliente; ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Endereço</label>
                        <br><?php echo $ret_endrc_cliente; ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>CEP</label>
                        <br><?php echo $ret_cep_cliente; ?>
                        <br>
                      </div>
                    </div>                    
                  </div>
                  <div class="offset-top-25"><!-- tirado do Arma, melhorar -->
                    <button class="button button-block button-primary" type="submit">Alterar Cadastro</button>
                  </div>                    
                </form>
                <br>
                  <h5 class="title">Veículos</h5>
                    <?php
                    $query_veiculos = "SELECT vei_placa, vei_tipo, vei_modelo, vei_fabricante, vei_cor, vei_ano  FROM veiculo WHERE fk_clt_doc = '{$ret_doc_cliente}';";
                    $res_veiculos = mysqli_query($conn, $query_veiculos);
                    if($res_veiculos != null){
                    while ($dados_veiculos = mysqli_fetch_array($res_veiculos,MYSQLI_ASSOC)) {
                    ?>  
                <form method="POST" action="alterar-veiculo.php"> <!-- não implantado ainda -->
                <div class="row"><!--corrigir botões de submit e alterar para mostrar form com placeholders caso não haja veículos cadastrados-->
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Placa</label>
                        <br><?php print_r($dados_veiculos['vei_placa']); ?>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Tipo</label>
                        <br><?php echo $dados_veiculos['vei_tipo']; ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Modelo</label>
                        <br> <?php echo $dados_veiculos['vei_modelo']; ?>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Fabricante</label>
                        <br><?php echo $dados_veiculos['vei_fabricante']; ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Cor</label>
                        <br><?php echo $dados_veiculos['vei_cor']; ?>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Ano</label>
                        <br><?php echo $dados_veiculos['vei_ano']; ?>
                      </div>
                    </div>
                  </div>
                  <div class="offset-top-25"> <!-- não implantado ainda -->
                  <?php $_SESSION['placa_alterar'] = $dados_veiculos['vei_placa']; ?>
                    <button class="button button-block button-primary" type="submit">Remover Veículo</button>
                  </div><!-- testar "editar" dentro do while (com mais de 1 veículo) -->
                  <br>
                  <?php } } if ($res_veiculos == null) {
                    echo("<a>Você ainda não cadastrou nenhum veículo. </a>");
                  } ?>
                </form>
                <form method="POST" action="cadastrar-veiculo.php">
                  <div class="offset-top-25"><!-- funciona, manda o cliente pra page de add veiculo -->
                      <button class="button button-block button-primary" type="submit">Adicionar Veículo</button>
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