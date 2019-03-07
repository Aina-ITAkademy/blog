<?php
    include_once('connectDB.php');
    include_once('../model/User.php');
    $database = cnx_db();
    
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

    //UPDATE Users SET nom='Nary',prenom='aina',email='nary.aina@gmail.com'
    //WHERE id=72;


    // INSERT INTO Users(nom,prenom,email) VALUES ('test','unTest','testmai@terst');
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