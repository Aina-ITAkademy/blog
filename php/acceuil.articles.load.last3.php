<?php
    include_once('connectDB.php');
    include_once('../model/Article.php');
    $database = cnx_db();
    $id = htmlspecialchars($_POST['id']);

    if($id > 0) { // charger 3 dernier article selon ID
        $sql_request = $database->prepare("SELECT * FROM Article WHERE id<:id ORDER BY id DESC LIMIT 3;");
    } else { // charger 3 dernier article dans la bdd
        $sql_request = $database->prepare("SELECT * FROM Article ORDER BY id DESC LIMIT 3;");
    }
    //$sql_request = $database->prepare("SELECT * FROM Article WHERE id<:id LIMIT 3;");
    $sql_request->bindParam(':id',$id,PDO::PARAM_STR);
    $sql_request->setFetchMode(PDO::FETCH_CLASS,'Article');
    $sql_request->execute();
    $response = $sql_request ->fetchAll();
    sleep(1);
    $jsonOut = json_encode($response);
    echo ($jsonOut);
    

?>