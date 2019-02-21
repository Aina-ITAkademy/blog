<?php
function cnx_db(){
    $namehost = 'localhost';
    $dbname = 'Blog_DB';
    $user = 'root';
    $password = '0000';
    $charset = 'utf8';

    $DNS = 'mysql:host='.$namehost.';dbname='.$dbname.';charset=utf8';

    $database = new PDO($DNS, $user, $password);
    return $database;
}
?>