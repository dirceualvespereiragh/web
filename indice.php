<!-- <style type="text/css">
            #paginacao{font-family: Verdana, Arial, Helvetica; font-size: 14px;  }
            .pgoff {color: #FF0000; text-decoration: none}
            a.pg {color: #003366; text-decoration: none}
            a:hover.pg { color: #0066cc; text-decoration:underline}
        </style> -->
<?php
 
echo "<div id='paginacao'>";

echo '<ul class="pagination">';
  
//  <li><a href="#">1</a></li>
//  <li><a href="#">2</a></li>
//  <li><a href="#">3</a></li>
//  <li class="disabled"><a href="#">4</a></li>
//  <li><a href="#">5</a></li>

    
    //Verificando se estamos na primeira página se não estivetr ele imprime o botão de anterior e o numero da primeira página
    //Se não ele desativa o botão de anterior e seta o indicador na primeira página
    if ($pagina > 1) {
        echo '<li><a href="javascript:paginar(' . ($pagina - 2) . ',' . $paginas . ',' . $qtde_resultados . ')"> Anterior</a> </li>';
        echo '<li><a href="javascript:paginar(0,' . $paginas . ',' . $qtde_resultados . ')" >1</a> </li>';
    } else {
        echo '<li class="active"><a  href="#">1</a></li>';
    }
    // imprimindo as demais páginas
 
 
    for ($i = $pagina; $i <= ($pagina + 1); $i++) {
        //imprindo o botão da página antes da atual, ela necessita ser diferente da primeira página
        if (($i - 1) == ($pagina - 1) and ($i - 1) != 1 and ($i != 1)) {
           echo '<li><a href="javascript:paginar(' . ($i - 2) . ',' . $paginas . ',' . $qtde_resultados . ')" >' . ($i -1) . '</a> </li>';
        }
        // verificando se estamos na primeira página ou na ultima se estiver ele não imprime nada.
        if ($i == 1 or $i == $paginas or $i == $paginas) {
            echo"";
        }
        // se a página for igual a página atual ele seta o indicador na página e desativa o botão
        elseif ($pagina == $i) {
           echo '<li class="active"><a href="#" >' . ($i) . '</a> </li>';            
        }
        //imprimindo a página após a página atual,
        elseif ($i < $pagina) {
           echo '<li><a href="javascript:paginar(' . ($i - 1) . ',' . $paginas . ',' . $qtde_resultados . ')" >' . $i . '</a> </li>';      
        }
        if (($i + 1) == ($pagina + 1) and ($i + 1) != $paginas and $i != $paginas) {
           echo '<li><a href="javascript:paginar(' . ($i) . ',' . $paginas . ',' . $qtde_resultados . ')" >' . ($i+1) . '</a> </li>';      
            
        }
    }
    // verificando novamente se existe apenas a primeira página, se so existir ela é impresso o botão proximo desativado
    if ($paginas == 1) {
        echo "";
        echo "<font  color=#CCCCCC>próximo &raquo;</font>";
    }
    //verificando se a página atual é diferente  da ultima página se for diferente ele imprime a ultima página e ativa o botão próximo
    elseif ($pagina < $paginas) {
        echo '<li><a href="javascript:paginar(' . ($paginas-1) . ',' . $paginas . ',' . $qtde_resultados . ')" >' . ($paginas) . '</a> </li>';      
        echo '<li><a href="javascript:paginar(' . ($pagina) . ',' . $paginas . ',' . $qtde_resultados . ')" >Próximo </a> </li>';      
 
    }
    // se o sistema estiver na ultima página o indicador é setado na página e o botão próximo é desativado
    else {
        echo "&nbsp;<span class='pgoff'>[" . $paginas . "]</span>&nbsp;";
        echo "<font  color=#CCCCCC>próximo &raquo;</font>";
    }
echo '</ul>'; 
echo "<div>";
?>