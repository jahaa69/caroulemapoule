<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hello</h1>
    <button><a href="/app/view/page/connexion.php">login</a></button>
    <button><a href="/app/view/page/addcar.php">addcar</a></button>
    <input type="text" id="input">
    <?php 
        require_once 'app/connect.php';
        require_once 'app/test.php';
        getuser();
        connectBdd();
    ?>
</body>
</html>