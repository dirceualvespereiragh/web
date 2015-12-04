<?php
   $posicao =  (isset($_GET['posicao']) ? $_GET['posicao'] : 1);
   header("Content-Type: application/json; charset=8859-1");
   include 'parametros.php';

   $result = mysql_query("select count(codigo) as total FROM chamados where posicao = " . $posicao  );

   $outp = "[";
   while($rs = mysql_fetch_array($result)) {
      if ($outp != "[") {$outp .= ",";}
      $outp .= '{"TotalChamados":"'  . $rs["total"]   . '"}'; 
   }
   $outp .="]";

   echo($outp);
?>
