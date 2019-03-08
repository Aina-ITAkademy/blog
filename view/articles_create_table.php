<!-- Creation d'article -->

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
                rows="20" cols="60"></textarea>
        </td>
    </tr>
    <tr>
        <td>
        </td>             
        <td>
            <button type="button" id="button_addArticle" onclick='ajouter_Article()'>Ajouter</button> 
            <button type="button" id="button_updateArticle" onclick="update_Article(-1)">Update</button> 
        </td>
    </tr>
</table>

