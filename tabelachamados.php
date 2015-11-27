
<style>
   th{
          cursor: alias;
    }
   tr{
          cursor:pointer;
    }
    
</style>

<script type="text/javascript">
        $(document).ready(function(){ 
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
                                <th>Código</th>
                                <th>Solicitante</th>
                                <th>Queixa</th>
                            </tr>
                        </thead>
                        <tbody data-link="row" class="rowlink">
                            <?PHP
                                while ($row = mysql_fetch_array($result)) {
//                                            <tr id="LinhaChamado" onclick="window.location=\'EditarChamado.php?id=' . $row['codigo'] . '\'"> 
                                     
                                    echo '
                                        <tr>
                                                <td id="LinkLinhaChamado">
                                                    <a href="EditarChamado.php?id=' . $row['codigo'] . '"><span class="glyphicon glyphicon-edit"></span>' . $row['codigo'] . '</a>                 
                                                </td>                                            
                                            
                                                
                                                <td>' . $row['solicitante'] . '</td>
                                                <td>' . $row['queixa'] . '</td>
                                            </tr>
                                         ';
                                }
                                echo '
                        </tbody>';
                        ?>
                    </table>
                  
                    </div>
                     
                </div>
    </div>


