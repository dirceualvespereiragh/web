<?php
function Conectar(){
        try{ 
            $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'); 
            $con = new PDO("mysql:host=localhost; dbname=phpnuke;", "root", "", $opcoes);
            return $con;
        } catch (Exception $e){
                echo 'Erro: '.$e->getMessage();
                return null; 
        } 
} 
?>
