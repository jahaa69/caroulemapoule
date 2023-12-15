<?php
namespace Controller;
use Controller\AdminController;
use Controller\ConnexionController;

class HomeController
{

    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);
        $titleSite = "Sectavaveur";
        $titlePage = "Home";

        $getCar = new AdminController();
        $CarT = $getCar->getCar();
        $userT = $this->getUserConnected();

        $isconnected = $this->isconnected();

        echo $twig->render('page/home.html.twig', ['title' => $titleSite, 'titlePage' => $titlePage , 'CarT' => $CarT, 'userT' => $userT, 'isconnected' => $isconnected]);
    }

    public function getUserConnected()
    {
        if (isset($_SESSION['id'])) {
            $controller = new ConnexionController();
            $user = $controller->getUser($_SESSION['id']);
            return $user;
        } else {
            return null;
        }
    }
    public function isconnected()
    {
        if (isset($_SESSION['id'])) {
            return true;
        } else {
            return false;
        }
    }
}
