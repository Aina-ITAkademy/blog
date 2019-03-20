<?php
    include_once('connectDB.php');
    include_once('../model/Article.php');
    include_once('../model/Response.php');
    include_once('../model/FailResponse.php');
    include_once('../model/SuccessResponse.php');

    $database = cnx_db();

    
    $article_title = htmlspecialchars($_POST['article_title']);
    $article_content = htmlspecialchars($_POST['article_content']);

 

    //Envoi reponse
    //echo $jsonArticle;


    /////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////

    // $reponse = new SuccessResponse($article_title,true,null);
   
    // Erreur un ou 2  vide
    if (($article_title == '') or ($article_content == '')) {
        $reponse = new FailResponse("Erreur: content ET title ne doivent pas etre vide",false,null);
    }
    else {
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

        $reponse = new SuccessResponse("C'est bon",true,$results);
    }
    echo json_encode($reponse);

?>