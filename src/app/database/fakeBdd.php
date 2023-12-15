<?php

namespace Database;

use Model\userModel;

use Faker\Factory;

function connectBdd(): \PDO
{
    $dsn = 'mysql:host=172.30.173.120;dbname=my_database';
    $username = 'my_user';
    $password = 'my_password';
    try {
        $bdd = new \PDO($dsn, $username, $password);
        return $bdd;
    } catch (\PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

function fakeUser()
{
    $faker = Factory::create('fr_FR');
    $min = 18;
    $max = 80;
    for ($i = 0; $i < 10; $i++) {
        $name = $faker->firstName();
        $lastname = $faker->lastName();
        $age = $faker->numberBetween($min, $max);
        $email = $faker->email();
        $phone = $faker->phoneNumber();
        $password = $faker->password();
        $admin = $faker->numberBetween(0, 1);
    }
    $adduserModel = new userModel();
    $adduserModel->addUser($name, $lastname, $age, $email, $phone, $password, $admin);
}
function createadmin()
{
    $bdd = connectBdd();
    $hashed_password = password_hash('admin', PASSWORD_DEFAULT);
    $admin = ('INSERT INTO users (name, lastname, age, email, phone, password, admin) VALUES ("admin", "admin", "4012", "admin@admin.com", "0123456789", "' . $hashed_password . '", "1")');
    $bdd->exec($admin);
}

function color()
{
    $bdd = connectBdd();
    $color = ('INSERT INTO color (name) VALUES ("Rouge"), ("Blanc"), ("Gris"), ("Noir"), ("Noir mat"), ("Bleu turquoise"), ("Bleu marine")');
    $bdd->exec($color);
}

function brand()
{
    $bdd = connectBdd();
    $brand = ('INSERT INTO brand (name) VALUES ("Nissan"), ("Renault"), ("Volvo"), ("Tesla"), ("Fiat"), ("Peugeot"), ("Volkswagen"), ("Ferrari"), ("Hyundai"), ("Toyota")');
    $bdd->exec($brand);
}

function place()
{
    $bdd = connectBdd();
    $place = ('INSERT INTO place (name) VALUES ("2"), ("3"), ("4"), ("5"), ("7"), ("9")');
    $bdd->exec($place);
}

function town()
{
    $bdd = connectBdd();
    $town = ('INSERT INTO town (name) VALUES ("Paris"), ("Marseille"), ("Lyon"), ("Toulouse"), ("Nice"), ("Nantes"), ("Montpellier"), ("Strasbourg"), ("Bordeaux"), ("Lille")');
    $bdd->exec($town);
}
function getRandomValue($array)
{
    return $array[array_rand($array)];
}

function fakeCar()
{

    $bdd = connectBdd();
    $villes = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"];
    $places = [2, 3, 4, 5, 7, 9];
    $marques = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11"];
    $couleurs = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"];

    $nombreVoitures = 50;

    for ($i = 0; $i < $nombreVoitures; $i++) {
        $couleur = getRandomValue($couleurs);
        $brand = getRandomValue($marques);
        $place = getRandomValue($places);
        $ville = getRandomValue($villes);
        $prix = rand(10000, 50000);
        $image = "https://picsum.photos/200/300";

        $stmt = $bdd->prepare("INSERT INTO car (id_color, id_brand, id_place, id_town, price, image) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$couleur, $brand, $place, $ville, $prix, $image]);
    }
}



function hallcall()
{
    color();
    brand();
    place();
    town();
    createadmin();
    fakeCar();
}
hallcall();
