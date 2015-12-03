<?php
  // recebendo conteudo da página anterior, que vêm através do método post
  $pagina = $_POST['pagina'];
  $qtde_resultados = $_POST['qtde_resultados'];
  $paginas = $_POST['paginas'];
  $pagina++;
?>

<!-- impresão dos valores que serão trocados dentro da DIV dados-->
<?php
    //incluindo a página de índice ela é responsável por imprimir os valores das páginas e seus link's.
    include 'indice.php';
    include 'tabelachamados.php';

?>

