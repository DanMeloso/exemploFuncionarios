<?php require_once 'global.php';

    $nome = $_POST['nacionalidade'];

    $nacionalidade = new Nacionalidade();
    $nacionalidade->nome = $nome;
    $nacionalidade->inserir(true);
    //$nacionalidade->buscar();

    echo $nacionalidade->id . ';' . $nacionalidade->nome;


