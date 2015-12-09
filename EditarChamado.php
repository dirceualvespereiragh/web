<?php
require 'autoload.php';
require 'seguranca.php';
?>

<html>
 <head>
         <title> Chamado Novo </title>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta charset="UTF-8">
         <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"> 
         <link href="css/estilo.css" rel="stylesheet" media="screen">
 </head>
    
 <!-- <body> -->
        
<div id="miolo" class="conteudo_painel_int">     
        <?php
            use Entidade\Chamados;
            $class = 'Entidade\\' .ucfirst($_GET['cadastro']);
            $entidade = call_user_func(array($class,'get'),isset($_GET['chave']) ? $_GET['chave'] : NULL); 
            $method = 'get' . ucfirst(call_user_func(array($class,'getChave')));
        ?>
  
       <button  name="completar" value="completar" onclick="completar()" class="btn"> ...</button>  
        <div class="row">
                <div class="col-xs-12">
                    <!-- <form class="form-inline"> -->
                    <form class="form-horizontal" role="form" action="Controlador/ControladorEntidade.php?
metodo=gravar&cadastro=chamados"   method="post"> 
                        <div class="forrm-group"> <!--  form-group-lg um pouco maior -->
                            <label for="cliente" class="col-xs-2 control-label">Cliente:</label>
                            <div class="col-xs-10">
                                <select id="cbClientes" name="cbClientes" class="form-control">
                                    <?PHP
                                       echo Chamados::AlimentarComboBox($entidade->getCliente());
                                    ?>
                                </select> 
                                <span class="help-block">.</span>
                            </div>
                        </div>
                        
                        <div class="forrm-group">
                            <label for="solicitante" class="col-xs-2  control-label">Solicitante:</label>
                            <div class="col-xs-10">
                               <input type="text" class="form-control" id="solicitante" name="solicitante" placeholder="Solicitante:"  value="<?=$entidade->getSolicitante() ?>"    />
                               <span class="help-block">.</span>
                            </div>
                        </div>
                        
                        
                        <div class="forrm-group"> 
                            <label for="tipo" class="col-xs-2 control-label">Tipo de Chamado:</label>
                            <div class="col-xs-10">
                                <select class="form-control" id="tipo" name="tipo">
            <option value="Atividade Interna" <?php if($entidade->getTipo() == 'Atividade Interna'){ echo 'selected'; }?>>1 - Atividade Interna</option>
            <option value="Contabilidade" <?php if($entidade->getTipo() == 'Contabilidade'){ echo 'selected'; }?>>2 - Contabilidade</option>
            <option value="Financeiro" <?php if($entidade->getTipo() == 'Financeiro'){ echo 'selected'; }?> >3 - Financeiro </option>
            <option value="Folha" <?php if($entidade->getTipo() == 'Folha'){ echo 'selected'; }?>>4 - Folha</option>
            <option value="SagAP" <?php if($entidade->getTipo() == 'SagAP'){ echo 'selected'; }?> >5 - SagAP </option>
            <option value="NFE" <?php if($entidade->getTipo() == 'NFE'){ echo 'selected'; }?>>6 - NFE</option>
            <option value="Programa de Terceiros" <?php if($entidade->getTipo() == 'Programa de Terceiros'){ echo 'selected'; }?>>7 - Programa de Terceiros</option>
            <option value="Outros" <?php if($entidade->getTipo() == 'Outros'){ echo 'selected'; }?>>8 - Outros</option>
                                </select> 
                            </div>
                        </div>
                        
                       
                        
                
                
                        
                        <div class="form-group">
                            <label for="queixa2">Descrição do Chamado:</label>
                                                                    
          <textarea class="form-control" rows="6" id="queixa" name="queixa" > <?=$entidade->getQueixa() ?>  </textarea>
                        </div>
                        
                        <div class="forrm-group"> 
                            <label for="Pendente" >Pendente com:</label>
                            <div >
                                <select id="cbpendente" name="cbpendente" class="form-control">
            <option value="Vagner"<?php if($entidade->getPendente() == 'Vagner'){ echo 'selected'; }?>>1 - Vagner</option>
            <option value="Gilson"<?php if($entidade->getPendente() == 'Gilson'){ echo 'selected'; }?>>2 - Gilson</option>
            <option value="Roberto"<?php if($entidade->getPendente() == 'Roberto'){ echo 'selected'; }?>>3 - Roberto</option>
            <option value="Dirceu"<?php if($entidade->getPendente() == 'Dirceu'){ echo 'selected'; }?>>4 - Dirceu</option>
            <option value="Solicitante"<?php if($entidade->getPendente() == 'Solicitante'){ echo 'selected'; }?>>5 - Solicitante</option>
            <option value="Terceiros"<?php if($entidade->getPendente() == 'Terceiros'){ echo 'selected'; }?>>6 - Terceiros</option>
                                </select> 
                            </div>
                        </div>                        

                        
                        <div class="form-group">
                            <label for="tipo" class="col-xs-2 control-label"> </label>
                            <div class="col-xs-10">
                                <label class="checkbox-in-line">
                                       <input type="checkbox"  id="id2" value="2"> Urgente
                                </label>
                            </div>
                            <div class="form-group form-group-lg">
                                <label for="tipo" class="col-xs-2 control-label">Registrado por:</label>
                                <div class="col-xs-10">
                                   <p class="form-control-static" id="responsavel" name="responsavel">  <?=$entidade->getResponsavel() ?> </p>
                                </div>
                            </div>
                            
                            
                        </div>
                        
                    

                        <input type="hidden" name="chave" value=  <?=$entidade->getCodigo() ?> > 
                        <input type="hidden" id="status" name="status" value=  <?=$entidade->getStatus() ?> > 
                        
                          <hr />
                          <div  class="row">
                            <div class="col-md-12">
                             <div class="form-group form-action">
                               <div class="form-action">
                                  <button type="submit" name="EditarChamado" value="EditarChamado" class="btn btn-primary">Salvar</button>
                                  <a href="painel.php" class="btn btn-default">Cancelar</a>
                                   <?php if($entidade->getStatus() != '2'){ echo '
                                  <button type="submit" name="FecharChamado" value="FecharChamado" onclick="minhaFuncao()" class="btn btn-danger">Fechar e Salvar</button>';}?>
                               </div>  
                             </div>
                            </div>
                          </div>
                        
                    </form>
  
    
                </div>
            </div>
                    
</div>
    
<!-- </body> -->
</html>    
        
         
 
