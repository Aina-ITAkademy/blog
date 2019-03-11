<?php
    include_once('connectDB.php');
    include_once('../model/Article.php');
    $database = cnx_db();

    
    $id = htmlspecialchars($_POST['id']);
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);

    $sql_request = $database->prepare("UPDATE Article SET title=:title,content=:content
                                    WHERE id=:id");

    $sql_request->bindParam(':title',$title,PDO::PARAM_STR);
    $sql_request->bindParam(':content',$content,PDO::PARAM_STR);
    $sql_request->bindParam(':id',$id,PDO::PARAM_STR);
    $sql_request->execute();

    //Renvoyer les info update
    $sql_request = $database->prepare("SELECT * FROM Article WHERE ID=:id;");
    $sql_request->bindParam(':id',$id,PDO::PARAM_INT);
    $sql_request->setFetchMode(PDO::FETCH_CLASS,'Article');
    $sql_request->execute();
    $response = $sql_request ->fetchAll();
    $jsonOut = json_encode($response);
    echo ($jsonOut);
?>