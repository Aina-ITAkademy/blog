<?php
    include_once('connectDB.php');
    include_once('../model/User.php');
    function getAllUser() {
        $database = cnx_db();
       
        $sql_request = $database->prepare('SELECT * FROM Users;');
        $sql_request->setFetchMode(PDO::FETCH_CLASS,'User'); //class User.php
        $sql_request->execute();

        return $results = $sql_request ->fetchAll(); 
    }
   
    $users = getAllUser();
?>