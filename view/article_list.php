<?php
    /////////////////////////////////////////////////////////////////////////////////////
    // /!\  Erreur malgres emplacement si on utilise '../php/article.loadAll.php' /!\  //
    // /!\  ce fichier article_list.php est "include_once() par articles.php      /!\  //
    // /!\  article.php est a la racine, donc le bon chemin                       /!\  //
    // /!\  vers article.loadAll.php est 'php/article.loadAll.php'                /!\  //
    /////////////////////////////////////////////////////////////////////////////////////

    include_once('php/article.loadAll.php'); //
    foreach ($articles as $key => $article) {

        $id =$article['id'];
        $title=$article['title'];
        $content =$article['content'];
        $buttonModify = '<button type="button" onclick="modifier_Article('.$id.')">M</button> ';
        $buttonDelete= '<button type="button" onclick="supprimer_Article('.$id.')">S</button> ';

        $divContent = $id.'--'.$title.'--'.$content;
        
        $stringOut ="<div class='Article' id='".$id."'>".$divContent.$buttonModify.$buttonDelete.'</div>'; 
        echo $stringOut;
    }
?>