<?php 
require_once 'connect.php';

function createtable(){
    $dbh = connectBdd();
    $sql = "CREATE TABLE IF NOT EXISTS user (
        id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(255) NOT NULL,
        prenom VARCHAR(255) NOT NULL,
        age INT(255) NOT NULL,
        mail VARCHAR(255),
        tel Int(255),
        )";
    $dbh->exec($sql);
    echo "Table MyGuests created successfully";
}
// Fermeture de la connexion
$mysqli->close();
?>