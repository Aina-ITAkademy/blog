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
        // Construction de la ligne du tableau
        // $tid = '<td>'.$id.'</td>';
        // $tnom = '<td>'.$nom.'</td>';
        // $tprenom = '<td>'.$prenom.'</td>';
        // $temail = '<td>'.$email.'</td>';
        // $tbModify =  '<td>'.$buttonModify.'</td>';
        // $tbDelete = '<td>'.$buttonDelete.'</td>';
        // $table_row = '<tr>'.$tnom.$tprenom.$temail.$tbModify.$tbDelete.'</tr>';

        //Construction de div
        //$did = '<div>'.$id.'</div>';
        $dnom = '<div class="DivNomStyle">'.$nom.'</div>';
        $dprenom = '<div class="DivPrenomStyle">'.$prenom.'</div>';
        //$demail = '<div>'.$email.'</div>';
        $demail = '';
        $dBVoir = '<div>'.$buttonVoir.'</div>';
        $dBModify =  '<div>'.$buttonModify.'</div>';
        $dBDelete = '<div>'.$buttonDelete.'</div>';
        //$divUser = '<div id="'.$id.'" class="UserDiv">'.$dnom.$dprenom.$demail.$dBModify.$dBDelete.'</div>';
        $divUser = '<div id="'.$id.'" class="UserDiv">'.$dnom.$dprenom.$dBVoir.$dBModify.$dBDelete.'</div>';
        $stringOut =$divUser; 
        echo $stringOut;
    }

?>