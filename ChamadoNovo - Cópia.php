<!DOCTYPE html>
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
        <script type="text/javascript">
            window.onload = function(){
                  $('#btnClientes').click();
            }
        </script>         
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- <form class="form-inline"> -->
                    <form class="form-horizontal"> 
                        <div class="forrm-group"> <!--  form-group-lg um pouco maior -->
                            <label for="cliente" class="col-xs-2 control-label">Cliente:</label>
                            <div class="col-xs-10">
                                <select id="cbClientes" class="form-control">
                                    <option>1 - Cotéfi</option>
                                </select> 
                            </div>
                        </div>
                         <input type="button" value="Carregar Cliente" id="btnClientes" class="botao"/>
                        
                       <script type="text/javascript"> 
                            Reset(); 
                        </script> 
                        
                        
                        <!-- sr-only  não mostra a label -->
                        <div class="forrm-group">
                            <label for="solicitante" class="col-xs-2">Solicitante:</label>
                            <div class="col-xs-10">
                               <input type="text" class="form-control" id="solicitante" placeholder="Solicitante:" />
                               <span class="help-block">Texto de ajuda para o campo 111.111.1111/0001-00</span>
                            </div>
                        </div>
                        
                        <div class="forrm-group"> 
                            <label for="tipo" class="col-xs-2 control-label">Tipo de Chamado:</label>
                            <div class="col-xs-10">
                                <select class="form-control">
                                    <option>1 - Atividade Interna</option>
                                    <option>2 - Contabilidade</option>
                                    <option>3 - Financeiro </option>
                                    <option>4 - Folha</option>
                                    <option>5 - SagAP</option>
                                    <option>6 - NFE</option>
                                    <option>7 - Programa de Terceiros</option>
                                    <option>8 - Outros</option>
                                </select> 
                            </div>
                        </div>
                        
             
                        <div class="forrm-group"> 
                            <label for="Pendente" class="col-xs-2 control-label">Pendente com:</label>
                            <div class="col-xs-10">
                                <select class="form-control">
                                    <option>1 - Vagner</option>
                                    <option>2 - Gilson</option>
                                    <option>3 - Roberto</option>
                                    <option>4 - Dirceu</option>
                                    <option>5 - Solicitante</option>
                                    <option>6 - Terceiros</option>
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
                                <label for="tipo" class="col-xs-2 control-label"> Seu e-mail:</label>
                                <div class="col-xs-10">
                                   <p class="form-control-static"> suporte@apengenharia.com.br</p>
                                </div>
                            </div>
                        </div>
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
                                                
                        
                        <div class="form-group">
                           <div class="col-xs-offset-2 col-xs-10">
                               <button type="submit" class="btn btn-default">Enviar Form</button>
                           </div>
                        </div>
                    </form>
                </div>
            </div>
                    
        </div>
                
        <!-- declarar script no final para não comprometor o carregamento -->
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        
        <script type="text/javascript"> 
            $(document).ready(function(){ 
                <!-- Carrega Clientes --> 
                $('#btnClientes').click(function(e){ 
                    $('#mensagem').html('<span class="mensagem">Aguarde, carregando ...</span>');
                    $.getJSON('json/clientes.php', function (dados){ 
                        if (dados.length > 0){ 
                            var option = '<option>Selecione o Cliente</option>'; 
                            $.each(dados, function(i, obj){ 
                                option += '<option value="'+obj.codigo+'">'+obj.secretaria+'</option>'; 
                            }) 
                            $('#mensagem').html('<span class="mensagem">Total de clientes encontrados.:'+dados.length+'</span>'); 
                            $('#cbClientes').html(option).show(); 
                        }else{ 
                            Reset(); 
                            $('#mensagem').html('<span class="mensagem">Não foram encontrados clientes!</span>'); 
                        } 
                    }) 
                })

                function Reset(){ 
                    $('#cbClientes').empty().append('<option>Carregar Cientes</option>>');
                } 
            }); 
        </script> 
        
        
        <!---- Exemplo para quando altera um campo 
          $('#cmbEstado').change(function(e){ 
          var estado = $('#cmbEstado').val(); 
          $.getJSON('consulta.php?opcao=cidade&valor='+estado, function (dados){ -->
        
    </body>
</html>