<?php

class Nacionalidade{

    public $id;
    public $nome;

    public static function listar()
    {
        $query = "SELECT id, nome FROM nacionalidades ORDER BY id";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function inserir($pegaId = false){
        $query = "INSERT INTO nacionalidades (nome) VALUES (:nome)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome',$this->nome);
        $stmt->execute();

        if ($pegaId){
            $query = "SELECT id,nome FROM nacionalidades WHERE nome = :nome";
            $conexao = Conexao::pegarConexao();
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(':nome',$this->nome);
            $stmt->execute();
            $linha = $stmt->fetch();

            $this->id = $linha['id'];
            $this->nome = $linha['nome'];
        }
    }

    public function buscar(){
        $query = "SELECT id,nome FROM nacionalidades WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id',$this->id);
        $linha = $stmt->fetch();

        $this->id = $linha['id'];
        $this->nome = $linha['nome'];
    }
}