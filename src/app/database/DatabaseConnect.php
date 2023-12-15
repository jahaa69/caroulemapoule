<?php
namespace Database;

use PDO;

class DataBaseConnect
{
    public PDO $conn;

    public function connectBdd(): \PDO
    {
        $dsn = 'mysql:host=172.30.173.120;dbname=my_database';
        $username = 'my_user';
        $password = 'my_password';
        try {
            $bdd = new \PDO($dsn, $username, $password);
            return $bdd;
        } catch (\PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }

    public function __construct()
    {
        $this-> conn = $this->connectBdd();
    }
}
