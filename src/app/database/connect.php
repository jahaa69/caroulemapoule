<?php

function connectBdd(){
    $dsn = 'mysql:host=192.168.56.1;dbname=my_database';
    $username = 'my_user';
    $password = 'my_password';

    try {
        $dbh = new PDO($dsn, $username, $password);
        return $dbh;  // Renvoie l'objet PDO pour la connexion réussie
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
        return null;
    }
}
