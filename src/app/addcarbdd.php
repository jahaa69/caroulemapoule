<?php 

require_once 'connect.php';

function addCarBdd(){
    try {
        $sql = "INSERT INTO car (marque, couleur, place, prix, ville) VALUES ('$marque', '$couleur', '$place', '$prix', '$ville')";
        $connexion = connectBdd();
        $connexion->exec($sql);
        echo "Voiture ajouté avec succès!";
    } catch (PDOException $e) {
        echo "Erreur d'ajout de voiture: " . $e->getMessage();
    }
}
?>