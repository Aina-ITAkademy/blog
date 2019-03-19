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

$("#button_loadArticle").click(function() {
    // AjaxTestPost();
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
            // console.log(id)
            // console.log(title)
            // console.log(content)

            //Recuperer la carte exemple "cardModel"
            var cardClone = $("#cardModel").clone().attr('id', cardID);

            $("#cardRow").append(cardClone)

            //Charger le contenu dans la carte clone
            var selectorTitle = '#'+cardID + " h5"
            var selectorText = '#'+cardID + " p"
            $(selectorTitle).text(title)
            $(selectorText).text(content)

                //console.log(element);
                //Creation de carte par article ici
                
        },
        dataType: "json"   
    })
})