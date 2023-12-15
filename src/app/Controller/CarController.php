<?php

namespace Controller;
use Model\carModel;
 
class CarController
{
    public function carDetails($id)
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);
        $getcar = new carModel();
        $getcar = $getcar->getCarById($id);

        $titleSite = "Sectavaveur";
        $titlePage = "details de la voiture";

        echo $twig->render('page/carPage.twig', ['title' => $titleSite, 'titlePage' => $titlePage, 'thiscar' => $getcar]);
    }
    public function carList()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);
        $getcar = new carModel();
        $getcar = $getcar->getCar();

        $titleSite = "Sectavaveur";
        $titlePage = "Liste des voitures";

        echo $twig->render('page/allCar.twig', ['title' => $titleSite, 'titlePage' => $titlePage, 'carList' => $getcar]);
    }

}