
<?php

include_once('user.php');
//LA REQUETE POST DU USER_AJAX.JS ARRIVE ICI
$id= $_POST['id'];


//appel bdd avec chaque colonne date_create et content
$connec = new PDO("mysql:dbname=blog", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connec->prepare("SELECT * FROM users WHERE id=$id");
$request->execute();
//resultat de la bdd en objet à partir de maintenant
$request->setFetchMode(PDO::FETCH_CLASS,'User');

$georges = $request->fetch();

echo (json_encode($georges));


?>