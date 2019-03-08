function create_user()
{ 
  //parametre
var xhr = new XMLHttpRequest();
//fonction de rappel
xhr.onreadystatechange= function() {

if (xhr.readyState == 4 && xhr.status == 200) {

  
// 1. Creer un nouveau noeud de type div
var newDiv = document.createElement("div");
var parent=document.getElementById ("list");
// 2. lui affecter la valeur qui est dans le champ 
var name=document.getElementById("name");
var lastName=document.getElementById("lastName");
var email=document.getElementById("email");
// 3. Recuperer le parent de comment..le contenu de l enfant recupere le contenu  du pareznt
newDiv.innerHTML = name.value+lastName.value+email.value; 
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

 function read();
 {

  
 }