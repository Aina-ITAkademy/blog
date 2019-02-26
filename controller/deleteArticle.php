<?php
    include_once('../php/connectDB.php');
    $database = cnx_db();

    $id= $_POST['id'];
    $request = $database ->prepare("DELETE FROM Article WHERE id=:id;");
    $request->bindParam(':id',$id,PDO::PARAM_INT);
    $request->execute();

?>