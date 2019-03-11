<?php
    include_once('connectDB.php');
    include_once('../model/User.php');
    $database = cnx_db();
    
    $id = htmlspecialchars($_POST['id']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);


    $sql_request = $database->prepare("UPDATE Users SET nom=:nom,prenom=:prenom,email=:email
                                    WHERE id=:id");

    $sql_request->bindParam(':nom',$nom,PDO::PARAM_STR);
    $sql_request->bindParam(':prenom',$prenom,PDO::PARAM_STR);
    $sql_request->bindParam(':email',$email,PDO::PARAM_STR);
    $sql_request->bindParam(':id',$id,PDO::PARAM_INT);
    $sql_request->execute();

    //Renvoyer les info update
    $sql_request = $database->prepare("SELECT * FROM Users WHERE ID=:id;");
    $sql_request->bindParam(':id',$id,PDO::PARAM_INT);
    $sql_request->setFetchMode(PDO::FETCH_CLASS,'User');
    $sql_request->execute();
    $response = $sql_request ->fetchAll();
    $jsonOut = json_encode($response);
    echo ($jsonOut);
?>