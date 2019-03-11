<?php
    include_once('connectDB.php');

    function getAllArticle() {
        $database = cnx_db();
       
        $sql_request = $database->prepare('SELECT * FROM Article;');
        $sql_request->setFetchMode(PDO::FETCH_CLASS,'Article');
        $sql_request->execute();

        return $results = $sql_request ->fetchAll(); 
    }

    $articles = getAllArticle();
    

?>