<?php 
require_once 'connect.php';

function createtableUser(){
$bdd = connectBdd();
$sql = "CREATE TABLE IF NOT EXISTS user (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    tel VARCHAR(30) NOT NULL,
    age INT(6) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($bdd->exec($sql) === false) {
    print_r($bdd->errorInfo());
} else {
    echo "Table user created successfully";
}

}
?>