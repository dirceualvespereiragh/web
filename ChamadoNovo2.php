<?php
require 'autoload.php';
require 'seguranca.php';
$class = 'Entidade\\' .ucfirst($_GET['cadastro']);

$entidade = call_user_func(array($class,'get'),
isset($_GET['chave']) ? $_GET['chave'] : NULL); 

$method = 'get' . ucfirst(
	call_user_func(array($class,'getChave'))
);

?>
<html>
 <head>

         <!-- define a viewpot --->
         
         <!--"width=device-width Largura do nosso dispositivo --->
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta charset="utf-8">
         <!-- adiciona CSS do BootStrap -->
         <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"> 
         
         <!-- css personalizado -->
         <link href="css/estilo.css" rel="stylesheet" media="screen">
         
    </head>
    
    <body>
        
        
   
        
        
<div id="miolo" class="conteudo_painel_int">     
    

    
<div class="row">
                <div class="col-xs-12">
                             <p>Inclusão de <?=$_GET['cadastro']?></p>

                    <!-- <form class="form-inline"> -->
                    <form class="form-horizontal" role="form" action="painel.php"   method="POST"> 
                        
                        <div class="forrm-group"> <!--  form-group-lg um pouco maior -->
                            <label for="cliente" class="col-xs-2 control-label">Cliente:</label>
                            <div class="col-xs-10">
                                <select id="cbClientes" name="cbClientes" class="form-control">
                                    <option>Aguarde Carregando....</option>
                                </select> 
                                <span class="help-block">.</span>
                            </div>
                        </div>
                        
                            
                        
                        <!-- sr-only  não mostra a label -->
                        <div class="forrm-group">
                            <label for="solicitante" class="col-xs-2  control-label">Solicitante:</label>
                            <div class="col-xs-10">
                               <input type="text" class="form-control" id="solicitante" name="solicitante" placeholder="Solicitante:" />
                               <span class="help-block">.</span>
                            </div>
                        </div>
                        
                        <div class="forrm-group"> 
                            <label for="tipo" class="col-xs-2 control-label">Tipo de Chamado:</label>
                            <div class="col-xs-10">
                                <select class="form-control" id="tipo" name="tipo">
                                    <option value="Atividade Interna">1 - Atividade Interna</option>
                                    <option value="Contabilidade">2 - Contabilidade</option>
                                    <option value="Financeiro">3 - Financeiro </option>
                                    <option value="Folha">4 - Folha</option>
                                    <option value="SagAP">5 - SagAP</option>
                                    <option value="NFE">6 - NFE</option>
                                    <option value="Programa de Terceiros">7 - Programa de Terceiros</option>
                                    <option value="Outros">8 - Outros</option>
                                </select> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="queixa">Descrição do Chamado:</label>
                            <textarea class="form-control" rows="6" id="queixa" name="queixa"></textarea>
                        </div>
                        
                        
                        <div class="forrm-group"> 
                            <label for="Pendente" >Pendente com:</label>
                            <div >
                                <select class="form-control" id="pendente" name="pendente">
                                    <option value="Vagner">1 - Vagner</option>
                                    <option value="Gilson">2 - Gilson</option>
                                    <option value="Roberto">3 - Roberto</option>
                                    <option value="Dirceu">4 - Dirceu</option>
                                    <option value="Solicitante">5 - Solicitante</option>
                                    <option value="Terceiros">6 - Terceiros</option>
                                </select> 
                            </div>
                        </div>                        

                        
                        <div class="form-group">
                            <label for="tipo" class="col-xs-2 control-label"> </label>
                            <div class="col-xs-10">
                                <label class="checkbox-in-line">
                                       <input type="checkbox"  id="id1" value="1"> Não Enviar E-mail
                                </label>
                                <label class="checkbox-in-line">
                                       <input type="checkbox"  id="id2" value="2"> Urgente
                                </label>
                                <label class="checkbox-in-line">
                                       <input type="checkbox"  id="id3" value="3"> Encerrar
                                </label>
                            </div>
                            <div class="form-group form-group-lg">
                                <label for="tipo" class="col-xs-2 control-label"> Resposnável :</label>
                                <div class="col-xs-10">
                                   <p class="form-control-static"> <?= $_SESSION['usuario']?> </p>
                                </div>
                            </div>
                        </div>
                        
                        <!--
                        <div class="forrm-group has-success has-feedback">
                            <label for="nome" class="col-xs-2"> Nome Completo:</label>
                            <div class="col-xs-10">
                            <input type="text" class="form-control" id="nome" placeholder="Nome:" />
                                <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="forrm-group has-warning" has-feedback>
                            <label for="nome" class="col-xs-2"> Nome Completo:</label>
                            <div class="col-xs-10">
                            <input type="text" class="form-control" id="nome" placeholder="Nome:" />
                            <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>                                
                            </div>
                        </div>
                        
                       <div class="forrm-group has-error has-error has-feedback" >
                            <label for="nome" class="col-xs-2"> Nome Completo:</label>
                            <div class="col-xs-10">
                            <input type="text" class="form-control input-lg" id="nome" placeholder="Nome:" />
                            <span class="glyphicon glyphicon-remove form-control-feedback"></span>               
                            </div>
                        </div>
                        -->                

                          <hr />
                          <div  class="row">
                            <div class="col-md-12">
                             <div class="form-group form-action">
                               <div class="form-action">
                                  <button type="submit" name="SalvarChamado" value="SalvarChamado" class="btn btn-primary">Salvar</button>
                                  <a href="painel.php." class="btn btn-default">Cancelar</a>
                               </div>  
                                </div>
                            </div>
                          </div>
                        
                    </form>
                </div>
            </div>
                    
</div>
</body>                    
</html>
