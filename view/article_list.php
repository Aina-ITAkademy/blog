<?php
    include_once('php/loadArticle.php');
    foreach ($articles as $key => $article) {
        //$stringToEcho = 'id : '.$article['id'].'<br>title :'.$article['title'].'<br>content : '.$article['content'].'<br>';

        $buttonModify = '<button type="button" onclick="modifier_Article(this)">M</button> ';
        $buttonDelete= '<button type="button" onclick="supprimer_Article(this)">S</button> ';
        $id =$article['id'];
        $title=$article['title'];
        $content =$article['content'];
        $divContent = $id.'--'.$title.'--'.$content;
        
        $stringOut ="<div class='Article' id='".$id."'>".$divContent.$buttonModify.$buttonDelete.'</div>'; 
        echo $stringOut;
    }
?>