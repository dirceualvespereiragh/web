<?php
   header("Content-Type: application/json; charset=8859-1");
   require_once('conexao.php'); 
   $pdo = Conectar(); 
   $codigo =  $_GET['codigo'];
   $sql = 'select * FROM chamados where codigo = ' . $codigo ; 
   $stm = $pdo->prepare($sql); $stm->execute(); 
   sleep(1); 
   echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC)); 
   $pdo = null;	
?>

