<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>login</h1>
    <div class="squareLR">
        <form action="adduser.php" method="post">
            <div class="register">register
                <input type="text" name="inputnom" placeholder="nom" required >
                <input type="text" name="inputprenom" placeholder="prenom" required>
                <input type="int" name="inputage" placeholder="age" required>
                <input type="text" name="inputmail" placeholder="mail" required>
                <input type="text" name="inputtel" placeholder="numero_tel" required>
                <input type="submit" value="Submit">
                <?php 
                    require_once '../adduser.php';
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $name = $_POST["inputnom"];
                            $prenom = $_POST["inputprenom"];
                            $age = $_POST["inputage"];
                            $mail = $_POST["inputmail"];
                            $tel = $_POST["inputtel"];
                            adduser($name, $prenom, $age, $mail, $tel);
                        }
                ?>
            </div>
            
        </form>
        <div class="login">login</div>
    </div>
</body>
</html>
