<?php
namespace Entidade;

abstract class EntidadeAbstrata
{
    /**
     *
     * @var \PDO
     */
    protected static $pdo = NULL;
    
    protected static $tabela = NULL;
    
    protected static $form = 'form.php';
    

    /**
     * get/set genéricos
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, array $args)
    {
        $prefix = substr($method,0,3);
        if ($prefix == 'get')
        {
            $attribute = lcfirst(substr($method,3));
            return $this->$attribute;
        }
        if ($prefix == 'set')
        {
            $attribute = lcfirst(substr($method,3));
            $this->$attribute = $args[0];
            return $this;
        }
    }    
    
    abstract public static function getChave();
    
    public static function getPdo()
    {
        if (self::$pdo == NULL)
        {
                      
            self::$pdo = new \PDO('mysql:dbname=phpnuke; host=localhost', 'root', '');
        #   self::$pdo = new \PDO('mysql:dbname=ape_base;host=localhost','ape_mysql', 'bjj*34jb');
        #     self::$pdo = new \PDO('mysql:dbname=ape_base;host=localhost','ape_mysql', 'apgold');
     #        self::$pdo = new \PDO('mysql:dbname=phpnuke;host=localhost','root', 'apgold'); #192.168.0.50
        }
        return self::$pdo;
    }
    
    public static function listar()
    {
        $resultSet = self::getPdo()->query('SELECT * FROM '. static::$tabela);       

    
        $records = $resultSet->fetchAll();
    
        $html = '';
    
        $chave = static::getChave();
        
        $cadastro = lcfirst(
            str_replace('Entidade\\','',get_called_class()));
    
        $form = static::$form;
        
        foreach($records as $record)
        {
            $html .= <<<BLOCO
            <tr>
            <td>
            <a href="$form?cadastro=$cadastro&chave={$record[$chave]}">
            {$record[$chave]}</a>
            </td>
            <td>{$record['nome']}</td>
            <td>
            <a href="Controlador/ControladorEntidade.php?metodo=apagar&cadastro=$cadastro&chave={$record[$chave]}">
            Excluir</a>
            </td>
            </tr>
BLOCO;
        }
        return $html;
    }
    
    
    public static function get($chave)
    {
        $nomeChave = static::getChave();
    
        $nome = '';
        
        $cadastro = static::$tabela;
    
        if (!is_null($chave)){
            $pdo = self::getPdo();
            $pdo->query("SET NAMES 'utf8'"); 
            
            $resultSet = $pdo->query(
                "SELECT * FROM $cadastro WHERE $nomeChave=$chave");

            if ($cadastro=="chamados") {
                 $registro =  $resultSet->fetch();
                 $queixa      = $registro[4];
                 $cliente     = $registro[13];
                 $tipo        = $registro[14];
                 $pendente    = $registro[15];
                 $solicitante = $registro[3];     
                 $responsavel = $registro[2];
            }
        }
        
        $class = get_called_class();
        $method = 'set' . ucfirst($nomeChave);
    
        $entidade = new $class();

        if ($cadastro=="chamados") {
            $entidade->$method($chave)->setQueixa($queixa);
            $entidade->$method($chave)->setCliente($cliente);
            $entidade->$method($chave)->setTipo($tipo);
            $entidade->$method($chave)->setPendente($pendente);
            $entidade->$method($chave)->setSolicitante($solicitante);
            $entidade->$method($chave)->setResponsavel($responsavel);
            if ($chave == 0) {
                $entidade->$method($chave)->setResponsavel( $_SESSION['usuario'] );
            }
        }        
        return $entidade;
    }
    
    
    /**
     *
     * @param array $dados
     */
    public static function gravar(array $dados)
    {
        
        $nomeChave = static::getChave();
        $chave = (integer) (isset($dados['chave']) ? $dados['chave'] : NULL);
        $cadastro = static::$tabela;
         
        if ($cadastro=="chamados") {
            $cliente     = isset($dados['cbClientes']) ? $dados['cbClientes'] : NULL; 
            $queixa      = isset($dados['queixa']) ? $dados['queixa'] : NULL; 
            $tipo        = isset($dados['tipo']) ? $dados['tipo'] : NULL; 
            $solicitante = isset($dados['solicitante']) ? $dados['solicitante'] : NULL; 
            $pendente    = isset($dados['cbpendente']) ? $dados['cbpendente'] : NULL; 
            if (! is_null($cliente)) {
                if (!empty($chave))  {
                    
                    $sql =
                    "UPDATE $cadastro SET 
                     nome_cons = '$cliente',queixa ='$queixa', estatistica = '$tipo' , solicitante ='$solicitante' , pendente = '$pendente'
                     WHERE $nomeChave=$chave";
                } else {
                    $sql =
                    "INSERT INTO $cadastro 
                     (nome_cons , queixa , estatistica , solicitante , pendente , dt_abertura) 
                     VALUES
                     ( '$cliente','$queixa','$tipo','$solicitante','$pendente',now())";
                }
                $pdo = self::getPdo();
                $pdo->query("SET NAMES 'utf8'"); 

                if ($pdo->exec($sql) === false) {
                    throw new \Exception('Não conseguiu gravar o registro' . $sql );

                }    
                      
            }
        }
        if (! is_null($nome)) {
            $sql = "INSERT INTO $cadastro (nome) values ('$nome')";
             
            if (!empty($chave)) {
                $sql =
                "UPDATE $cadastro SET queixa ='$queixa'
                WHERE $nomeChave=$chave";
            }
            
            if (self::getPdo()->exec($sql) === false) {
                throw new \Exception('Não conseguiu gravar o registro');
    
            }
        }
    }
    
    public static function apagar($chave)
    {
        $chave = (integer) $chave;
    
        $nomeChave = static::getChave();
        
        $cadastro = static::$tabela;
    
        self::getPdo()->
        exec("DELETE FROM $cadastro WHERE $nomeChave=$chave");
       
    }
    
    public static function getSelectOptions($value = NULL,
         $label = NULL, $sql = NULL)
    {
        $resultSet = self::getPdo()->query($sql);
    
        $html = '';
    
        foreach($resultSet as $record)
        {
            $html .=
            "<option value=\"{$record[$value]}\">
            {$record[$label]}</option>";
        }
        
        return $html;
    }
    
    /**
     * 
     * @param string | array $sql
     * @param string $mensagemDeErro
     * @throws \Exception
     */
    public static function executarSql($sql, 
        $mensagemDeErro)
    {
        $sql = (array) $sql;        
        
        self::getPdo()->beginTransaction();
        try {
            foreach($sql as $statement)
            {
                if (self::getPdo()->exec($statement) == FALSE)
                {
                    throw new \Exception($mensagemDeErro);
                }                
            }
            self::getPdo()->commit();
        } catch (Exception $e) {
            self::getPdo()->rollBack();
            $fileName = realpath(__DIR__ . '/..') .
            DIRECTORY_SEPARATOR . 'erro.log';
            if (!file_exists($filename))
            {
                $handle = fopen($filename,'a');
                fclose($handle);
            }
            $conteudo = file_get_contents($filename);
            file_put_contents($filename, $conteudo . "\n" .
                $e->getMessage());
        }        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

?>