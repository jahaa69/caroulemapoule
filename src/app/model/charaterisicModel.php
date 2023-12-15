<?php

namespace Model;

use Database\DataBaseConnect;

class charaterisicModel{
    public function getCharacterystic(){
        $DB = new DataBaseConnect();
        $getbrandid = ('SELECT * FROM brand');
        $getcolorid = ('SELECT * FROM color');
        $getplaceid = ('SELECT * FROM place');
        $gettownid = ('SELECT * FROM town');
    
        $getbrand = $DB->conn->query($getbrandid);
        $getcolor = $DB->conn->query($getcolorid);
        $getplace = $DB->conn->query($getplaceid);
        $gettown = $DB->conn->query($gettownid);
    
        $brandT = $getbrand->fetchAll();
        $colorT = $getcolor->fetchAll();
        $placeT = $getplace->fetchAll();
        $townT = $gettown->fetchAll();
    
        return [$brandT, $colorT, $placeT, $townT];
    }

    public function getBrandById($id){
        $DB = new DataBaseConnect();
        $getBrandById = ('SELECT * FROM brand WHERE id = ?');
        $getBrandById = $DB->conn->prepare($getBrandById);
        $getBrandById->execute([$id]);
        $brandT = $getBrandById->fetch();
        return $brandT;
    }
    public function getColorById($id){
        $DB = new DataBaseConnect();
        $getColorById = ('SELECT * FROM color WHERE id = ?');
        $getColorById = $DB->conn->prepare($getColorById);
        $getColorById->execute([$id]);
        $colorT = $getColorById->fetch();
        return $colorT;
    }
    public function getPlaceById($id){
        $DB = new DataBaseConnect();
        $getPlaceById = ('SELECT * FROM place WHERE id = ?');
        $getPlaceById = $DB->conn->prepare($getPlaceById);
        $getPlaceById->execute([$id]);
        $placeT = $getPlaceById->fetch();
        return $placeT;
    }


    public function addBrand($brand){
        $DB = new DataBaseConnect();
        $addCar = $DB->conn->prepare('INSERT INTO brand (name) VALUES (?)');
        $addCar->execute([$brand]);
    }
    public function deleteBrand($id){
        $DB = new DataBaseConnect();
        $deleteCar = $DB->conn->prepare('DELETE FROM brand WHERE id = ?');
        $deleteCar->execute([$id]);
    }
    public function updateBrand($brand, $id){
        $DB = new DataBaseConnect();
        $updateCar = $DB->conn->prepare('UPDATE brand SET name = ?WHERE id = ?');
        $updateCar->execute([$brand, $id]);
    }

    public function addPlace($place){
        $DB = new DataBaseConnect();
        $addCar = $DB->conn->prepare('INSERT INTO place (name) VALUES (?)');
        $addCar->execute([$place]);
    }
    public function deletePlace($id){
        $DB = new DataBaseConnect();
        $deleteCar = $DB->conn->prepare('DELETE FROM place WHERE id = ?');
        $deleteCar->execute([$id]);
    }
    public function updatePlace($place, $id){
        $DB = new DataBaseConnect();
        $updateCar = $DB->conn->prepare('UPDATE place SET name = ?WHERE id = ?');
        $updateCar->execute([$place, $id]);
    }

    public function addColor($color){
        $DB = new DataBaseConnect();
        $addCar = $DB->conn->prepare('INSERT INTO color (name) VALUES (?)');
        $addCar->execute([$color]);
    }
    public function deleteColor($id){
        $DB = new DataBaseConnect();
        $deleteCar = $DB->conn->prepare('DELETE FROM color WHERE id = ?');
        $deleteCar->execute([$id]);
    }
    public function updateColor($color, $id){
        $DB = new DataBaseConnect();
        $updateCar = $DB->conn->prepare('UPDATE color SET name = ?WHERE id = ?');
        $updateCar->execute([$color, $id]);
    }
}
