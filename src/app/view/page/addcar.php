<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="addcarbdd.php" method="post">
        <input type="text" id="inputmarque" placeholder="marque">
        <input type="text" id="inputcouleur" placeholder="couleur">
        <input type="text" id="inputplace" placeholder="place">
        <input type="text" id="inputprix" placeholder="prix">
        <input type="text" id="inputville" placeholder="ville">
        <input type="submit" value="Submit">
        <?php 
            require_once '../../addcarbdd.php';
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $marque = $_POST["inputmarque"];
                    $couleur = $_POST["inputcouleur"];
                    $place = $_POST["inputplace"];
                    $prix = $_POST["inputprix"];
                    $ville = $_POST["inputville"];
                    addCarBdd($marque, $couleur, $place, $prix, $ville);
                }
        ?>
    </form>
</body>
</html>