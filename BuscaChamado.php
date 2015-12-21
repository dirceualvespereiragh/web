<?php
   require 'autoload.php';
   require 'seguranca.php';

   use Entidade\Chamados;
  $DataInicial = $_POST['DataBuscaInicio'];
  $DataFinal   = $_GET['DataBuscaFim'];



   $Registros = Chamados::GraficoTipoChamado($DataInicial,$DataFinal);
      
   echo $DataInicial;
?>

  







