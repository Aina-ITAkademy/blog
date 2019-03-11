<?php
    /////////////////////////////////////////////////////////////////////////////////
    // /!\  Erreur malgres emplacement si on utilise '../php/loadArticle.php' /!\  //
    // /!\  ce fichier article_list.php est "include_once() par articles.php  /!\  //
    // /!\  article.php est a la racine, donc le bon chemin vers loadArticle  /!\  //
    // /!\  est 'php/loadArticle.php'                                         /!\  //
    /////////////////////////////////////////////////////////////////////////////////

    include_once('php/user.loadAll.php');

    foreach ($users as $key => $user) {

        // Vielle version avec une reponse en array
        // $id =$user['id'];
        // $nom=$user['nom'];
        // $prenom =$user['prenom'];
        // $email=$user['email'];

        //Version objet
        $id = $user -> id;
        $nom = $user -> nom;
        $prenom = $user -> prenom;

        $buttonModify = '<button type="button" onclick="modifier_User('.$id.')">Modifier</button> ';
        $buttonDelete= '<button type="button" onclick="supprimer_User('.$id.')">Supprimer</button> ';
        $buttonVoir= '<button type="button" onclick="voir_User('.$id.')">Voir</button> ';

        //Construction de div
        $did = 'div_'.$id;
        $dnom = '<div class="DivNomStyle">'.$nom.'</div>';
        $dprenom = '<div class="DivPrenomStyle">'.$prenom.'</div>';
        
        $dBVoir = '<div>'.$buttonVoir.'</div>';
        $dBModify =  '<div>'.$buttonModify.'</div>';
        $dBDelete = '<div>'.$buttonDelete.'</div>';
        $divUser = '<div id="'.$did.'" class="UserDiv">'.$dnom.$dprenom.$dBVoir.$dBModify.$dBDelete.'</div>';
        $stringOut =$divUser; 
        echo $stringOut;
    }

?>