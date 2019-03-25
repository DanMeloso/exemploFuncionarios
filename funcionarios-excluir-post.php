<?php
require_once 'global.php';

try{
    $id = $_GET['id'];
    $funcionario = new Funcionario($id);
    $funcionario->excluir();

    header("Location: funcionarios.php");
}catch (Exception $e){
    echo Erro::trataErro($e);
}