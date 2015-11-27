<html>
    <head>
        <title>Teste</title>
        <script src="js/jquery-1.11.3.min.js"></script> 
        <script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
      
  <style>
     th{
        cursor:pointer;
     }
  </style>
  
    </head>
    <body>
        
 <!-- ------------------------------------------------------------------- -->
                        <?php
                            include 'json/parametros.php';
                            //primeiro select com um contador para saber quantos resultados serão exibidos
                         
                            $result_p =  mysql_query("select count(codigo) as total FROM chamados");
                            $rs =  mysql_fetch_array($result_p) ;
                            $row_p = $rs["total"];
                            //quantidade de resultados por página
                            $qtde_resultados = 25;
                            $pagina = 1;
                            //calculando quantidade de páginas
                            $paginas = ceil($row_p / $qtde_resultados);
                            // segundo select com os valores já limitados pelo limite no sql
                            $result =  mysql_query("select * FROM chamados order by dt_abertura desc limit 0 , " . $qtde_resultados );
                        ?>

                        <!-- Função utilizando JQUERY que faz a paginação dos dados,
                             Nesta função é enviado, utilizando o médodo post do jquery, três informações a página op.php, são eles
                             página que se deseja exibir, quantidade de páginas e quantidade de resultado por página
                             no retorno oconteudo da div dados será trocado pelo conteúdo retornado.  
                        -->
                        <script type="text/javascript">

                            function paginar(pagina,paginas, qtde_resultados ){
                               $("#dados").html("<b><img src='carregando.gif' alt='' /></b>");
                               $.post("op.php", {pagina:pagina, paginas:paginas, qtde_resultados:qtde_resultados}, function(data){$("#dados").html(data);}, "html") ;
                            }
                        </script>        
        
        
        
        
<style type="text/css">
            #paginacao{font-family: Verdana, Arial, Helvetica; font-size: 14px;  }
            .pgoff {color: #FF0000; text-decoration: none}
            a.pg {color: #003366; text-decoration: none}
            a:hover.pg { color: #0066cc; text-decoration:underline}
        </style>
<?php
 
echo "<div id='paginacao'>";
    //Verificando se estamos na primeira página se não estivetr ele imprime o botão de anterior e o numero da primeira página
    //Se não ele desativa o botão de anterior e seta o indicador na primeira página
    if ($pagina > 1) {
        echo '&nbsp;<a href="javascript:paginar(' . ($pagina - 2) . ',' . $paginas . ',' . $qtde_resultados . ')">&laquo; anterior</a>&nbsp;';
        echo '&nbsp;<a href="javascript:paginar(0,' . $paginas . ',' . $qtde_resultados . ')">1</a>&nbsp;';
    } else {
        echo "<font  color=#CCCCCC>&laquo; anterior</font>";
        echo "&nbsp;<span class='pgoff'>[1]</span>&nbsp;";
    }
    // imprimindo as demais páginas
 
 
    for ($i = $pagina; $i <= ($pagina + 1); $i++) {
        //imprindo o botão da página antes da atual, ela necessita ser diferente da primeira página
        if (($i - 1) == ($pagina - 1) and ($i - 1) != 1 and ($i != 1)) {
            echo '...&nbsp;<a href="javascript:paginar(' . ($i - 2) . ',' . $paginas . ',' . $quant_resul . ')">' . ($i - 1) . '</a>&nbsp;';
        }
        // verificando se estamos na primeira página ou na ultima se estiver ele não imprime nada.
        if ($i == 1 or $i == $paginas or $i == $paginas) {
            echo"";
        }
        // se a página for igual a página atual ele seta o indicador na página e desativa o botão
        elseif ($pagina == $i) {
            echo "&nbsp;<span class='pgoff'>[$i]</span>&nbsp;";
        }
        //imprimindo a página após a página atual,
        elseif ($i < $pagina) {
            echo '&nbsp;<a href="javascript:paginar(' . $i - 1 . ',' . $paginas . ',' . $quant_resul . ')">' . $i . '</a>&nbsp;';
        }
        if (($i + 1) == ($pagina + 1) and ($i + 1) != $paginas and $i != $paginas) {
            echo '&nbsp;<a href="javascript:paginar(' . ($i) . ',' . $paginas . ',' . $qtde_resultados . ')">' . ($i + 1) . '</a>&nbsp;...';
        }
    }
    // verificando novamente se existe apenas a primeira página, se so existir ela é impresso o botão proximo desativado
    if ($paginas == 1) {
        echo "";
        echo "<font  color=#CCCCCC>próximo &raquo;</font>";
    }
    //verificando se a página atual é diferente  da ultima página se for diferente ele imprime a ultima página e ativa o botão próximo
    elseif ($pagina < $paginas) {
 
        echo '&nbsp;<a  href="javascript:paginar(' . ($paginas - 1) . ',' . $paginas . ',' . $qtde_resultados . ')">' . $paginas . '</a>';
        echo '&nbsp;<a href="javascript:paginar(' . ($pagina) . ',' . $paginas . ',' . $qtde_resultados . ')"><b>próximo &raquo;</b></a>&nbsp;';
    }
    // se o sistema estiver na ultima página o indicador é setado na página e o botão próximo é desativado
    else {
        echo "&nbsp;<span class='pgoff'>[" . $paginas . "]</span>&nbsp;";
        echo "<font  color=#CCCCCC>próximo &raquo;</font>";
    }
 
echo "<div><br>";
?>
        
        
        
        
        <table  id="myTable" >
            <thead>
                <tr>                    
                    <th>id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Sexo</th>
                </tr>
            </thead>
            <tbody>
                <tr class='clickable-row' data-href='url://site/painel.html'>
                    <td>1</td>
                    <td>Gustavo</td>
                    <td>programador.gustavo@gmail.com</td>
                    <td>Masculino</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Adriane</td>
                    <td>adri@gmail.com</td>
                    <td>Feminino</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Bruno</td>
                    <td>bruno@yahoo.com</td>
                    <td>Masculino</td>
                </tr>
                
                <?PHP
                    while ($row = mysql_fetch_array($result)) {
                              echo '  <tr>
                                                <td>' . $row['codigo'] . '</td>
                                                <td>' . $row['solicitante'] . '</td>
                                                <td>' . $row['solicitante'] . '</td>
                                                <td>
<a href="editar.php?id=' . $row['codigo'] . '"><span class="glyphicon glyphicon-edit"></span> Editar</a>                 
                                                </td>
                                            </tr>
                                         ';
                                }
                                
                        ?>
                
                
            </tbody>
            <a data-toggle="modal" href="#registro01">Editar Registro 01</a>
<script>            
    $(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
    });
</script>
            
            
        </table>
        
        <script>
            $(document).ready(function() 
            { 
                $("#myTable").tablesorter(); 
            } 
        ); 
        </script>
         <!--Importa as bibliotecas necessárias-->
      
  
        <div class="modal fade" id="registro01">
    <div class="modal-dialog">
        <div class="modal-content">
	    <div class="modal-header">
		<button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
		<h1 class="modal-title">Registro</h4>
	    </div>
	    <div class="modal-body">
		<p>Conteúdo</p>
	    </div>
	</div>
    </div>
</div>
        
        
        
    </body>
</html>
