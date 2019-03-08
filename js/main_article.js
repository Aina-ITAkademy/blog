function ajouter_Article() {

        // 1) Creation objet
        var xhr = new XMLHttpRequest;

        // 2) Fonction de rappel
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                //code execute quand le serveur renverra une reponse
                var lastArticle = JSON.parse(xhr.response);

                //Recuperer les informations et les formater dans outString
                var id = lastArticle.id
                var title = lastArticle.title
                var content = lastArticle.content
                var outString = id+'--'+title+'--'+content

                var ID_param = '('+id+')' //pour les fonctions onclick des boutons
                //Creation du bouton Modifier "M"
                var DivBModify = document.createElement("div")
                var BModify= document.createElement("BUTTON")
                var BModify_Txt = document.createTextNode("M")
                BModify.setAttribute("onclick","modifier_Article"+ID_param)
                BModify.appendChild(BModify_Txt)
                //Creation du bouton Supprimer "S"
                var DivBSuppr = document.createElement("div")
                var BSuppr= document.createElement("BUTTON")
                var BSuppr_Txt = document.createTextNode("S")
                BSuppr.setAttribute("onclick","supprimer_Article"+ID_param)
                BSuppr.appendChild(BSuppr_Txt)

                //Recuperer le div principal des articles et creer le nouveau sous-div
                var diVArticle =  document.getElementById('div_article_list');
                var divNewArticle = document.createElement("div");

                //Ajouter le text et les 2 bouton dans le nouveau Div
                var newContent = document.createTextNode(outString); 
                divNewArticle.appendChild(newContent)
                divNewArticle.appendChild(BModify)
                divNewArticle.appendChild(BSuppr)

                // Ajouter un id et la class "Article"
                divNewArticle.id = id
                divNewArticle.classList.add('Article')
                // Ajouter le nouveau Div dans la div principal
                diVArticle.appendChild(divNewArticle);  

                
            }
        }
        
        // 3) ouverture requete AJAX
        xhr.open('POST','php/article.add.php')
    
        // 4) envoyer la requete
    
        // recuperer le titre et contenu
        var article_title = document.getElementById('article_title').value;
        var article_content = document.getElementById('article_content').value;
        var dataToSend = new FormData();
        dataToSend.append('article_title',article_title);
        dataToSend.append('article_content',article_content);
        xhr.send(dataToSend)
}

function modifier_Article(id) { //pour charger l'article afin qu'il soit update
            // 1) Creation objet
            var xhr = new XMLHttpRequest;

            // 2) Fonction de rappel
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    //code execute quand le serveur renverra une reponse
                    var Article_Amodifier = JSON.parse(xhr.response);
                    var Article_id = Article_Amodifier[0]['id']
                    var Modif_Article_title = Article_Amodifier[0]['title']
                    var Mofid_Article_content = Article_Amodifier[0]['content']

                    var article_title = document.getElementById('article_title')
                    var article_content = document.getElementById('article_content')

                    article_title.value = Modif_Article_title
                    article_content.value = Mofid_Article_content

                    //modifier le onclick du bouton update
                    var Button_Update = document.getElementById('button_updateArticle')
                    var Button_onclick_txt = "update_Article("+ Article_id +")" 
                    Button_Update.setAttribute('onclick',Button_onclick_txt)
                    Button_Update.innerHTML="Update " + "(" + Article_id+ ")"
                }
            }
            
            // 3) ouverture requete AJAX
            xhr.open('POST','php/article.modifier.php')
        
            // 4) envoyer la requete
        
            // recuperer le titre et contenu
            var dataToSend = new FormData();
            dataToSend.append('id',id);
            xhr.send(dataToSend)
}


function supprimer_Article(id){

    // Effacer visuelement dans le DOM via le parent
    var divid = id // id parent = id de l'article dans base de donnee
    var divParent = document.getElementById(divid)
    var divMain = document.getElementById('div_article_list')
    divMain.removeChild(divParent)

    // Effacer dans la base de donnee
    var xhr = new XMLHttpRequest;
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {

        }
    }
    xhr.open('POST','controller/deleteArticle.php')
    var dataToSend = new FormData();
    dataToSend.append('id',divid);
    xhr.send(dataToSend)
   
    
}

function update_Article(id) {
    if (id ==-1) {  //si -1 c'est qu'aucun article a modifier a ete choisie
        alert("Choisissez d'abord un article à modifier")
    }
    else {

        var xhr = new XMLHttpRequest;

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var Article_AUpdate = JSON.parse(xhr.response);
                var Article_id = Article_AUpdate[0]['id']
                var Update_Article_title = Article_AUpdate[0]['title']
                var Update_Article_content = Article_AUpdate[0]['content']

                var Stringout = Article_id+'--'+Update_Article_title+'--'+Update_Article_content


                var ID_param = '('+Article_id+')' //pour les fonctions onclick des boutons
                //Creation du bouton Modifier "M"
                // var DivBModify = document.createElement("div")
                var BModify= document.createElement("BUTTON")
                var BModify_Txt = document.createTextNode("M")
                BModify.setAttribute("onclick","modifier_Article"+ID_param)
                BModify.appendChild(BModify_Txt)
                //Creation du bouton Supprimer "S"
                // var DivBSuppr = document.createElement("div")
                var BSuppr= document.createElement("BUTTON")
                var BSuppr_Txt = document.createTextNode("S")
                BSuppr.setAttribute("onclick","supprimer_Article"+ID_param)
                BSuppr.appendChild(BSuppr_Txt)

                var DivUpdate = document.getElementById(id)
                DivUpdate.innerHTML = Stringout
                
                DivUpdate.appendChild(BModify)
                DivUpdate.appendChild(BSuppr)
            }
        }

        xhr.open('POST','php/article.update.php')
        var dataToSend = new FormData();
        var article_title = document.getElementById('article_title').value
        var article_content = document.getElementById('article_content').value
        dataToSend.append('id',id);
        dataToSend.append('title',article_title);
        dataToSend.append('content',article_content);
        xhr.send(dataToSend)
    }

}
function test(){
    alert('test')
}