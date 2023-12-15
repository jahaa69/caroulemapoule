<?php

namespace Controller;

use Model\carModel;
use Model\userModel;
use Model\charaterisicModel;

class AdminController
{

    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);

        $titleSite = "admin page";
        $titlePage = "admine page";
        echo $twig->render('page/admin.html.twig', ['title' => $titleSite, 'titlePage' => $titlePage]);
    }
    public function loginAdmin()
    {
        $loginModel = new userModel();
        try {
            $id_user = $loginModel->loginAdmin($_POST['emailAdmin'], $_POST['passwordAdmin']);
        } catch (\InvalidArgumentException $e) {
            echo $e->getMessage();
        }

        if (isset($id_user)) {
            $_SESSION['id'] = $id_user;
            header('Location: /adminMenu');
        } else {
            header('Location: /home');
        }
    }
    public function adminMenu()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);
        $titleSite = "admin page";
        $titlePage = "admin page";
        echo $twig->render('page/adminMenu.html.twig', [
            'title' => $titleSite,
            'titlePage' => $titlePage,
        ]);
    }

    public function carData()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);
        $getT = $this->getT();
        $brandT = $getT[0];
        $colorT = $getT[1];
        $placeT = $getT[2];
        $townT = $getT[3];

        $CarT = $this->getCar();

        $titleSite = "admin page";
        $titlePage = "admine page";
        echo $twig->render('page/adminCar.html.twig', ['title' => $titleSite, 'titlePage' => $titlePage, 'brandT' => $brandT, 'colorT' => $colorT, 'placeT' => $placeT, 'townT' => $townT, 'CarT' => $CarT]);
    }
    public function getT()
    {
        $Model = new charaterisicModel();
        $Model->getCharacterystic();
        $brandT = $Model->getCharacterystic()[0];
        $colorT = $Model->getCharacterystic()[1];
        $placeT = $Model->getCharacterystic()[2];
        $townT = $Model->getCharacterystic()[3];
        return [$brandT, $colorT, $placeT, $townT];
    }
    public function getCar()
    {
        $adminModel = new carModel();
        $CarT = $adminModel->getCar();
        return $CarT;
    }
    public function createCar()
    {
        $adminModel = new carModel();
        $adminModel->addCar($_POST['inputcolor'], $_POST['inputBrand'], $_POST['inputplace'], $_POST['inputTown'], $_POST['inputPrice'], $_POST['inputImage'] );
        $this->carData();
    }
    public function deleteCar($id)
    {
        $adminModel = new carModel();
        $adminModel->deleteCar($id);
        $this->carData();
    }
    public function updateCar($id)
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);

        $titleSite = "AMV";
        $titlePage = "Admin Modif Voiture";
        $oneCar = new carModel();
        $oneCar = $oneCar->getCarById($id);

        $getT = $this->getT();
        $brandT = $getT[0];
        $colorT = $getT[1];
        $placeT = $getT[2];
        $townT = $getT[3];
        echo $twig->render('page/adminModifCar.twig', ['title' => $titleSite, 'titlePage' => $titlePage, 'brandT' => $brandT, 'colorT' => $colorT, 'placeT' => $placeT, 'townT' => $townT, 'oneCar' => $oneCar]);
    }
    public function post_updateCar($id)
    {
        $adminModel = new carModel();
        $adminModel->updateCar($id, $_POST['inputcolor'], $_POST['inputBrand'], $_POST['inputPlace'], $_POST['inputTown'], $_POST['inputPrice'], $_POST['inputImage']);
        header('Location: /adminCar');
    }
    public function characteristicData()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);
        $titleSite = "admin page";
        $titlePage = "admine page";
        echo $twig->render('page/admincharacteristic.twig', ['title' => $titleSite, 'titlePage' => $titlePage]);
    }
    public function brandModif()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);
        $titleSite = "admin page";
        $titlePage = "admine page";
        $getT = $this->getT();
        $brandT = $getT[0];
        echo $twig->render('page/brandmodif.twig', ['title' => $titleSite, 'titlePage' => $titlePage , 'brandT' => $brandT]);
    }
    public function getbrand()
    {
        $brand = $_POST['inputBrand'];
        $adminModel = new charaterisicModel();
        $adminModel->addBrand($brand);
        $this->brandModif();
    }
    public function deleteBrand($id)
    {
        $adminModel = new charaterisicModel();
        $adminModel->deleteBrand($id);
        $this->brandModif();
    }
    public function updateBrand($id)
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);

        $titleSite = "AMB";
        $titlePage = "Admin Modif Brand";
        $oneBrand = new charaterisicModel();
        $oneBrand = $oneBrand->getBrandById($id);
        echo $twig->render('page/adminModifBrand.twig', ['title' => $titleSite, 'titlePage' => $titlePage, 'oneBrand' => $oneBrand]);
    }
    public function post_updateBrand($id)
    {
        $adminModel = new charaterisicModel();
        $adminModel->updateBrand($_POST['inputBrand'],$id);
        header('Location: /brandmodif');
    }
    public function placeModif()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);
        $titleSite = "admin page";
        $titlePage = "admine page";
        $getT = $this->getT();
        $placeT = $getT[2];
        echo $twig->render('page/adminPlace.twig', ['title' => $titleSite, 'titlePage' => $titlePage, 'placeT' => $placeT]);
    }
    public function getplace()
    {
        $place = $_POST['inputPlace'];
        $adminModel = new charaterisicModel();
        $adminModel->addPlace($place);
        $this->placeModif();
    }
    public function deletePlace($id)
    {
        $adminModel = new charaterisicModel();
        $adminModel->deletePlace($id);
        $this->placeModif();
    }
    public function updatePlace($id)
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);

        $titleSite = "AMP";
        $titlePage = "Admin Modif Place";
        $onePlace = new charaterisicModel();
        $onePlace = $onePlace->getPlaceById($id);
        echo $twig->render('page/adminModifPlace.twig', ['title' => $titleSite, 'titlePage' => $titlePage, 'onePlace' => $onePlace]);
    }
    public function post_updatePlace($id)
    {
        $adminModel = new charaterisicModel();
        $adminModel->updatePlace($_POST['inputPlace'],$id);
        header('Location: /adminPlace');
    }


    public function colorModif()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);
        $titleSite = "admin page";
        $titlePage = "admine page";
        $getT = $this->getT();
        $colorT = $getT[1];
        echo $twig->render('page/colorModif.twig', ['title' => $titleSite, 'titlePage' => $titlePage, 'colorT' => $colorT]);
    }
    public function getColor()
    {
        $color = $_POST['inputColor'];
        $adminModel = new charaterisicModel();
        $adminModel->addColor($color);
        $this->colorModif();
    }
    public function deleteColor($id)
    {
        $adminModel = new charaterisicModel();
        $adminModel->deleteColor($id);
        $this->colorModif();
    }
    public function updateColor($id)
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);

        $titleSite = "AMC";
        $titlePage = "Admin Modif Color";
        $oneColor = new charaterisicModel();
        $oneColor = $oneColor->getColorById($id);
        echo $twig->render('page/adminModifColor.twig', ['title' => $titleSite, 'titlePage' => $titlePage, 'oneColor' => $oneColor]);
    }
    public function post_updateColor($id)
    {
        $adminModel = new charaterisicModel();
        $adminModel->updateColor($_POST['inputColor'],$id);
        header('Location: /colormodif');
    }



    public function userModif(){
        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);
        $titleSite = "admin page";
        $titlePage = "admine page";
        $adminModel = new userModel();
        $userT = $adminModel->getAllUser();
        echo $twig->render('page/allUser.twig', ['title' => $titleSite, 'titlePage' => $titlePage, 'userT' => $userT]);
    }

    public function getUser(){
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $admin= $_POST['admin'];
        $adminModel = new userModel();
        $adminModel->addUser($name, $lastname, $age, $email, $phone, $password, $admin);
        $this->userModif();
    }
    public function deleteUser($id){
        $adminModel = new userModel();
        $adminModel->deleteUser($id);
        $this->userModif();
    }

    public function updateUser($id){
        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);

        $titleSite = "AMU";
        $titlePage = "Admin Modif User";
        $oneUser = new userModel();
        $oneUser = $oneUser->getUser($id);
        echo $twig->render('page/adminModifUser.twig', ['title' => $titleSite, 'titlePage' => $titlePage, 'oneUser' => $oneUser]);
    }
    public function post_updateUser($id){
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $admin= $_POST['admin'];
        $adminModel = new userModel();
        $adminModel->updateUser($id, $name, $lastname, $age, $email, $phone, $password, $admin);
        header('Location: /adminUser');
    }



}

