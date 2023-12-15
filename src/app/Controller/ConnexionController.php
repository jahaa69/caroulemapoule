<?php

namespace Controller;

use Model\userModel;


class ConnexionController
{

    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);
        
        $titleSite = "Sectavaveur";
        $titlePage = "connexion";
        echo $twig->render('page/register.twig', ['title' => $titleSite, 'titlePage' => $titlePage]);
    }
    public function getFormUser(){
        try{
            $adduserModel = new userModel();
            $adduserModel->addUser($_POST['name'], $_POST['lastname'], $_POST['age'], $_POST['email'], $_POST['phone'], $_POST['password'], $_POST['admin']);
            
            header('Location: /home');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function getFormUserLogin()
    {
        $loginModel = new userModel();
        try {
            $id_user = $loginModel->loginUser($_POST['emailUser'], $_POST['passwordUser']);
        } catch (\InvalidArgumentException $e) {
            echo $e->getMessage();
        }
        if (isset($id_user)) {
            $_SESSION['id'] = $id_user;
            header('Location: /home');
        } else {
            header('Location: /login');
        }
    }
    public function loginpage(){
        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);
        
        $titleSite = "Sectavaveur";
        $titlePage = "connexion";
        echo $twig->render('page/login.twig', ['title' => $titleSite, 'titlePage' => $titlePage]);
    }
    public function getUser($id)
    {
        $userModel = new userModel();
        $user = $userModel->getUser($id);
        return $user;
    }
    public function Post_userUpdate()
    {
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $adminModel = new userModel();
        $adminModel->updateUser2($name, $lastname, $age, $email, $phone, $password);
        var_dump($name);
        header('Location: /stop');
    }
}
