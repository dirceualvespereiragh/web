<?php
   require 'autoload.php';
   require 'seguranca.php';

   use Entidade\Chamados;
   $Texto            = $_POST['Texto'];
   $DataInicial      = $_POST['DataInicial'];
   $DataFinal        = $_POST['DataFinal'];
   $pagina           = $_POST['pagina'];
   $qtde_resultados  = 25;

   $where            = " ( (QUEIXA LIKE '%" . $Texto . "%') OR (QUEIXA LIKE '%" . $Texto . "%') )";
   if ( (isset($DataInicial))  and  (isset($DataFinal)) ) {
      if ( ($DataInicial != '' )  and  ( $DataFinal != '') )  {
         $where .= ' and  (dt_abertura BETWEEN  ' . '"' . $DataInicial . ' 00:00:01"' . ' AND ' . '"' . $DataFinal . ' 23:55:55"' .' )';
      }   
   }
    /*    throw new \Exception($where);  */
   $paginas  = Chamados::quantos('',$where);

   include 'indice.php'; 
   include 'tabelachamados.php'; 
?>

  






