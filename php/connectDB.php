<?php
include_once('config.php');
function cnx_db(){
    $namehost = NAMEHOST;
    $dbname = DBNAME;
    $user = USER;
    $password = PASSWORD;
    $charset = CHARSET;

    $DNS = 'mysql:host='.$namehost.';dbname='.$dbname.';charset=utf8';

    $database = new PDO($DNS, $user, $password);
    
    $database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
    return $database;
}
?>