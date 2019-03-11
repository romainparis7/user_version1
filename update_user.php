<?php

include_once('user.php');
//LA REQUETE POST DU USER_AJAX.JS ARRIVE ICI
$id= $_POST['id'];
$nom= $_POST['name'];
$prenom= $_POST['lastName'];
$email= $_POST['email'];

//APPEL BDD
$connec = new PDO("mysql:dbname=blog", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$request = $connec->prepare("UPDATE users
                             SET nom='$nom', prenom='$prenom', email='$email' 
                             WHERE id=$id");
$request->execute();

///////////////////////////////////
$connec = new PDO("mysql:dbname=blog", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connec->prepare("SELECT * FROM users
                             WHERE id=$id");

$request->setFetchMode(PDO::FETCH_CLASS,'User');
$request->execute();
$cible = $request->fetch();

echo (json_encode($cible));

?>