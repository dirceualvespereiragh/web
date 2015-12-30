<?php
   require 'autoload.php';
   require 'seguranca.php';

   use Entidade\Chamados;
   $Texto            = $_POST['Texto'];
   $DataInicial      = $_POST['DataInicial'];
   $DataFinal        = $_POST['DataFinal'];
   $Tipo             = $_POST['Tipo'];
   $pagina           = $_POST['pagina'];
   $qtde_resultados  = 25;

   $where            = "  (QUEIXA LIKE '%" . $Texto . "%') ";
   if ( (isset($DataInicial))  and  (isset($DataFinal)) ) {
      if ( ($DataInicial != '' )  and  ( $DataFinal != '') )  {
         $where .= ' and  (dt_abertura BETWEEN  ' . '"' . $DataInicial . ' 00:00:01"' . ' AND ' . '"' . $DataFinal . ' 23:55:55"' .' )';
      }   
   }
   if  (isset($Tipo) ) {
      if ( ($Tipo != '' )  )  {
         $where .= ' and  (estatistica =  ' . '"' . $Tipo .'" )';
      }   
   }

     /*  throw new \Exception($where);   */
   $paginas  = Chamados::quantos('',$where);
  if (  !(isset($where)) ) {
       $where = '';
   }
   if (  !(isset($posicao)) ) {
       $posicao = '';
   }
   include 'indice.php'; 
   include 'tabelachamados.php'; 
?>

  






