<?php
require 'autoload.php';
require 'seguranca.php';
?>

<html>
 <head>
         <title> Chamado Novo </title>
         
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
<?php
    $class = 'Entidade\\' .ucfirst($_GET['cadastro']);
    $entidade = call_user_func(array($class,'get'),isset($_GET['chave']) ? $_GET['chave'] : NULL); 
    $method = 'get' . ucfirst(call_user_func(array($class,'getChave')));
?>
    
        <div class="row">
                <div class="col-xs-12">
                    <!-- <form class="form-inline"> -->
                    <form class="form-horizontal" role="form" action="painel.php"   method="POST"> 
                        
                        <div class="forrm-group"> <!--  form-group-lg um pouco maior -->
                            <label for="cliente" class="col-xs-2 control-label">Cliente:</label>
                            <div class="col-xs-10">
                                <select id="cbClientes" name="cbClientes" class="form-control">
                                    <option>Aguarde carregando....</option>
                                </select> 
                                <span class="help-block">.</span>
                            </div>
                        </div>

                        
                        <div class="forrm-group">
                            <label for="solicitante" class="col-xs-2  control-label">Solicitante:</label>
                            <div class="col-xs-10">
                               <input type="text" class="form-control" id="solicitante" name="solicitante" placeholder="Solicitante:"  value="<?=$entidade->getSolicitante()?>"    />
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
    
 <!--                       <div class="forrm-group"> 
                            <label for="Pendente" >Pendente com:</label>
                            <div >
                                <select id="cbPendente" name="cbPendente" class="form-control">
                                    <option value="Vagner">1 - Vagner</option>
                                    <option value="Gilson">2 - Gilson</option>
                                    <option value="Roberto">3 - Roberto</option>
                                    <option value="Dirceu">4 - Dirceu</option>
                                    <option value="Solicitante">5 - Solicitante</option>
                                    <option value="Terceiros">6 - Terceiros</option>
                                </select> 
                            </div>
                        </div>    -->                    
    </body>
</html>    
        
        
        
   
                   
<!--formulário
        <div class="tab-pane active" id="tab_inicio">
         <div class="col-md-5">


            <div class="panel panel-primary">  
                <div class="panel-heading">Cadastro de Clientes</div>            
                <div class="panel-body">

                    <form name="f_projetos" method="post" class="form-horizontal" role="form">
                         <input type="hidden" name="id" value="<?php echo $Cliente['id']; ?>" />
                        <div class="form-group">
                            <label class="control-label">Nome</label>
                            <input type="text" name="nome" required value="<?php echo $Cliente['nome']; ?>" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Celular</label>
                            <input type="text" name="celular" rows="3" required value="<?php echo $Cliente['celular']; ?>" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="text" name="email" required value="<?php echo $Cliente['email']; ?>" class="form-control"/>
                        </div>
                            <div class="form-group">
                            <label class="control-label">Endereço</label>
                            <input type="text" name="endereco" required value="<?php echo $Cliente['endereco']; ?>" class="form-control"/>
                        </div>


                        <div class="form-group">
                            <label class="control-label">Cliente foi Atendido ?</label>
                            <div class="checkbox">
                                <label class="control-label">
                                    <input type="checkbox" name="atendimento" value="Sim" <?php echo ($Cliente['atendimento'] == 1) ? 'checked' : ''; ?>"/>Sim</label>
                            </div>   
                        </div>


                        <div class="panel-footer">

                          <input type="submit"  class="btn btn-primary" value="<?php echo ($Cliente['id'] >0) ? 'Atualizar' : 'Cadastrar'; ?>" class="btn btn-default">
                        </div>

            </div> <!--fecha o panel body-->
            </div><!--fecha o panel primary-->
            </div>
            </form>
            </div><!--fecha o col-mod-6-->
-->