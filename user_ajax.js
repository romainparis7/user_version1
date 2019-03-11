
/*************************FONCTION CREATE******************************/
function create_user()
{ 
  //parametre
var xhr = new XMLHttpRequest();
//fonction de rappel
xhr.onreadystatechange= function() {

if (xhr.readyState == 4 && xhr.status == 200) {

//recuperer la reponse du serveur
var id1=xhr.response;
  
// 1. Creer un nouveau noeud de type div
var newDiv = document.createElement("div");
//donner une valeur à l'attribut id du noeud div que l'on vient de créer
newDiv.setAttribute("id", id1);
var parent=document.getElementById ("list");
// 2. lui affecter la valeur qui est dans le champ 
var name=document.getElementById("name");
var lastName=document.getElementById("lastName");
var email=document.getElementById("email");



// 3. Recuperer le parent de comment..le contenu de l enfant recupere le contenu  du pareznt
newDiv.innerHTML = name.value+lastName.value+email.value; 
newDiv.innerHTML =newDiv.innerHTML + "<input type='button' value='DELETE' onclick='delete_user("+id1+")'>";
newDiv.style.color = "blue";
newDiv.style="font-family:courier";
// 4. Lier le parent à l'enfant
parent.appendChild(newDiv); 
}
};
//ouvrir requête de la 2e METHODE POST  
xhr.open('POST','add_user.php');
//envoi de la requête de la 2e METHODE POST
var data = new FormData();
data.append('name', document.getElementById('name').value);
data.append('lastName', document.getElementById('lastName').value);
data.append('email', document.getElementById('email').value);
//data.append(‘membre’,membre);
xhr.send(data);
 }

 /************************FONCTION DELETE****************************/

 /*fonction transmet les données du formulaire en AJAX
  pour la suppression d'un utilisateur, puis elle met à jour l'affichage 
  de la page . */

 function delete_user(delete_id)
 {
  var xhr = new XMLHttpRequest();// AJAX : 1ere étape : création de l'objet XMLHttpRequest
  xhr.onreadystatechange= function(){   // AJAX : 2éme étape : création de la fonction de rappel
  if (xhr.readyState == 4 && xhr.status == 200) {

    var parent = document.getElementById("list"); // récupération du noeud parent
    var enfant = document.getElementById(delete_id); // récupération du noeud de l'utilisateur
    parent.removeChild(enfant);
  }
  };
  // AJAX :  3ème étape : création de la requête AJAX et initialisation des paramettres à transmettre 
  xhr.open('POST','delete_user.php');
  var data = new FormData();
  data.append('id',delete_id);
  

  // AJAX : 4ème étape : envoi de la requête avecles paramettres
  xhr.send(data); 
 }

/********************************FONCTION READ**********************************/
function read_user(read_id)
 {
   // AJAX : 1ere étape : création de l'objet XMLHttpRequest
  var xhr = new XMLHttpRequest();
  // AJAX : 2éme étape : création de la fonction de rappel
  // cette fonction n'est appellée qu'aprés avoir reçu la réponse du serveur
  xhr.onreadystatechange= function(){
  // on traite le cas ou la requête à finie d'être initialisée 
  // et que la réponse du serveur est valide
  if (xhr.readyState == 4 && xhr.status == 200) {

 //ajax receptionne la réponse du READ_USER.PHP soit le serveur
var voir=JSON.parse(xhr.responseText);
document.getElementById('name').value=voir.nom;
document.getElementById('lastName').value=voir.prenom;
document.getElementById('email').value=voir.email;
 }
 };
// lien + envoie des données à read_user.php
xhr.open('POST','read_user.php');
var data = new FormData();
data.append('id', read_id);

xhr.send(data);
 }

 /********************************FONCTION UPDATE**********************************/

  function update_user(update_id)
  {
              //création de l'objet
              var xhr = new XMLHttpRequest();
              //création fonction de rappel
              xhr.onreadystatechange= function(){
              if (xhr.readyState == 4 && xhr.status == 200) 
            {

              //ajax receptionne la réponse du DELETE_USER.PHP soit le serveur
              var user=JSON.parse(xhr.responseText);
              var nom=user.nom;
              var prenom=user.prenom;
              var email=user.email;

              var elementNom=document.getElementById('nom_'+update_id);
              var elementPrenom=document.getElementById('prenom_'+update_id);
              var elementEmail=document.getElementById('email_'+update_id);

              elementNom.innerHTML=nom;
              elementPrenom.innerHTML=prenom;
              elementEmail.innerHTML=email;
            }
  };

    // REQUETE PHP
    // LIEN AVEC UPDATE_USER.PHP 
    xhr.open('POST','update_user.php');
    //ENVOI DES DONNEES À READ_USER.PHP
    var data = new FormData();
    //data.append('id', document.getElementById("id").value);
    //data.append('id_hidden', document.getElementById("id_hidden").value);
    data.append('id',update_id);
    data.append('name', document.getElementById("name").value);
    data.append('lastName', document.getElementById("lastName").value);
    data.append('email', document.getElementById("email").value);
    //ENVOI DE LA REQUÊTE
    xhr.send(data);
  }
 
  
