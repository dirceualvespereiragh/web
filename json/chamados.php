<?php
   header("Content-Type: application/json; charset=8859-1");

   include 'parametros.php';

   $quantidade_registro_por_pagina =  $_GET['quantidade_registro_por_pagina']; 

   $result = $conn->query("select * FROM chamados limit 0 , " .  $quantidade_registro_por_pagina . " order by codigo desc" );

   $outp = "[";
   while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
      if ($outp != "[") {$outp .= ",";}
      $outp .= '{"Codigo":"'  . $rs["codigo"] . '",';
      $outp .= '"Solicitante":"'   . $rs["solicitante"]        . '",';
      $queixa = str_replace(array("\r", "\n"), '', $rs["queixa" ]);  
      $queixa =  str_replace('"' , '\"', $queixa);  
      $outp .= '"Queixa":"'. $queixa   . '"}'; 
   }
   $outp .="]";

   $conn->close();

   echo($outp);
?>