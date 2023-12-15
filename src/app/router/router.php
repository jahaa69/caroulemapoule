<?php

namespace router;

use Controller\AdminController;
use Controller\CarController;
use Controller\HomeController;
use Controller\ConnexionController;

$uri = $_SERVER['REQUEST_URI'];

$explodedUri = explode('/', $uri);
$route = '/' . $explodedUri[1];
$id = isset($explodedUri[2]) ? intval($explodedUri[2]) :  null;
$method = $_SERVER['REQUEST_METHOD'];

session_start();
switch ($route) {
    case '/home':
        $controller = new HomeController();
        $controller->index();
        break;

    case '/register':
            if ($method === 'GET') {
                $controller = new ConnexionController();
                $controller->index();
            } elseif ($method === 'POST') {
                $controller = new ConnexionController();
                $controller->getFormUser();
            }
        break;

    case '/login':
        if ($method === 'GET') {
            $controller = new ConnexionController();
            $controller->loginpage();
        } elseif ($method === 'POST') {
            $controller = new ConnexionController();
            $controller->getFormUserLogin();
        }
        break;

    case '/admin':
        $controller = new AdminController();
        $controller->index();
        break;

    case '/loginA':
        if ($method === 'POST') {
            $controller = new AdminController();
            $controller->loginAdmin();
        }
        break;

    case '/adminMenu':
        if (!isset($_SESSION['id'])) {
            header('Location: /home');
        }
        $controller = new AdminController();
        $controller->adminMenu();
        break;

    case '/adminCar':
        if (!isset($_SESSION['id'])) {
            header('Location: /home');
        }
        if ($method === 'GET') {
            $controller = new AdminController();
            $controller->carData();
        } elseif ($method === 'POST') {
            $controller = new AdminController();
            $controller->createCar();
        }
        break;
    
    case '/admincharacteristic':
        if (!isset($_SESSION['id'])) {
            header('Location: /home');
        }
        if ($method === 'GET') {
            $controller = new AdminController();
            $controller->characteristicData();
        }
        break;

    case '/adminDeleteCar':
        if (!isset($_SESSION['id'])) {
            header('Location: /home');
        }
        $controller = new AdminController();
        $controller->deleteCar($id);
        break;

    case '/adminUpdateCar':
        if (!isset($_SESSION['id'])) {
            header('Location: /home');
        }
        $controller = new AdminController();
        if ($method === 'GET') {
            $controller->updateCar($id);
        } else if ($method === 'POST') {
            $controller->post_updateCar($id);
        }
        break;

    case '/resume':
        $controller = new CarController();
        $controller->carDetails($id);
        break;

    case '/allCar':
        $controller = new CarController();
        $controller->carList();

        break;

    case '/brandmodif':
        if (!isset($_SESSION['id'])) {
            header('Location: /home');
        }else if ($method === 'GET') {
            $controller = new AdminController();
            $controller->brandModif ();
        } else if ($method === 'POST') {
            $controller = new AdminController();
            $controller->getBrand();
        }
        break;
    case '/adminDeleteBrand':
        if (!isset($_SESSION['id'])) {
            header('Location: /home');
        }
        $controller = new AdminController();
        $controller->deleteBrand($id);
        break;

    case '/adminUpdateBrand':
        if (!isset($_SESSION['id'])) {
            header('Location: /home');
        }
        $controller = new AdminController();
        if ($method === 'GET') {
            $controller->updateBrand($id);
        } else if ($method === 'POST') {
            $controller->post_updateBrand($id);
        }
        break;

    case '/adminPlace':
        if (!isset($_SESSION['id'])) {
            header('Location: /home');
        }
        if ($method === 'GET') {
            $controller = new AdminController();
            $controller->placeModif();
        } elseif ($method === 'POST') {
            $controller = new AdminController();
            $controller->getPlace();
        }
        break;

    case '/adminDeletePlace':
        if (!isset($_SESSION['id'])) {
            header('Location: /home');
        }
        $controller = new AdminController();
        $controller->deletePlace($id);
        break;
    
    case '/adminUpdatePlace':
        if (!isset($_SESSION['id'])) {
            header('Location: /home');
        }
        $controller = new AdminController();
        if ($method === 'GET') {
            $controller->updatePlace($id);
        } else if ($method === 'POST') {
            $controller->post_updatePlace($id);
        }
        break;
    case '/colormodif':
        if (!isset($_SESSION['id'])) {
            header('Location: /home');
        }
        if ($method === 'GET') {
            $controller = new AdminController();
            $controller->colorModif();
        } elseif ($method === 'POST') {
            $controller = new AdminController();
            $controller->getColor();
        }
        break;
    case '/adminDeleteColor':
        if (!isset($_SESSION['id'])) {
            header('Location: /home');
        }
        $controller = new AdminController();
        $controller->deleteColor($id);
        break;
    case '/adminUpdateColor':
        if (!isset($_SESSION['id'])) {
            header('Location: /home');
        }
        $controller = new AdminController();
        if ($method === 'GET') {
            $controller->updateColor($id);
        } else if ($method === 'POST') {
            $controller->post_updateColor($id);
        }
        break;
    case '/adminUser':
        if (!isset($_SESSION['id'])) {
            header('Location: /home');
        }else if ($method === 'GET') {
            $controller = new AdminController();
            $controller->userModif();
        } else if ($method === 'POST') {
            $controller = new AdminController();
            $controller->getUser();
        }
        break;
    case '/adminDeleteUser':
        if (!isset($_SESSION['id'])) {
            header('Location: /home');
        }
        $controller = new AdminController();
        $controller->deleteUser($id);
        break;
    case '/adminUpdateUser':
        if (!isset($_SESSION['id'])) {
            header('Location: /home');
        }
        $controller = new AdminController();
        if ($method === 'GET') {
            $controller->updateUser($id);
        } else if ($method === 'POST') {
            $controller->post_updateUser($id);
        }
        break;
    case '/userUpdate':
        if (!isset($_SESSION['id'])) {
            header('Location: /login');
        }
        if($method === 'POST'){
            $controller = new ConnexionController();
            $controller->Post_userUpdate();
        }
        break;

    case '/stop':
        session_destroy();
        header('Location: /home');
        break;

    default:
        // header('HTTP/1.1 404 Not Found');
        echo '<html><body><h1>Page Not Found</h1></body></html>';
        break;
}
