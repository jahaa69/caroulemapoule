<?php

namespace Database;

$dsn = 'mysql:host=172.30.173.120;dbname=my_database';
$username = 'my_user';
$password = 'my_password';
try {
    $bdd = new \PDO($dsn, $username, $password);
    $conn = $bdd;
} catch (\PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

$user = $conn->prepare('CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        age INT NOT NULL,
        email VARCHAR(30) NOT NULL,
        phone INT NOT NULL,
        password VARCHAR(255) NOT NULL,
        admin BOOLEAN NOT NULL DEFAULT FALSE
    )');
$user->execute();

$color = $conn->prepare('CREATE TABLE IF NOT EXISTS color (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL
    )');
$color->execute();

$brand = $conn->prepare('CREATE TABLE IF NOT EXISTS brand (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL
    )');
$brand->execute();

$place = $conn->prepare('CREATE TABLE IF NOT EXISTS place (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL
    )');
$place->execute();

$town = $conn->prepare('CREATE TABLE IF NOT EXISTS town (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL
    )');
$town->execute();

$car = $conn->prepare('CREATE TABLE IF NOT EXISTS car (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_color INT NOT NULL,
        id_brand INT NOT NULL,
        id_place INT NOT NULL,
        id_town INT NOT NULL,
        price INT NOT NULL,
        image VARCHAR(255) NOT NULL,
        FOREIGN KEY (id_color) REFERENCES color(id),
        FOREIGN KEY (id_brand) REFERENCES brand(id),
        FOREIGN KEY (id_place) REFERENCES place(id),
        FOREIGN KEY (id_town) REFERENCES town(id)
    )');
$car->execute();


$review = $conn->prepare('CREATE TABLE IF NOT EXISTS review (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        id_user INT NOT NULL,
        id_car INT NOT NULL,
        FOREIGN KEY (id_user) REFERENCES users(id),
        FOREIGN KEY (id_car) REFERENCES car(id)
    )');
$review->execute();

$orders = $conn->prepare('CREATE TABLE IF NOT EXISTS orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_user INT NOT NULL,
        id_car INT NOT NULL,
        date DATETIME NOT NULL,
        FOREIGN KEY (id_user) REFERENCES users(id),
        FOREIGN KEY (id_car) REFERENCES car(id)
    )');
$orders->execute();

$history = $conn->prepare('CREATE TABLE IF NOT EXISTS history (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_user INT NOT NULL,
        id_order INT NOT NULL,
        date DATETIME NOT NULL,
        FOREIGN KEY (id_user) REFERENCES users(id),
        FOREIGN KEY (id_order) REFERENCES orders(id)
    )');
$history->execute();

$favorite = $conn->prepare('CREATE TABLE IF NOT EXISTS favorite (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_user INT NOT NULL,
        id_car INT NOT NULL,
        FOREIGN KEY (id_user) REFERENCES users(id),
        FOREIGN KEY (id_car) REFERENCES car(id)
    )');
$favorite->execute();
