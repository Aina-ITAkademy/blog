<?php
    include_once('connectDB.php');

    function getAllcomment() {
        $database = cnx_db();
       
        $sql_request = $database->prepare('SELECT * FROM commentaire;');
        $sql_request->execute();

        return $results = $sql_request ->fetchAll(); 
    }
   
    $comments = getAllcomment();
?>