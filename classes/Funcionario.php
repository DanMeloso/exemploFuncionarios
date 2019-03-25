<?php


class Funcionario{

    public $id;
    public $nome;
    public $nome_resumido;
    public $nacionalidade_id;

    public function __construct($id = false)
    {
        if ($id){
            $this->id = $id;
            $this->carregar();
        }
    }

    public function carregar(){
        $query = "SELECT nome, nome_resumido, nacionalidade_id FROM funcionarios WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id',$this->id);
        $stmt->execute();
        $linha = $stmt->fetch();

        $this->nome = $linha['nome'];
        $this->nome_resumido = $linha['nome_resumido'];
        $this->nacionalidade_id = $linha['nacionalidade_id'];
    }

    public static function listar(){

        $query = "SELECT id,nome,nome_resumido FROM funcionarios";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function inserir(){
        $query = "INSERT INTO funcionarios (nome, nome_resumido, nacionalidade_id) 
                  VALUES (:nome, :nome_resumido, :nacionalidade_id)";

        $conexao = Conexao::pegarConexao();

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':nome_resumido', $this->nome_resumido);
        $stmt->bindValue(':nacionalidade_id', $this->nacionalidade_id);
        $stmt->execute();
    }

    public function alterar(){
        $query = "UPDATE funcionarios SET nome = :nome, nome_resumido = :nome_resumido, nacionalidade_id = :nacionalidade_id WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id',$this->id);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':nome_resumido', $this->nome_resumido);
        $stmt->bindValue(':nacionalidade_id', $this->nacionalidade_id);
        $stmt->execute();
    }

    public function excluir(){
        $query = "DELETE FROM funcionarios WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id',$this->id);
        $stmt->execute();
    }
}