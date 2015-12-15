<?php
   require 'autoload.php';
   require 'seguranca.php';

   use Entidade\Chamados;
   //         $class = 'Entidade\\' .ucfirst($_GET['cadastro']);
//            $entidade = call_user_func(array($class,'get'),isset($_GET['chave']) ? $_GET['chave'] : NULL); 
//            $method = 'get' . ucfirst(call_user_func(array($class,'getChave')));
  $DataInicial = $_POST['DataInicial'];
  $DataFinal   = $_POST['DataFinal'];



   $Registros = Chamados::GraficoTipoChamado($DataInicial,$DataFinal);

   $Separador = "";
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
   echo "    tooltips: labels,              ";
   echo "    labels: hints,                 ";
   echo "    shadow: false,                 ";
   echo "    strokestyle: 'rgba(0,0,0,0)',  ";
   echo "    exploded: 3                    ";
   echo "  }                                ";
   echo "}).draw();                         ";
?>

