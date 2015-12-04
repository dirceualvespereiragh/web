<?php
require 'autoload.php';
require 'seguranca.php';
use Entidade\Chamados;
$posicao =  (isset($_GET['posicao']) ? $_GET['posicao'] : 1); 
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AP Engenharia - Painel de Controle</title>
    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
      
    <link href="css/estilo.css" rel="stylesheet">
    <link href="css/painel.css" rel="stylesheet">
      
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- no final não estava funcionando a ordenação -->  
    <script src="js/jquery-1.11.3.min.js"></script> 
    <script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
      
  </head>
  <body>
     
<!-- pesquisar no PHP [code]   [/code] -->
      
<?php      
//      if (isset($_POST['SalvarChamado'])) { 
//           $tipo        = $_POST['tipo'];
//           $queixa      = $_POST['queixa'];
//           $cliente     = $_POST['cbClientes'];
//           $pendente    = $_POST['pendente'];
//           $solicitante = $_POST['solicitante'];
//           $responsavel = $_SESSION['usuario'] ;
//           $sql = "INSERT INTO chamados ";
//           $sql = $sql . "(RESPONSAVEL, SOLICITANTE, QUEIXA, NOME_CONS, ESTATISTICA, DT_ABERTURA) VALUES";
//           $sql = $sql . "(' $pendente ',' $solicitante ',' $queixa ',' $cliente  ' ,'  $tipo   ', now()) ";
//           require_once('json/conexao.php'); 
//           $pdo = Conectar(); 
//           $stm = $pdo->prepare($sql); 
//           $stm->execute(); 
//           sleep(1); 
//           $pdo = null;	          
//      }  
      //if (isset($_POST['EditarChamado'])) { 
        //   $tipo        = $_POST['tipo'];
        //   $queixa      = $_POST['queixa'];
        //   $cliente     = $_POST['cbClientes'];
        //   $pendente    = $_POST['cbpendente'];
        //   $solicitante = $_POST['solicitante'];
        //   $sql = "UPDATE  chamados ";
        //   $sql = $sql . "(SOLICITANTE, QUEIXA, NOME_CONS, ESTATISTICA) VALUES";
        //   $sql = $sql . "(' $solicitante ',' $queixa ',' $cliente  ' ,'  $tipo   ') ";
        //   $sql = $sql . "WHERE CODIGO = " . 
        //   require_once('json/conexao.php'); 
        //   $pdo = Conectar(); 
        //   $stm = $pdo->prepare($sql); 
        //   //$stm->execute(); 
        //  echo $sql;
        //  echo $_POST[$teste] ;
        //   sleep(1); 
        //   $pdo = null;	          
      //}
?>  
      
      
      
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                <a  class="navbar-brand" href="painel.php" >
                       <img  src="img/logotipo-pb.jpg"  alt="LogoTipo" class="img-responsive"/> 
                  </a> 
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="fa fa-area-chart fa-2x"></i></a></li>
                <li><a href="#"><i class="fa fa-birthday-cake fa-2x" data-toggle="modal" data-target="#bolo"  ></i></a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user fa-2x"></i> <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Minha Conta </a></li>
                    <li><a href="#">Trocar Senha</a></li>
                    <li class="divider"></li>
                    <li><a href="index.html">Efetuar Logoff</a></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      
      <div class="container-fluid">
        <div class="row-fluid">
            
            <!-- menu navegação lateral -->            
            <div class="col-sm-2">
                <div class="panel panel-primary">
                    <div id="menuchamados" role="tab" class="panel-heading">
                        <h4 class="panel-title">
                            <a href="EditarChamado.php?cadastro=chamados&chave=0">
                                <span class="glyphicon glyphicon-file"></span>
                                Chamados 
                            </a>
                        </h4>
                    </div>
                </div>                
                
