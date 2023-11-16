<?php 
    require_once 'createDB.php';
    function init(){
        //initie la bdd une seule fois
        if(!file_exists('app/database/init.txt')){
            createtableUser();
            //createtableCar();
            $file = fopen('app/database/init.txt', 'w');
            fwrite($file, 'init of the bdd: ' . date('d-m-Y') . "\n");
            fclose($file);
        }
    }
    ?>