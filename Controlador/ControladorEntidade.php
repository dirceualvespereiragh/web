<?php
namespace Controlador;

use Entidade\Professor;
use Entidade;

require '..' . DIRECTORY_SEPARATOR . 'autoload.php';

class ControladorEntidade
{
    private $requisicao = NULL;
    private $dados = NULL;
    private $destino = '../aplicativos.php';
    
    public function despachar(array $requisicao, array $dados)
    {
        $this->requisicao = $requisicao;
        $this->dados = $dados;
        $metodo = $requisicao['metodo'];
        $this->$metodo();
        header('Location: ' . $this->destino);
    }
    
    private function getEntidade()
    {
        return 'Entidade\\' . 
        ucfirst($this->requisicao['cadastro']);
    }
    
    
    private function apagar()
    {
        $class = $this->getEntidade();
        call_user_func(array($class,'apagar'),$this->requisicao['chave']);        
    }
    
    private function gravar()
    {
        $class = $this->getEntidade();
        call_user_func(array($class,'gravar'),$this->dados);       
    }
    
    private function gerenciarDisciplinas()
    {
        $operacao = isset($this->dados['adicionar']) ? 
        'adicionar'
        : (isset($this->dados['remover']) ? 'remover' : NULL);
        
        $codigoDisciplina = 
        isset($this->dados['codigo_disciplina']) ?
        $this->dados['codigo_disciplina'] : NULL;
        $codigoProfessor = isset($this->dados['codigo_professor']) ?
                $this->dados['codigo_professor'] : NULL;
        
        if ($operacao == 'adicionar')
            Professor::
            adicionarDisciplina($codigoDisciplina,$codigoProfessor);
        if ($operacao == 'remover')
            Professor::
            removerDisciplina($codigoDisciplina, $codigoProfessor);
        
        $this->destino = '/developer7/form_professor.php?chave=' .
            $codigoProfessor;        
    }      


 private function login()
    {
        $usuario = isset($this->dados['usuario']) ?
        $this->dados['usuario'] : '';
        $senha = isset($this->dados['senha']) ?
        $this->dados['senha'] : '';

        $pdo = Entidade\EntidadeAbstrata::getPdo();
        
        $sql = <<<SQL
        SELECT * FROM usuario WHERE usuario = :usuario AND
        senha = :senha 
SQL;
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':senha', ($senha));
        //md5
        $stmt->execute();
        
        $resultSet = $stmt->fetch();
        
        // não autenticou
        if (empty($resultSet))
        {
             $this->destino = '../index.html';
        }
        else 
       {
            $_SESSION['usuario'] = $usuario ;    
        }             
    }
    
    private function logout()
    {
        session_destroy();
        $this->destino = '../index.php';
    }
    
    
    
    
}

session_start();

$controladorEntidade = new ControladorEntidade();
$controladorEntidade->despachar($_GET,$_POST);
