<?php 
require_once __DIR__.'/../database/connect.php';
function adduser($name, $lastname, $age, $email, $tel, $password){
    $bdd = connect();
    $req = $bdd->prepare('INSERT INTO user(name, lastname, age, email, tel, password) VALUES(:name, :lastname, :age, :email, :tel, :password)');
    $req->execute(array(
        'name' => $name,
        'lastname' => $lastname,
        'age' => $age,
        'email' => $email,
        'tel' => $tel,
        'password' => $password
    ));
}

?>
