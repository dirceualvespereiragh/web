<?php
require_once 'autoload.php';
require_once 'seguranca.php';
use Entidade\Chamados;
?>
<style>
   th{
          cursor: alias;
    }
   tr{
          cursor:pointer;
    }
    
</style>

<script type="text/javascript">
        $(document).ready(function( e){ 
            $("#TabelaChamados").tablesorter(); 
        }  ); 
</script>

<div class="row">
                <div class="col-xs-12">
                    <!-- <table class="table table-striped"> -->
                    <!-- <table class="table table-hover">  marca a linha --> 
                    <!-- <table class="table table-condesed"> -->
                    <div class="table-responsive">
                    <table id="TabelaChamados" class="table table-bordered table-hover"> 
                        <thead>
                            <tr>
                                <th>Código  </th>
                                <th>Solicitante</th>
                                <th>Queixa</th>
                            </tr>
                        </thead>
                        <tbody data-link="row" class="rowlink">
                            <?PHP
                                echo Chamados::listar($pagina,$qtde_resultados,$paginas,$posicao);
                            ?>
                        </tbody>
                        
                    </table>
                  
                    </div>
                     
                </div>
    </div>


