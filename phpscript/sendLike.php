<?php
    include_once('connectDB.php');
    $database = cnx_db();
    $like = $_POST['like'];

    $sql_request = $database->prepare("UPDATE Article_Like SET totalLike = totalLike + :like
                                        WHERE id=1;");
    $sql_request->bindParam(':like',$like,PDO::PARAM_INT);
    $sql_request->execute();
    
?>