<?php
//LA REQUETE POST DU USER_AJAX.JS ARRIVE ICI
$nom= $_POST['name'];
$prenom= $_POST['lastName'];
$email= $_POST['email'];

//appel bdd avec chaque colonne date_create et content
$connec = new PDO("mysql:dbname=blog", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connec->prepare("INSERT INTO users (nom,prenom,email)
                             VALUE ('$nom','$prenom','$email')");
$request->execute();
?>