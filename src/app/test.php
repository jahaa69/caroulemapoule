<?php 
    require_once 'connect.php';

    function getuser(){
        //recuperer les données de la bdd et les afficher
        $sql = "SELECT * FROM user";
        $connectBdd = connectBdd();
        $result = $connectBdd->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                echo $row["nom"] . " " .$row["prenom"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }
