<?php
    
    include_once('connectDB.php');
    include_once('../model/User.php');
    $database = cnx_db();
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];


    // INSERT INTO Users(nom,prenom,email) VALUES ('test','unTest','testmai@terst');
    $sql_request = $database->prepare("INSERT INTO Users(nom,prenom,email)
                                    VALUES (:nom,:prenom,:email);");

    $sql_request->bindParam(':nom',$nom,PDO::PARAM_STR);
    $sql_request->bindParam(':prenom',$prenom,PDO::PARAM_STR);
    $sql_request->bindParam(':email',$email,PDO::PARAM_STR);
    $sql_request->execute();

    //recuperer le dernier ajout

    $sql_request = $database->prepare("SELECT LAST_INSERT_ID();");


    $sql_request = $database->prepare("SELECT * FROM Users WHERE ID=LAST_INSERT_ID();");
    $sql_request->setFetchMode(PDO::FETCH_CLASS,'User');
    $sql_request->execute();
    $response = $sql_request ->fetchAll();
    $jsonOut = json_encode($response);
    echo ($jsonOut);
?>