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
    <link href="css/datepicker.css" rel="stylesheet">      
      
    <script src="js/jquery-1.11.3.min.js"></script> 
    <script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-datepicker.js"></script>  
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="library/RGraph/libraries/RGraph.common.core.js" ></script>
    <script src="library/RGraph/libraries/RGraph.common.key.js" ></script>
    <script src="library/RGraph/libraries/RGraph.drawing.rect.js" ></script>      
    <script src="library/RGraph/libraries/RGraph.common.tooltips.js" ></script>
    <script src="library/RGraph/libraries/RGraph.common.dynamic.js" ></script>
    <script src="library/RGraph/libraries/RGraph.pie.js" ></script>
    <script src="library/RGraph/libraries/RGraph.common.effects.js"></script>
  </head>
  <body>
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
               
            </div>
              
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="fa fa-area-chart fa-2x"  data-toggle="modal" data-target="#grafico"  ></i></a></li>
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
                            <a href="#">
                                <span class="glyphicon glyphicon-file"></span>
                                Chamados 
                            </a>
                        </h4>
                    </div>
                </div>                
                
                <div class="panel panel-primary">
                    <div id="colGroup1" role="tab" class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#colListGroup2" aria-controls="colListGroup2" aria-expanded="false" data-toggle="collapse">
                                
                                <span class="glyphicon glyphicon-user"></span>
                                
                                Clientes
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
        

            <div class="col-sm-10">
                <div class="conteudo_painel">                    
                    <div  class="conteudo_painel_int">
                        <div class="col-sm-6">
                            <ul class="nav nav-pills" role="tablist">
                                <li ><a href="#">Chamados Abertos <span id="idChamadosAbertos"  class="badge">  70 </span></a></li>
                                <li ><a href="#">Chamados Fechados <span id="idChamadosFechados" class="badge">  71 </span></a></li>
                            </ul>
                        </div>
                        <div class="col-sm-5">
                           <input type="text" id="TextoParaBusca" name="TextoParaBusca" class="form-control">
                        </div>
                        <div class="col-sm-1">
                           <a href="#"><i class="fa fa-search fa-2x" data-toggle="modal" data-target="#Busca"  ></i></a>                
                        </div>
                        
                        <div >
                            <div class="panel-group" id="accordion"  role="tablist"  >
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                           <a class="col-sm-offset-12 " role="button"  id="busca"  data-toggle="collapse" data-parent="#accordion" href="#collapseBusca" aria-expanded="true" aria-controls="collapseBusca">
                                               <i class="fa fa-sort-desc">     </i>
                                           </a>

                                    </div>
                                    <div id="collapseBusca" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                       <div class="col-sm-offset-6 col-sm-6 panel-body">

                                           <div class="col-sm-offset-2 col-sm-4">
                                             <span> de:</span>
                                             <input type="date" id="DataBuscaFim" name="DataBuscaFim" class="form-control">
                                           </div>
                                           <div class="col-sm-offset-2 col-sm-4">
                                             <span> até:</span>
                                             <input type="date" id="DataBuscaInicio" name="DataBuscaInicio" class="form-control">
                                           </div>

                                           <div class="forrm-group"> 
                                                <div class="col-sm-offset-2  col-sm-5">
                                                    <span>Tipo :</span>
                                                    <select class="form-control" id="tipo" name="tipo">
                                                        <option value="Atividade Interna" >1 - Atividade Interna</option>
                                                        <option value="2" >2 - </option>
                                                        <option value="3" >3 - </option>
                                                        <option value="4" >4 - </option>
                                                        <option value="5" >5 - </option>
                                                        <option value="6" >6 - </option>
                                                        <option value="7" >7 - </option>
                                                        <option value="Outros" >8 - Outros</option>
                                                    </select> 
                                                </div>
                                           </div>

                                       </div>      
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        
                        <div class="well well-sm col-sm-12">
                            <h4>Chamados</h4>
                        </div>
                        <div id="miolo">
                     
                            
                       
                

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
      
  </body>
</html>

