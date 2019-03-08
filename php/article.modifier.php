<?php
    include_once('connectDB.php');

    $id = $_POST['id'];
    $database = cnx_db();
   
    $sql_request = $database->prepare("SELECT * FROM Article WHERE id=$id;");
    $sql_request->setFetchMode(PDO::FETCH_CLASS,'Article');
    $sql_request->execute();

    $results = $sql_request ->fetchAll(); 

    echo(json_encode($results))


?>