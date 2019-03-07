<?php
    include_once('connectDB.php');
    $database = cnx_db();
    
    $id = $_POST['id'];

    // $sql_request = $database->prepare("INSERT INTO Users(nom,prenom,email)
    $sql_request = $database->prepare("DELETE FROM Users
                                        WHERE id=:id");
    $sql_request->bindParam(':id',$id,PDO::PARAM_STR);
    $sql_request->execute();

    $jsonOut = json_encode($id);
    echo ($jsonOut);

 
?>