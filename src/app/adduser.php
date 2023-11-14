<?php 
require_once 'database/connect.php';

//créé une fonction qui ajoute un utilisateur dans la base de donnée,dans la table user grace au formulaire de la page connexion.php la table a 6 colonnes nomées name, lastname, age, email, tel, password
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