<!--                <div class="panel panel-primary">
                    <div id="colGroup1" role="tab" class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#colListGroup1" aria-controls="colListGroup1" aria-expanded="false" data-toggle="collapse">
                                <span class="glyphicon glyphicon-file"></span>
                                Gerenciar Chamados
                            </a>
                        </h4>
                    </div>
                    <div role="tabpanel" class="panel-collapse collapse" id="colListGroup1" aria-expanded="false">
                        <ul id="menuchamados" class="list-group">
                            <li  class="list-group-item"><a href="ChamadoNovo2.php">Criar</a></li>
                            
                            <li class="list-group-item"><a href="EditarChamado.php?cadastro=chamados&chave=0">Alterar</a></li>
                            <li class="list-group-item"><a href="#">Excluir</a></li>
                        </ul>
                        <div class="panel-footer"></div>
                    </div> 
                </div> -->
                <div class="panel panel-primary">
                    <div id="colGroup1" role="tab" class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#colListGroup2" aria-controls="colListGroup2" aria-expanded="false" data-toggle="collapse">
                                
                                <span class="glyphicon glyphicon-user"></span>
                                
                                Gerenciar Usuários
                            </a>
                        </h4>
                    </div>
                    <div role="tabpanel" class="panel-collapse collapse" id="colListGroup2" aria-expanded="false">
                        <ul class="list-group">
                            
                            <li class="list-group-item"><a href="#">Alterar</a></li>
                            <li class="list-group-item"><a href="#">Excluir</a></li>
                        </ul>
                        <div class="panel-footer"></div>
                    </div>
                </div>
            </div> 
            <!-- /.menu navegação lateral -->
            
            <script>
               var xmlhttp = new XMLHttpRequest();
               var url = "json/QuantosChamados.php?posicao=1";
               xmlhttp.onreadystatechange=function() 
               {
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    myFunction(xmlhttp.responseText);
                  }
               }
               xmlhttp.open("GET", url, true);
               xmlhttp.send();
               function myFunction(response) {
                  var arr = JSON.parse(response);
                  var i;
                  var out = "";

                  for(i = 0; i < arr.length; i++) {
                     out +=  arr[i].TotalChamados ;
                  }
                  $totalaberto = out;
                  document.getElementById("idChamadosAbertos").innerHTML = out;
               }
            </script>


            <script>
              
               var xmlhttp2 = new XMLHttpRequest();
               var url = "json/QuantosChamados.php?posicao=2";
               xmlhttp2.onreadystatechange=function() 
               {
                  if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
                    myFunction2(xmlhttp2.responseText);
                  }
               }
               xmlhttp2.open("GET", url, true);
               xmlhttp2.send();
               function myFunction2(response) {
                  var arr = JSON.parse(response);
                  var i;
                  var out2 = "";

                  for(i = 0; i < arr.length; i++) {
                     out2 +=  arr[i].TotalChamados ;
                  }
                     
                  $totalfechado = out2;
                  document.getElementById("idChamadosFechados").innerHTML = out2;
               }
            </script>
            
            

            <div class="col-sm-10">
            
                <div class="conteudo_painel">                    
                    <div  class="conteudo_painel_int">
                        
                        <ul class="nav nav-pills" role="tablist">
                            <li class="<?php if ($posicao == '1'){ echo 'active';} ?> "><a href="painel.php?posicao=1">Chamados Abertos <span id="idChamadosAbertos"  class="badge">   </span></a></li>
                            <li class="<?php if ($posicao == '2'){ echo 'active';} ?> "><a href="painel.php?posicao=2">Chamados Fechados <span id="idChamadosFechados" class="badge">   </span></a></li>
                        </ul>
                        
                        
                        <script>
                           var selector = '.nav li';
                           $(selector).on('click', function(){
                              $(selector).removeClass('active');
                              $(this).addClass('active');
                           });
                        </script>        
                        
                        <div class="well well-sm">
                            <h2>Chamados</h2>
                         <!--   <p>Usuário logado: <?= $_SESSION['usuario']?>  </p>  -->
                        </div>
                        
                        <!-- ------------------------------------------------------------------- -->
                                               
                        
                        <div id="miolo">
                            
                        <?php
                            include 'json/parametros.php';
                            //primeiro select com um contador para saber quantos resultados serão exibidos
                         
                            $result_p =  mysql_query("select count(codigo) as total FROM chamados where posicao = " . $posicao);
                            $rs =  mysql_fetch_array($result_p) ;
                            $row_p = $rs["total"];
                            //quantidade de resultados por página
                            $qtde_resultados = 25;
                            $pagina = 1;
                            //calculando quantidade de páginas
                            $paginas = ceil($row_p / $qtde_resultados);
                            // segundo select com os valores já limitados pelo limite no sql
                            //$result =  mysql_query("select * FROM chamados limit 0 , " . $qtde_resultados);
                            $posicao = 1;
                        ?>

                        <!-- Função utilizando JQUERY que faz a paginação dos dados,
                             Nesta função é enviado, utilizando o médodo post do jquery, três informações a página op.php, são eles
                             página que se deseja exibir, quantidade de páginas e quantidade de resultado por página
                             no retorno oconteudo da div dados será trocado pelo conteúdo retornado.  
                        -->
                        <script type="text/javascript">

                            function paginar(pagina,paginas, qtde_resultados , posicao){
                               $("#dados").html("<b> <img src='carregando.gif' alt='carregando' /></b>");
                               $.post("op.php", {pagina:pagina, paginas:paginas, qtde_resultados:qtde_resultados, posicao:posicao}, function(data){$("#dados").html(data);}, "html") ;
                            }
                        </script>
      
                        <fieldset style="padding: 5px;">  <!-- <legend>Chamados</legend> -->
                            <div id="dados">
                                <?php
                                   include 'tabelachamados.php';
                                   include 'indice.php';
                                   $pagina++;    
                                ?>
                            </div>
                        </fieldset>
                        </div>    
                        <!-- --------------------------------------------------------------------------------------- -->
                        
                        <div class="page=header"><h3>Avisos:</h3></div>
                        
                        <div class="alert alert-success">
                            <strong>Parabéns!</strong> Você foi recomendado!
                        </div>
                        
                        <div class="alert alert-warning">
                            <strong>Atenção:</strong> Você têm até o dia /01/01/2016 para ajustar suas tarefas!
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-4">
                                <h3>Minhas Tarefas</h3>
                                <ul>
                                    <li>Ligar para Fulano</li>
                                    <li>Retornar e-mail fulano</li>
                                    <li>Outra Tarefa</li>
                                </ul>
                                <a href="#" class="btn btn-primary btn-block">Adicionar nova Tarefa</a>
                            </div>
                            
                            <div class="col-sm-4">
                                <h3>Minhas Tarefas</h3>
                                <ul>
                                    <li>Ligar para Fulano</li>
                                    <li>Retornar e-mail fulano</li>
                                    <li>Outra Tarefa</li>
                                </ul>
                                <a href="#" class="btn btn-primary btn-block">Adicionar nova Tarefa</a>
                            </div>
                            
                            <div class="col-sm-4">
                                <h3>Minhas Tarefas</h3>
                                <ul>
                                    <li>Ligar para Fulano</li>
                                    <li>Retornar e-mail fulano</li>
                                    <li>Outra Tarefa</li>
                                </ul>
                                <a href="#" class="btn btn-primary btn-block">Adicionar nova Tarefa</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            
            </div>
        </div>
      </div>
      
            
        <!-- Painel Bolo-->    
            
       <div class="modal fade" id="bolo" role="dialog" tabindex="-1" aria-hidden="true">
           <div class="modal-dialog modal-lg">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">
                           <span aria-hidden="true">&times;</span>
                           <span class="sr-only">Fechar janela modal</span>
                       </button>
                       <h4 class="modal-title">Datas importantes</h4>
                    </div>
                   <div class="modal-body">
                       <p>Roberto Jefferson Thome 24/01/82</p>
                       <p>Vagner Adriano Segantim 12/02/81</p>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                   </div>
               </div>
           </div>
       </div>            
            
      
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      
      <script type="text/javascript">
	     $(document).ready(function(){
		    $("#menuchamados a").click(function( e ){
			   e.preventDefault();
			   var href = $( this ).attr('href');
			   $("#miolo").load( href +" #miolo");
            }) 
         })

        </script>                         
      
  </body>
</html>

