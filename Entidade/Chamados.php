<?php
namespace Entidade;

class Chamados extends EntidadeAbstrata
{
    protected $codigo;
    protected $queixa;
    protected $cliente;
    protected $tipo;
    protected $pendente;
    protected $solicitante;
    protected $responsavel;
    
    protected static $tabela = 'chamados';

    public static function getChave()
    {
        return 'codigo';
    }
        
    public static function quantos()
    {
        $resultSet = self::getPdo()->query('SELECT COUNT(codigo)  AS total FROM  chamados');
        
        $records = $resultSet->fetchColumn(0); 
            
        return $records;
    }

    public static function listar($pagina,$qtde_resultados_por_pagina,$paginas,$posicao)
    {
        // calculando onde o limit deve começar no Select
        $inicio = ($pagina-1) * $qtde_resultados_por_pagina;
        
        $pdo = self::getPdo();
        $pdo->query("SET NAMES 'utf8'"); 
        
        $resultSet = $pdo->query('SELECT codigo,queixa,nome_cons as cliente,estatistica as tipo,pendente,solicitante FROM '. static::$tabela . ' WHERE POSICAO = ' . $posicao . ' order by dt_abertura desc limit ' . $inicio . ' , ' . $qtde_resultados_por_pagina ); 
        
        $records = $resultSet->fetchAll();
    
        $html = '';
    
        $chave = static::getChave();
    
        $cadastro = lcfirst(str_replace('Entidade\\','',get_called_class()));
        
        
        foreach($records as $record)
        {
            $html .= <<<BLOCO
            <script type="text/javascript">
	                     $(document).ready(function(){
		                 $("#LinkLinhaChamado a").click(function( e ){
                			   e.preventDefault();
			                   var href = $( this ).attr('href');
                			   $("#miolo").load( href +" #miolo");
                         })

                     }); 
            </script>    

            
            <tr>
               <td id="LinkLinhaChamado">
                  <a href="EditarChamado.php?cadastro=$cadastro&chave={$record[$chave]}"> <span class="glyphicon glyphicon-edit"></span>  {$record[$chave]}</a>
               </td>
               <td>{$record['solicitante']}</td>               
               <td>{$record['queixa']}</td>
            </tr>
BLOCO;
        }

        return $html;
    }
    
    public static function AlimentarComboBox($ItemParaSelecionar)
    {        
        $pdo = self::getPdo();
        $pdo->query("SET NAMES 'utf8'"); 
        
        $resultSet = $pdo->query('SELECT codigo,secretaria as nome FROM cliente order by secretaria');       

        $records = $resultSet->fetchAll();
    
        $html = '<option>Selecione o Cliente</option>'; 
    
        foreach($records as $record)
        {   
           if  ( $record['nome'] == $ItemParaSelecionar ) {
              $html .= "'<option value='{$record['nome']}'  selected> {$record['nome']} </option>'"; 
           } else {
              $html .= "'<option value='{$record['nome']}'  > {$record['nome']} </option>'"; 
           }
            
        }
        
      
        return $html;
     }  
}

?>