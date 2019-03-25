<?php
require_once 'global.php';

try{
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $nome_resumido = $_POST['nome_resumido'];
    $nacionalidade_id = $_POST['nacionalidade_id'];

    $funcionario = new Funcionario($id);

    $funcionario->id = $id;
    $funcionario->nome = $nome;
    $funcionario->nome_resumido = $nome_resumido;
    $funcionario->nacionalidade_id = $nacionalidade_id;

    $funcionario->alterar();

    header("Location: funcionarios.php");

} catch (Exception $e){
    echo Erro::trataErro($e);
}


