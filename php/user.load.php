<?php
    include_once('connectDB.php');
    include_once('../model/User.php');
    $database = cnx_db();
    
    $id = $_POST['id'];
    

    $database = cnx_db();
    
    $sql_request = $database->prepare('SELECT * FROM Users WHERE id=:id;');

    $sql_request->bindParam(':id',$id,PDO::PARAM_INT);
    $sql_request->setFetchMode(PDO::FETCH_CLASS,'User'); //class User.php
    $sql_request->execute();
    $results = $sql_request ->fetchAll();
 
    $user = $results;
    $jsonOut = json_encode($user);
    
    echo ($jsonOut);
?>