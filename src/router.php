<?php
function routing(){
    $routes = array(
        "connexion" => "connexion.php",
        "addcar" => "addcar.php",
        "adduser" => "adduser.php",
        "index" => "index.php"
    );

    $url = $_SERVER['REQUEST_URI'];
    $url = explode("/", $url);
    $url = array_filter($url);

    // Le chemin réel est probablement après le premier élément vide
    $url = array_values($url);

    // Le premier segment est le contrôleur
    $controller = (!empty($url[1])) ? $url[1] : 'index';

    if (array_key_exists($controller, $routes)){
        echo "Chemin du contrôleur : " . $controller . "<br>";
        require_once "app/view/page/{$routes[$controller]}";
    }
}

// Appel de la fonction de routage
routing();
?>
