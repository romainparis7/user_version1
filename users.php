<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="user.css">
        <script src="user_ajax.js"></script>
        <title>TABLE USER FORMULAIRE</title>
    </head>
    
    <body>
        
        
        <!----TITRE FORMULAIRE-->
        <h1>FORMULAIRE<h1>
        <br />    
        <!----CREATION FORMULAIRE-->        
        <div class="formulaire">
            <div>
                <label for="name">Nom :</label><br/>
                    <input type="text" id="name" name="user_name">
            </div>
            <div>
                <label for="lastName">Prenom :</label><br/>
                    <input type="text" id="lastName" name="user_name">
            </div>
            <div>
                <label for="email">Email :</label><br/>
                    <textarea id="email" name="email"></textarea>
            </div><br/>
        </div>    
        <!----bouton create et update-->         
        <input class="green" type="submit" value="create" onclick="create_user()">
        
    
        <!--CREATION DIV POUR AFFICHER LA LIST DES UTILISATEUR DE LA BDD-->
        <div  id="list">
            <h1>Liste des utilisateurs :</h1>

                <?php

                //1. se connecter a la base de donnée.
                $connec = new PDO("mysql:dbname=blog", 'root', '0000');
                $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //2.je questionne la bdd et récupère les utilisateurs.   
                $request = $connec->prepare("SELECT * FROM users");
                $request->execute();
                $recuperation_des_utilisateurs=$request->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <!--"3e AFFICHER MES VALEURS + CREATION DES BOUTONS DELETE & UPDATE-->
            
                    <?php foreach ($recuperation_des_utilisateurs as $key=> $value ):?>
                    
                    <div id=<?php echo $value['id'];?>>
                    <span>
                        <?php echo $value['id'] ?>
                        <i id="nom_<?php echo $value['id'] ?>"><?php echo $value['nom'] ?></i>
                        <i id="prenom_<?php echo $value['id'] ?>"><?php echo $value['prenom'] ?></i>
                        <i id="email_<?php echo $value['id'] ?>"><?php echo $value['email'] ?></i>
                    </span>
                    <input type="button" class="red"  value="DELETE" onclick="delete_user(<?php echo $value['id'];?>)">;
                    <input type="button" class="blue" value="UPDATE" onclick="update_user(<?php echo $value['id'];?>)">
                    <input type="button" class="green"value="READ"   onclick="read_user(<?php echo $value['id'];?>)">;
                    <input type="hidden" id="id_hidden" name="caché" />
                    </div>
                    <?php endforeach; ?>
               
        </div>
        
    
        
    </body>
</html>
