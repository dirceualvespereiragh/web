<?php
   //conexão com o banco de dados
   // Servidor AP
   //$conn = new mysqli("localhost", "root", "apgold", "phpnuke");
   //notebook
   //$conn = new mysqli("localhost", "root", "", "phpnuke");
// Estou testanto novo jeito de conexao
$conn = mysql_connect("localhost", 'root', '');
mysql_select_db('phpnuke');

mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conn);


?>

