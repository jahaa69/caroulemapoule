<?php

class HomeController {

    public function index() {
        echo "home";
        $loader = new Twig_Loader_Filesystem('../app/views');
        $twig = new Twig_Environment($loader, array(
            'cache' => false,
        ));
        $template = $twig->load('home.twig');
        echo $template->render(array());
    }

}