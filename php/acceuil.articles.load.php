<?php
    include_once('connectDB.php');
    include_once('../model/Article.php');
    $database = cnx_db();
    $id = htmlspecialchars($_POST['id']);

    $sql_request = $database->prepare("SELECT * FROM Article WHERE id=:id;");
    $sql_request->bindParam(':id',$id,PDO::PARAM_STR);
    $sql_request->setFetchMode(PDO::FETCH_CLASS,'Article');
    $sql_request->execute();
    $response = $sql_request ->fetch();
    $jsonOut = json_encode($response);
    echo ($jsonOut);
?>