<?php
    require_once "config.php";

class Conexao
{
    public static function pegarConexao(){
        $conexao = new PDO(DB_DRIVE .':SERVER=' . DB_HOSTNAME . ';DATABASE=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $conexao;
    }
}