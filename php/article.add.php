<?php
    include_once('connectDB.php');
    //include_once('../model/Article.php');
    $database = cnx_db();

    
    $article_title = htmlspecialchars($_POST['article_title']);
    $article_content = htmlspecialchars($_POST['article_content']);

 
    $sql_request = $database->prepare("INSERT INTO Article(title,content)
                                    VALUES (:article_title,:article_content);");

    $sql_request->bindParam(':article_title',$article_title,PDO::PARAM_STR);
    $sql_request->bindParam(':article_content',$article_content,PDO::PARAM_STR);
    $sql_request->execute();

    
    //recuperer le dernier article ajoute grace au dernier ID
    $lastID = $database ->lastInsertID();
    $sql_request = $database->prepare("SELECT * FROM Article
                                        WHERE ID=:id;");
    $sql_request->bindParam(':id',$lastID,PDO::PARAM_INT);                                    
    $sql_request->setFetchMode(PDO::FETCH_CLASS,'Article');
    $sql_request->execute();
    $results = $sql_request ->fetch(); 
    $jsonArticle = json_encode($results);
    echo $jsonArticle;
?>