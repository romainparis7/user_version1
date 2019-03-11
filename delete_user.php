<?php
//LA REQUETE POST DU USER_AJAX.JS ARRIVE ICI
$id= $_POST['id'];
//appel bdd avec chaque colonne date_create et content
$connec = new PDO("mysql:dbname=blog", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connec->prepare("DELETE FROM users WHERE id=$id");
$request->execute();
?>
