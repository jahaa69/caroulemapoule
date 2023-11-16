<?php
require_once __DIR__.'../../controllers/homecontroller.php';
require_once __DIR__.'../../controllers/connexioncontroller.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

echo __DIR__;


switch ($uri) {
          case '/home':
                    $controller = new HomeController();
                    $controller->index();
                    break;

          case '/login':
                    $controller = new ConnexionController();
                    // if ($method === 'GET') {
                              $controller->index();
                    // } elseif ($method === 'POST') {
                    //           $authOk = $controller->login();
                    //           if ($authOk) {
                    //                     header('Location: /');
                    //           }
                    // }
                    //break;
                }