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

    
}

function load3Articles(lastID) {
    
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
            //Pour eviter erreur si reponse est vide
            if (lastArticle !== undefined && lastArticle !== null) {  
                
                var lastID = lastArticle['id']
                $("#button_loadArticle").click(function() {load3Articles(lastID) })
            }
            
        },
        dataType: "json"   
    })
}

//trouver comment toogle correctement
function toogleSpinner() {
    $("#divSpiner").toggleClass('d-none')
}
$("#button_loadArticle").click(function() {
    toogleSpinner()
    load3Articles(0) 
    })


