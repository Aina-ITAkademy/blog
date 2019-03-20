function AjaxTestPost() {
    $.post({
        url: "php/article.add.php",
        data: {
            article_title : "Titre jQuery",
            article_content : "C'est ajouté via jQuerry"
        },
        success: function( article ) {
            
        },
        dataType: "json"   
    })
}

//Charger les articles
// $("#button_loadArticle").click(function() {
//     // AjaxTestPost();
//     $.post({
//         url: "php/acceuil.articles.loadAll.php",
//         data: {
//         },
//         success: function( reponse ) {
//             reponse_reverse = reponse.reverse()
//             reponse_reverse.forEach(function(element) {
//                 //console.log(element);
//                 //Creation de carte par article ici
                
//             })
//         },
//         dataType: "json"   
//     })
// })

//fonction de test pour charger le 1er article avec id 1
function loadArticle1() {
    $.post({
        url: "php/acceuil.articles.load.php",
        data: {
            id : 1
        },
        success: function( reponse ) {
            
            //Info en reponse
            var id = reponse["id"]
            var title = reponse["title"]
            var content = reponse["content"]
            var cardID = 'card' + id
            var cardIDselector = '#' + cardID
            //Recuperer la carte exemple "cardModel"
            var cardClone = $("#cardModel").clone().attr('id', cardID);

            $("#cardRow").append(cardClone)

            //Charger le contenu dans la carte clone
            var selectorTitle = cardIDselector + " h5"
            var selectorText = cardIDselector + " p"
            $(selectorTitle).text(title)
            $(selectorText).text(content)

            //Enlever le display none
            $(cardIDselector).removeClass("d-none")

            //changer le onclick du bouton

        },
        dataType: "json"   
    })
}

//Test pour charger les 3 premier article 1 par un
function loadArticleTest(articleID) {
    $.post({
        url: "php/acceuil.articles.load.php",
        data: {
            id : articleID
        },
        success: function( reponse ) {
            
            //Info en reponse
            var id = reponse["id"]
            var title = reponse["title"]
            var content = reponse["content"]
            clonageCard(id, title, content) 

            //changer le onclick du bouton
            $("#button_loadArticle").click(function() {loadArticleTest(articleID+1) })
        },
        dataType: "json"   
    })
}

// Fonction pour cloner et modifier
function clonageCard(id, title, content) {
                //Info en reponse
                var cardID = 'card' + id
                var cardIDselector = '#' + cardID
                //Recuperer la carte exemple "cardModel"
                var cardClone = $("#cardModel").clone().attr('id', cardID);
    
                $("#cardRow").append(cardClone)
    
                //Charger le contenu dans la carte clone
                var selectorTitle = cardIDselector + " h5"
                var selectorText = cardIDselector + " p"
                $(selectorTitle).text(title)
                $(selectorText).text(content)
    
                //Enlever le display none
                $(cardIDselector).removeClass("d-none")
    
                //changer le onclick du bouton
                //$("#button_loadArticle").click(function() {loadArticleTest(articleID+1) })
}

function load3Article(lastID) {
    $.post({
        url: "php/acceuil.articles.load.last3.php",
        data: {
            id : lastID
        },
        success: function( reponse ) {
            
            //Traiter chaque carte
            reponse.forEach(function(article) {
                clonageCard(article['id'],article['title'],article['content'])
            });

           //recuperer le dernier id
           var lastArticle = reponse.pop();
           var lastID = lastArticle['id']
           $("#button_loadArticle").click(function() {load3Article(lastID) })
        },
        dataType: "json"   
    })
}

//$("#button_loadArticle").click(loadArticle1)
//$("#button_loadArticle").click(function() {loadArticleTest(1) })


$("#button_loadArticle").click(function() {load3Article(0) })


