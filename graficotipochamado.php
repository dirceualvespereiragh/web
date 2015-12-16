<?php
   require 'autoload.php';
   require 'seguranca.php';

   use Entidade\Chamados;
  $DataInicial = $_POST['DataInicial'];
  $DataFinal   = $_POST['DataFinal'];



   $Registros = Chamados::GraficoTipoChamado($DataInicial,$DataFinal);

   $Separador = "";
echo '<canvas  style="padding-left:15px;"  id="cvs" width="780" height="450"  > [No canvas support] </canvas>';
echo "<script>";
  


   echo "var labels = [";
   foreach($Registros as $record)
   {   
      echo  $Separador . "'" . $record['Tipo'] . "-" . $record['Qtde'] . "'" ; 
      $Separador = ",";   
   }
   echo "];";

   $Separador = "";
   echo "var hints = [";
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
   echo "      strokestyle: '#e8e8e8',   ";
   echo "      variant: 'pie3d', ";
   echo "      title: 'Chamados ',";
   echo "      titleY: 30,         ";
   echo "      key: labels,";
   echo "      keyInteractive: true,
               keyPositionY: 350,
               keyPositionX: 440,
               keyRounded: false, ";
   echo "      linewidth: 2,  ";
   echo "      shadowOffsetx: 0,  ";
   echo "      shadowOffsety: 15,  ";
   echo "      shadowColor: '#aaa',  ";
   echo "      exploded: 10,  ";
   echo "      radius: 80,";
//   echo "      labels: labels,     ";
//   echo "      labelsSticks: true,";
//   echo "      labelsSticksLength: 15 ,";
   echo "      eventsClick: DetalheTipoChamado, ";
   echo "      eventsMousemove: function (e, shape) {e.target.style.cursor = 'pointer';}";
   echo "  }                                ";
   echo "}).draw();                         ";
echo "</script>";
?>

  







