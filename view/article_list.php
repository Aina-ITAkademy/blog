<?php
    include_once('php/loadArticle.php');
    foreach ($articles as $key => $article) {
        //$stringToEcho = 'id : '.$article['id'].'<br>title :'.$article['title'].'<br>content : '.$article['content'].'<br>';


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