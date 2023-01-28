<?php
// configurações de conexão
const databaseHost = 'localhost:3306';
const databaseUsername = 'root';
const databasePassword = '';
const databaseName = 'abl2';

class DB
{
    protected $connection;
    public $PDO;
// Conexão com o Banco

    public function __construct(){
        $this->connect();
    }

    public function connect()
    {
        try {
            $this->PDO = new PDO("mysql:host=" . databaseHost . ';dbname=' . databaseName, databaseUsername, databasePassword);
        } catch (Exception $e) {
            echo 'ERRO MYSQL: ' . $e->getMessage();
        }
    }
}

?>
