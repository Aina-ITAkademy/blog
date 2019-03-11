<?php
    
    include_once('connectDB.php');
    include_once('../model/User.php');
    $database = cnx_db();
    
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);

    $sql_request = $database->prepare("INSERT INTO Users(nom,prenom,email)
                                    VALUES (:nom,:prenom,:email);");

    $sql_request->bindParam(':nom',$nom,PDO::PARAM_STR);
    $sql_request->bindParam(':prenom',$prenom,PDO::PARAM_STR);
    $sql_request->bindParam(':email',$email,PDO::PARAM_STR);
    $sql_request->execute();

    //recuperer et envoyer le dernier ajout
    $sql_request = $database->prepare("SELECT * FROM Users WHERE ID=LAST_INSERT_ID();");
    $sql_request->setFetchMode(PDO::FETCH_CLASS,'User');
    $sql_request->execute();
    $response = $sql_request ->fetchAll();
    $jsonOut = json_encode($response);
    echo ($jsonOut);
?>