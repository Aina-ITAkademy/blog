<?php
    include_once('connectDB.php');
    include_once('./model/User.php');

    //Pour voir les erreur
    //error_reporting(E_ALL); 
    //ini_set('display_errors', 'on');

    function getAllUser() {
        $database = cnx_db();
       
        $sql_request = $database->prepare('SELECT * FROM Users;');
        
        $sql_request->setFetchMode(PDO::FETCH_CLASS,'User'); 
        $sql_request->execute();

        //return $results = $sql_request ->fetchAll(PDO::FETCH_OBJ); //Renvoi les resultats sous form d'objet, mais n'utilise pas notre class dans User.php
        return $results = $sql_request ->fetchAll(PDO::FETCH_CLASS,'User'); 
    }
   
    $users = getAllUser();
?>