<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page des Articles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script src="main.js"></script>
</head>
<body>
    <!-- Creation d'article -->
    <h2> Ajouter un article </h2>
    <table id="table_article"  >
        <tr>
            <td> titre </td> 
            <td> 
            <input type="text" id="article_title" name="article_title" 
                 size="50" placeholder="Titre de l'article">
            </td>
        </tr>

        <tr>
            <td> 
                content
            </td>
            <td>
                <textarea id="article_content" name="article_content"
                    rows="20" cols="60">
                    
                </textarea>
            </td>
        </tr>
        <tr>
            <td>
            </td>  

            
            <td>
                <button type="button" id="button_addArticle">Ajouter</button> 
                <button type="button" id="button_updateArticle">Update</button> 
            </td>
        </tr>

    </table>

    <h2> Liste des articles </h2>
</body>
</html>