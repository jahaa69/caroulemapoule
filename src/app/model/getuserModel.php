<?php 
    require_once 'app/database/connect.php';

    function getuser(){
        //recuperer les données de la bdd et les afficher
        $sql = "SELECT * FROM user";
        $connectBdd = connectBdd();
        $result = $connectBdd->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                echo $row["name"] . " " .$row["lastname"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }
