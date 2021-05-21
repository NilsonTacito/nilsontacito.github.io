<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="/home/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CRoboto:300,300i,400,400i,500,500i,700,700i,900,900i">
    <link rel="stylesheet" href="/home/css/bootstrap.css">
    <link rel="stylesheet" href="/home/css/fonts.css">
    <link rel="stylesheet" href="/home/css/style.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="/home/images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
        <p>Loading...</p>
      </div>
    </div>
    <div class="page">
      <header class="section page-header">
        <!--RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <!--RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!--RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!--RD Navbar Brand-->
                  <div class="rd-navbar-brand"><a class="brand"><img class="brand-logo-dark" src="/home/images/logox.png" alt="" width="168" height="40"/><img class="brand-logo-light" src="/home/images/logox.png" alt="" width="168" height="40"/></a>
                  </div>
                </div>
                <div class="rd-navbar-main-element">
                  <div class="rd-navbar-nav-wrap">
                    <!--RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item"><a class="rd-nav-link" href="/cliente/pages/login/index.html">Área do Cliente</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="/estacionamento/pages/login/index.html"> Área do Parceiro</a>
                      </li><!-- admins podem acessar na url admin.parking.com -->
                      <!--li class="rd-nav-item"><a class="rd-nav-link" href="#contact-name">Cadastre-se!</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#contact-CNPJ-2">Seja Um Parceiro</a>
                      </li -->
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#contacts">Quem Somos</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <section class="section intro bg-default">
        <div class="intro-left swiper-container swiper-slider swiper-slider-1" data-loop="true" data-autoplay="4000" data-simulate-touch="true">
          <div class="swiper-wrapper text-center">
            <div class="swiper-slide context-dark" data-slide-bg="/home/images/reserve-slide2.jpg">
              <div class="swiper-slide-caption">
                <h1 class="decorative-letter" data-caption-animate="fadeInUp" data-caption-delay="100" data-letter="R">Reserve sua<br> vaga agora!</h1>
                <h5 class="decorative-line" data-caption-animate="fadeInUp" data-caption-delay="250">Só no ParkingBr você pode reservar vagas para<br>estacionar seu carro com até 5 dias de antecedência!</h5>
                <ul class="list-social offset-left-25" data-caption-animate="fadeInUp" data-caption-delay="100">
                </ul>
              </div>
            </div>
            <div class="swiper-slide context-dark" data-slide-bg="/home/images/parca-slide2.jpg">
              <div class="swiper-slide-caption">
                <h1 class="decorative-letter" data-caption-animate="fadeInUp" data-caption-delay="100" data-letter="S">Seja um parceiro!<br></h1>
                <h5 class="decorative-line" data-caption-animate="fadeInUp" data-caption-delay="250">Cadastre seu estacionamento e dê um fim às vagas ociosas!<br></h5>
                <ul class="list-social offset-left-25" data-caption-animate="fadeInUp" data-caption-delay="100">
                </ul>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
        <div class="intro-right context-dark text-center">
          <h3 class="text-uppercase">Você ainda não<br>é nosso cliente?</h3>
          <p class="text-primary text-uppercase text-box offset-top-15">Cadastre-se!</p>
          <!--RD Mailform          -->
          <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="POST" action="/home/processa-cad-cliente.php">
            <div class="form-wrap">                                               
              <input name="nome" class="form-input" id="contact-name" type="text" data-constraints="@Required">
              <label class="form-label" for="contact-name">Nome</label>
            </div>
            <div class="form-wrap">
              <input  name="sobrenome" class="form-input" id="contact-sbname" type="text" data-constraints="@Required">
              <label class="form-label" for="contact-sbname">Sobrenome</label>
            </div>
            <div class="form-wrap">
              <input name="documento" class="form-input" id="contact-documento" type="text" data-constraints="@Required">
              <label class="form-label" for="contact-documento">Documento (CPF ou CNPJ)</label><!--Documento! não só cpf -->
            </div>  
            <div class="form-wrap">
              <input name="email" class="form-input" id="contact-email" type="email" data-constraints="@Email @Required">
              <label class="form-label" for="contact-email">E-mail</label>
            </div>
            <div class="form-wrap">
              <input name="senha" class="form-input" id="contact-senha" type="password" data-constraints="@Required">
              <label class="form-label" for="contact-senha">Senha</label>
            </div>
            <div class="form-wrap">
              <input name="telefone" class="form-input" id="contact-phone" type="text" data-constraints="@PhoneNumber @Required">
              <label class="form-label" for="contact-phone">Telefone</label>
            </div>
            <div class="form-wrap">
              <input  name="endereco" class="form-input" id="contact-endereco" type="text" data-constraints="@Required">
              <label class="form-label" for="contact-endereco">Endereço</label>
            </div>
            <div class="form-wrap">
              <input name="cep" class="form-input" id="contact-cep" type="text" data-constraints="@Required">
              <label class="form-label" for="contact-cep">CEP</label>
            </div>
            <div class="offset-top-25">
              <button class="button button-block button-primary" type="submit">Concluir cadastro</button>
            </div>
          </form>
        </div>
      </section>
      <section class="section contact section-xl">
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-lg-5 bg-gray-800 text-center contact-item" id="contacts" data-type="anchor">
              <h3 class="text-uppercase">Você ainda não<br>é nosso parceiro?</h3>
              <p class="text-primary text-uppercase text-box offset-top-15">Cadastre-se!</p>
              <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="/home/processa-cad-gestor.php">
                <div class="form-wrap">
                  <input class="form-input" id="contact-razaoSocial-2" type="text" name="razaosocial-gestor" data-constraints=" @Required">
                  <label class="form-label" for="contact-razaoSocial-2">Razão Social</label>
                </div>
                <div class="form-wrap">
                  <input class="form-input" id="contact-CNPJ-2" type="int" name="cnpj-gestor" data-constraints="@Required">
                  <label class="form-label" for="contact-CNPJ-2">CNPJ</label>
                </div>                
                <div class="form-wrap">
                  <input class="form-input" id="contact-email-2" type="email" name="email-gestor" data-constraints="@Email @Required">
                  <label class="form-label" for="contact-email-2">E-mail</label>
                </div>
                <div class="form-wrap">
                  <input class="form-input" id="contact-senha-2" type="password" name="senha-gestor" data-constraints="@Required">
                  <label class="form-label" for="contact-senha-2">Senha</label>
                </div>
                <div class="form-wrap">
                  <input class="form-input" id="contact-nome-2" type="text" name="nome-gestor" data-constraints="@Required">
                  <label class="form-label" for="contact-nome-2">Nome</label>
                </div>
                <div class="form-wrap">
                  <input class="form-input" id="contact-sbnome-2" type="text" name="sbnome-gestor" data-constraints="@Required">
                  <label class="form-label" for="contact-sbnome-2">Sobrenome</label>
                </div>
                <div class="form-wrap">
                  <input class="form-input" id="contact-endereco-2" type="text" name="endereco-gestor" data-constraints="@Required">
                  <label class="form-label" for="contact-endereco-2">Endereço</label>
                </div>
                <div class="form-wrap">
                  <input class="form-input" id="contact-cep-2" type="text" name="cep-gestor" data-constraints="@Required">
                  <label class="form-label" for="contact-cep-2">CEP</label>
                </div>
                <div class="form-wrap">
                  <input class="form-input" id="contact-phone-2" type="text" name="telefone-gestor" data-constraints="@PhoneNumber @Required">
                  <label class="form-label" for="contact-phone-2">Telefone</label>
                </div>
                <div class="offset-top-25">
                  <button class="button button-block button-primary" type="submit">Concluir cadastro</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <footer class="section footer-classic context-dark bg-gray-700">
        <div class="container">
        <div class="container">
          <div class="row row-30 justify-content-lg-between align-items-center">
            <div class="col-12 col-sm-4 col-lg-2"><a class="brand" href="index.html"><img class="brand-logo-dark" src="/home/images/logo-default-168x40.png" alt="" width="168" height="40"/><img class="brand-logo-light" src="/home/images/logox-wt.png" alt="" width="168" height="40"/></a>
            </div>
            <div class="col-12 col-sm-4 col-lg-5 col-xl-4">
              <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>Arma</span><span>.&nbsp;</span><span>All Rights Reserved. Design by Zemez. Modified by <a style="color:#FF7F63" > Team ParkingBR</a>.</span></p>
            </div>
            <div class="col-12 col-sm-4 col-lg-2">
              <ul class="list-custom">
                <li><a href="#"><span class="icon material-design-youtube35"></span></a></li>
                <li><a href="#"><span class="icon material-design-facebook56"></span></a></li>
                <li><a href="#"><span class="icon material-design-instagram16"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      </div>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="/home/js/core.min.js"></script>
    <script src="/home/js/script.js"></script>
   <!-- coded by Starlight -->
  </body>
</html>