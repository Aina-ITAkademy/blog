<?php
//Fonction pour connection a la base de donnees
function cnx_db( ){
    $namehost = 'localhost';
    $dbname = 'Blog_DB';
    $user = 'root';
    $password = '0000';
    $charset = 'utf8';

    $DNS = 'mysql:host='.$namehost.';dbname='.$dbname.';charset=utf8';

    $database = new PDO($DNS, $user, $password);

    return $database;
}

// echo "Yes you called ?";
// $database = cnx_db();
// echo(var_dump($_POST));

// exemple requete 
// INSERT INTO 'commentaire' ('date_create', 'content')
// VALUES (now(), 'Ceci est le 1er commentaire de test');
$database = cnx_db();
$comment = $_POST['comment'];

if (isset($comment)&& (strlen($_POST['comment'])>0)) {
    $sql_request = $database->prepare("INSERT INTO commentaire (date_content,content)
                                        VALUES (now(), :comment);");

    $sql_request->bindParam(':comment',$comment,PDO::PARAM_STR);
    $sql_request->execute();
    echo "c'est fait";

}
else {
    //comment error
}
// $prenom = '%'.$_GET['prenom'].'%';
// if (isset($prenom)&& (strlen($_GET['prenom'])>0)) {
    

//     $sql_request = $database->prepare("SELECT * FROM etudiants 
//                                     WHERE prenom LIKE :prenom
//                                     ;");
//     $sql_request->bindParam(':prenom',$prenom,PDO::PARAM_STR);
//     $sql_request->execute();
//     $results = $sql_request->fetchAll();

//     //echo "requete ok";
//     foreach ($results as $key => $etudiant):
//         $r_id = $etudiant['id'];
//         $r_prenom = $etudiant['prenom'];
//         $r_nom = $etudiant['nom'];
//         // $toPrint = "<tr><td>".$r_id."</td><td>".$r_nom."</td><td>".$r_prenom."</td></tr>";
//         //echo $toPrint;

//         $toPrint2 = $r_nom." ".$r_prenom."</br>";
//         echo $toPrint2;
//     endforeach;
// }


?>