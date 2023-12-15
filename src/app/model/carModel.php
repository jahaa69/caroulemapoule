<?php

namespace Model;

use Database\DataBaseConnect;
use Faker\Core\Color;

class carModel
{
    public function addCar( $color,$brand ,$place, $town, $inputPrice, $image){
        $DB = new DataBaseConnect();
        $addCar = $DB->conn->prepare('INSERT INTO car (id_color, id_brand, id_place, id_town, price, image ) VALUES (?,?,?,?,?,?)');
        $addCar->execute([$color, $brand, $place, $town, $inputPrice, $image]);
    }

    public function getCar(){
        $DB = new DataBaseConnect();
        $getCar = ('SELECT car.id, color.name AS color, brand.name AS brand, place.name AS place, town.name AS town, car.price , car.image FROM car 
        INNER JOIN color ON car.id_color = color.id 
        INNER JOIN brand ON car.id_brand = brand.id 
        INNER JOIN place ON car.id_place = place.id 
        INNER JOIN town ON car.id_town = town.id');
        $getCar = $DB->conn->query($getCar);
        $CarT = $getCar->fetchAll();
        return $CarT;
    }

    public function getCarById($id){
        $DB = new DataBaseConnect();
        $getCarById = ('SELECT car.id, color.name AS color, brand.name AS brand, place.name AS place, town.name AS town, car.price , car.image FROM car 
        INNER JOIN color ON car.id_color = color.id 
        INNER JOIN brand ON car.id_brand = brand.id 
        INNER JOIN place ON car.id_place = place.id 
        INNER JOIN town ON car.id_town = town.id 
        WHERE car.id = ?');
        $getCarById = $DB->conn->prepare($getCarById);
        $getCarById->execute([$id]);
        $CarT = $getCarById->fetch();
        return $CarT;
    }

    public function deleteCar($id){
        $DB = new DataBaseConnect();
        $deleteCar = $DB->conn->prepare('DELETE FROM car WHERE id = ?');
        $deleteCar->execute([$id]);
    }
    public function updateCar($id, $color, $brand, $place, $town, $price , $image){
        $DB = new DataBaseConnect();
        $updateCar = $DB->conn->prepare('UPDATE car SET id_color = ?, id_brand = ?, id_place = ?, id_town = ?, price = ?, image=? WHERE id = ?');
        $updateCar->execute([$color, $brand, $place, $town, $price, $image ,$id]);
    }
}