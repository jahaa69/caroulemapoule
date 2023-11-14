<?php 
require_once 'connect.php';

function adduser($name, $prenom, $age, $mail, $tel){
    try {
        $sql = "INSERT INTO user (nom, prenom, age, mail, numero_tel) VALUES ('$name', '$prenom', '$age', '$mail', '$tel')";
        $connexion = connectBdd();
        $connexion->exec($sql);
        echo "Utilisateur ajouté avec succès!";
    } catch (PDOException $e) {
        echo "Erreur d'ajout d'utilisateur: " . $e->getMessage();
    }
}

//récupérer les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["inputnom"];
    $prenom = $_POST["inputprenom"];
    $age = $_POST["inputage"];
    $mail = $_POST["inputmail"];
    $tel = $_POST["inputtel"];
    adduser($name, $prenom, $age, $mail, $tel);
}
?>
