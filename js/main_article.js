function ajouter_Article() {

        // 1) Creation objet
        var xhr = new XMLHttpRequest;

        // 2) Fonction de rappel
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                //code execute quand le serveur renverra une reponse
                var lastArticle = JSON.parse(xhr.response);
                var id = lastArticle.id
                var title = lastArticle.title
                var content = lastArticle.content

                var outString = id+'--'+title+'--'+content
                var diVArticle =  document.getElementById('div_article_list');
                var divNewArticle = document.createElement("div");
                var newContent = document.createTextNode(outString); 
                var divNewArticle = document.createElement("div");
                diVArticle.appendChild(newContent);  
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

function modifier_Article(e) {

}

function supprimer_Article(e){

    // Effacer visuelement dans le DOM via le parent
    var parentid = e.parentNode.id // id parent = id de l'article dans base de donnee
    var divParent = document.getElementById(parentid)
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
    dataToSend.append('id',parentid);
    xhr.send(dataToSend)
    // A tester
    
}

function update_Article() {

}
function test(){
    alert('test')
}