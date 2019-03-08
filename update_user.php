
<?php
/*
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
                            SET 'name'=$nom, 'prenom'=$lastName, 'email'=$email 
                            WHERE id=$id");
$request->execute();

echo (json_encode(User));

*/
?>