<?php
    include_once('php/loadUsers.php');
    foreach ($users as $key => $user) {

        $id =$user['id'];
        $nom=$user['nom'];
        $prenom =$user['prenom'];
        $email=$user['email'];
        $buttonModify = '<button type="button" onclick="modifier_User('.$id.')">Modifier</button> ';
        $buttonDelete= '<button type="button" onclick="supprimer_User('.$id.')">Supprimer</button> ';
        $buttonVoir= '<button type="button" onclick="voir_User('.$id.')">Voir</button> ';

        //Construction de div
        $did = 'div_'.$id;
        $dnom = '<div class="DivNomStyle">'.$nom.'</div>';
        $dprenom = '<div class="DivPrenomStyle">'.$prenom.'</div>';
        //$demail = '<div>'.$email.'</div>';
        $demail = '';
        $dBVoir = '<div>'.$buttonVoir.'</div>';
        $dBModify =  '<div>'.$buttonModify.'</div>';
        $dBDelete = '<div>'.$buttonDelete.'</div>';
        //$divUser = '<div id="'.$id.'" class="UserDiv">'.$dnom.$dprenom.$demail.$dBModify.$dBDelete.'</div>';
        $divUser = '<div id="'.$did.'" class="UserDiv">'.$dnom.$dprenom.$dBVoir.$dBModify.$dBDelete.'</div>';
        $stringOut =$divUser; 
        echo $stringOut;
    }

?>