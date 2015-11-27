<?php
// recebndo conteudo da página anterior, que vêm através do método post
$pagina = $_POST['pagina'];
$qtde_resultados = $_POST['qtde_resultados'];
$paginas = $_POST['paginas'];
// calculando onde o limit deve começar no Select
$start = $pagina * $qtde_resultados;
$pagina++;
 
 
//conexão com o banco de dados
//$conn = mysql_connect("localhost", 'root', '');
//mysql_select_db('phpnuke');
include 'json/parametros.php';
 
 
// select com os limites definidos (inicio e quantidade de resultados)
$result = mysql_query("SELECT * FROM chamados order by dt_abertura desc limit " . $start . " , " . $qtde_resultados);
?>

<!-- impresão dos valores que serão trocados dentro da DIV dados-->
<?php
    //incluindo a página de índice ela é responsável por imprimir os valores das páginas e seus link's.
    include 'indice.php';
    include 'tabelachamados.php'
?>

