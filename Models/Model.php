<?php
/*
 * Classe filha de todas as Models
 * aqui fica os metodos e propriedades que usamos em todas as Model
 * aqui fica a conexão com o servidor de banco de dados
 * MODIFICAR VARIAVEIS: $username, $password, $servidor PARA CONEXAO COM O SERVIODR 
*/

namespace Models;


class Model
{
    protected object $PDO;
    protected $username, $password, $servidor, $port, $banco, $caminhoMysql;
    function __construct()
    {
        $this->banco = "db_clubedophp";

        //VARIAVEIS DE CONFIGURAÇÃO DO BANCO
        $this->username = "root";
        $this->password = "";
        $this->servidor = "localhost";
        $this->port = "3306";

        try {
            $this->PDO = new \PDO('mysql:host=' . $this->servidor . ':' . $this->port . ';dbname='.$this->banco, $this->username, $this->password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->PDO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo $e;
        }
    }
}
