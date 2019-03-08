<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page des Articles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/un_article.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/articles_main.css" />
    <script src="js/main_article.js"></script>
</head>
<body>

    <!-- Creation d'article -->
    <div id="divArticle_Add">
        <h2> Ajouter un article </h2>
        <?php 
            include_once('view/articles_create_table.php');
        ?>
    </div>

    <!-- Ajout d'article -->
    <div id="mainDiv_Article">
        <h2> Liste des articles </h2>
        <div id="div_article_list">
            <?php
                include_once('view/article_list.php');
            ?>
        </div>

    </div>
</body>
</html>