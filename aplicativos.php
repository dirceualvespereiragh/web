<?php
require 'autoload.php';
require 'seguranca.php';
?>
<!DOCTYPE html>
<!-- google web fonts --> 
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modelo AP</title>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/estilo.css" rel="stylesheet" media="screen">
  </head>
    
  <body data-spy="scroll" data-target=".menu-navegacao" data-offset="80">

        <div class="container-fluid">
            <!-- Menu da Aplicação -->
            <nav class="navbar navbar-default navbar-fixed-top">
              <div class="container">
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-navegacao">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </button>
                      <a  class="navbar-brand" href="index.html" >
                           <img  src="img/logotipo-pb.jpg"  alt="LogoTipo" class="img-responsive"/> <!--  height="210" width="80" -->
                      </a> 

                  </div>
                  <div class="collapse navbar-collapse menu-navegacao" id="menu-navegacao">
                      <ul class="nav navbar-nav ">
                          <li> <a class="" href="#page-top"></a> </li>
                          <li>
                               <a class="" href="index.html#servicos">Serviços</a> 
                          </li>
                          <li>
                               <a class="" href="index.html#portifolio">Portifolio</a> 
                          </li>
                          <li>
                               <a class="" href="index.html#quemsomos">Quem Somos</a> 
                          </li>
                          <li>
                               <a class="" href="index.html#localizacao">Localização</a> 
                          </li>
                          <li>
                               <a class="" href="index.html#contato">Contato</a> 
                          </li>

                          <li>
                              <div>
                              <h2> <small>Olá, <?= $_SESSION['usuario']?> </small> </h2>
                              </div>
                          </li>
                      </ul>
                  </div>
              </div>
            </nav>
            <! fim Menu da Aplicação -->

        </div>
        <section id="aplicativos">
          <div class="container">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="page-header titulo-aplicativos"><h1> Mundo AP</h1> </div>
                      <div >  <small>   Clique na ferramenta desejada</small> </div>
                  </div>
              </div>
              <hr />
              <div class="row">
                   <a  href="painel.php" >
                      <div class="col-sm-3 col-md-3 " >
                          <img  src="img/logotipo-pb.jpg"  alt="LogoTipo" class="img-responsive"/> 
                          <h4>Chamados</h4>
                      </div>
                   </a> 
                   <div class="col-sm-1 col-md-1">
                   </div>
                   <a  href="/dokuwiki" >
                      <div class="col-sm-3 col-md-3">
                          <div>
                                 <img  src="img/logotipo-pb.jpg"  alt="LogoTipo" class="img-responsive"/> 
                              <h4>Wiki</h4>
                          </div>
                      </div>
                  </a>       
                  <div class="col-sm-1 col-md-1">
                  </div>
                  <a  href="#" >
                      <div class="col-sm-4 col-md-4 ">
                          <img  src="img/logotipo-pb.jpg"  alt="LogoTipo" class="img-responsive"/> 
                          <h4>Vem novidade por ai!</h4>
                      </div>
                  </a>

              </div>
          </div>
        </section>
        <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    Todos os direitos reservados
                </div>
                <div class="col-sm-3">
                    <small>Desenvolvido por:</small><br/>
                    <strong>AP Engenharia de Software</strong>
                </div>
            </div>
        </div>
        </footer>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>