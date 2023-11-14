<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  type="text/css" rel="stylesheet" href="app/view/template/index.css">
    <title>Document</title>
</head>
<body>
    <h1>Sectavaveur</h1>
    <button><a href="app/view/page/connexion.php">login</a></button>
    <button><a href="/addcar">addcar</a></button>
    <input type="text" id="input">
    <?php 
        require_once 'app/database/connect.php';
        require_once 'app/database/initbdd.php';
        require_once 'router.php';
        connectBdd();
        init();
        routing();
    ?> 
</body>
</html>
