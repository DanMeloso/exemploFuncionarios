<?php
require_once 'global.php';

try{
    $nome = $_POST['nome'];
    $nome_resumido = $_POST['nome_resumido'];
    $nacionalidade_id = $_POST['nacionalidade_id'];

    $funcionario = new Funcionario();

    $funcionario->nome = $nome;
    $funcionario->nome_resumido = $nome_resumido;
    $funcionario->nacionalidade_id = $nacionalidade_id;

    $funcionario->inserir();

    header("Location: funcionarios.php");
} catch (Exception $e){
    echo Erro::trataErro($e);
}