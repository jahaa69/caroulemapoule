<?php

namespace Model;
use Database\DataBaseConnect;
use PDO;
use InvalidArgumentException;

class userModel
{

    public function addUser($name, $lastname, $age, $email, $phone, $password, $admin)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        try {
            $bdd = new DataBaseConnect();
            $conn = $bdd->connectBdd();
            $req = $conn->prepare('INSERT INTO users(name, lastname, age, email, phone, password, admin) VALUES(:name, :lastname, :age, :email, :phone, :password, :admin)');
            $req->bindParam(':name', $name);
            $req->bindParam(':lastname', $lastname);
            $req->bindParam(':age', $age);
            $req->bindParam(':email', $email);
            $req->bindParam(':phone', $phone);
            $req->bindParam(':password', $hashed_password);
            $req->bindParam(':admin', $admin);
            $req->execute();
            
        } catch (\PDOException $e) {
            error_log('Connexion échouée : ' . $e->getMessage(), 0);
        }
    }
    public function loginAdmin($emailAdmin,$passwordAdmin)
    {
        $bdd = new DataBaseConnect();
        $conn = $bdd->connectBdd();
        $check = false;
        try{
            $query = "SELECT id, password  FROM users WHERE email='$emailAdmin'";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$result){
                throw new InvalidArgumentException('Utilisateur inconnu');
            }
            $check = password_verify($passwordAdmin, $result['password']);
        } catch (\PDOException $e) {
            throw new InvalidArgumentException('Connexion échouée : ' . $e->getMessage());
        }
        
        if($check){
            return $result['id'];
        } else {
            return null;
        }
    }
    public function loginUser($emailUser,$passwordUser)
    {
        $bdd = new DataBaseConnect();
        $conn = $bdd->connectBdd();
        $check = false;
        try{
            $query = "SELECT id, password  FROM users WHERE email='$emailUser'";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$result){
                throw new InvalidArgumentException('Utilisateur inconnu');
            }
            $check = password_verify($passwordUser, $result['password']);
        } catch (\PDOException $e) {
            throw new InvalidArgumentException('Connexion échouée : ' . $e->getMessage());
        }
        
        if($check){
            return $result['id'];
        } else {
            return null;
        }
    }

    public function getAllUser()
    {
        $bdd = new DataBaseConnect();
        $conn = $bdd->connectBdd();
        $req = $conn->prepare('SELECT * FROM users');
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getUser($id)
    {
        $bdd = new DataBaseConnect();
        $conn = $bdd->connectBdd();
        $req = $conn->prepare('SELECT * FROM users WHERE id = :id');
        $req->bindParam(':id', $id);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteUser($id)
    {
        $bdd = new DataBaseConnect();
        $conn = $bdd->connectBdd();
        $req = $conn->prepare('DELETE FROM users WHERE id = :id');
        $req->bindParam(':id', $id);
        $req->execute();
    }

    public function updateUser($id, $name, $lastname, $age, $email, $phone, $password, $admin)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $bdd = new DataBaseConnect();
        $conn = $bdd->connectBdd();
        $req = $conn->prepare('UPDATE users SET name = :name, lastname = :lastname, age = :age, email = :email, phone = :phone, password = :password, admin = :admin WHERE id = :id');
        $req->bindParam(':id', $id);
        $req->bindParam(':name', $name);
        $req->bindParam(':lastname', $lastname);
        $req->bindParam(':age', $age);
        $req->bindParam(':email', $email);
        $req->bindParam(':phone', $phone);
        $req->bindParam(':password', $hashed_password);
        $req->bindParam(':admin', $admin);
        $req->execute();
    }

    public function updateUser2($name, $lastname, $age, $email, $phone, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $bdd = new DataBaseConnect();
        $conn = $bdd->connectBdd();
        $req = $conn->prepare('UPDATE users SET name = :name, lastname = :lastname, age = :age, email = :email, phone = :phone, password = :password WHERE id = :id');
        $req->bindParam(':id', $id);
        $req->bindParam(':name', $name);
        $req->bindParam(':lastname', $lastname);
        $req->bindParam(':age', $age);
        $req->bindParam(':email', $email);
        $req->bindParam(':phone', $phone);
        $req->bindParam(':password', $hashed_password);
        $req->execute();
    }
}
