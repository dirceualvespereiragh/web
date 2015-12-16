<?php
   require 'autoload.php';
   require 'seguranca.php';

   use Entidade\Chamados;
  $DataInicial = $_POST['DataInicial'];
  $DataFinal   = $_POST['DataFinal'];



   $Registros = Chamados::GraficoTipoChamado($DataInicial,$DataFinal);

   $Separador = "";
echo '<canvas  style="padding-left:55px;"  id="cvs" width="580" height="350"  > [No canvas support] </canvas>';
echo "<script>";

   echo "var hints = [";
   foreach($Registros as $record)
   {   
      echo  $Separador . "'" . $record['Tipo'] . "'" ; 
      $Separador = ",";   
   }
   echo "];";

   $Separador = "";
   echo "var labels = [";
   foreach($Registros as $record)
   {   
      echo  $Separador . "'" . $record['Qtde'] . "'" ; 
      $Separador = ",";   
   }
   echo "];";

   $Separador = "";
   echo "var dados = [";
   foreach($Registros as $record)
   {   
      echo  $Separador . $record['Qtde'] ; 
      $Separador = ",";   
   }
   echo "];";
   echo "var pie = new RGraph.Pie({         ";
   echo "  id: 'cvs',                       ";
   echo "  data: dados ,                    ";
   echo "  options: {                       ";
   echo "    tooltips: hints,              ";
   echo " key: ['Folha: 34%','SagAPa: 28%' ],";
   echo "    labels: hints,                 ";
   echo "    shadow: false,                 ";
   echo "    strokestyle: 'rgba(0,0,0,0)',  ";
   echo "    exploded: 3                    ";
   echo "  }                                ";
   echo "}).draw();                         ";
echo "</script>";
?>

