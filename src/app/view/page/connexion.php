<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  type="text/css" rel="stylesheet" href="../template/login.css">
    <title>Document</title>
</head>
<body>
    <h1 class="title">login</h1>
    <div class="squareLR">
        <form action="adduser.php" method="post">
            <div class="form">    
            <div class="register">register
                    <input type="text" name="inputnom" placeholder="nom" required class="input" >
                    <input type="text" name="inputprenom" placeholder="prenom" required class="input">
                    <input type="int" name="inputage" placeholder="age" required class="input">
                    <input type="text" name="inputmail" placeholder="mail" required class="input">
                    <input type="text" name="inputtel" placeholder="numero_tel" required class="input">
                    <input type="text" name="inputpassword" placeholder="mot de passe" required class="input">
                    <input type="submit" value="Submit">
                </div>
                <?php 
                    require_once __DIR__.'/../../router/router.php';
                ?>
            </div>
        </form>
        <div class="login">login</div>
    </div>
</body>
</html>
