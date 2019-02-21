<?php
    include_once('connectDB.php');

    function getLike() {
        $database = cnx_db();
       
        $sql_request = $database->prepare('SELECT totalLike FROM Article_Like;');
        $sql_request->execute();

        return $results = $sql_request ->fetchAll(); 
    }
   
    $results = getLike();
    foreach ($results as $key => $result):
        echo $result['totalLike'];
    endforeach;      
    
?>