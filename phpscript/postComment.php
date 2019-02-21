<?php

include_once('connectDB.php');
$database = cnx_db();
$comment = $_POST['comment'];

if (isset($comment)&& (strlen($_POST['comment'])>0)) {
    $sql_request = $database->prepare("INSERT INTO commentaire (date_content,content)
                                        VALUES (now(), :comment);");

    $sql_request->bindParam(':comment',$comment,PDO::PARAM_STR);
    $sql_request->execute();
    echo "c'est fait";

}
else {
    //comment error
}

?>