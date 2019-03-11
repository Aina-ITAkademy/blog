function ajaxComment() {
    
    // 1) Creation objet
    var xhr = new XMLHttpRequest;

    // 2) Fonction de rappel
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            //code execute quand le serveur renverra une reponse

            var parentDiv = document.getElementById('commentDivParent');
            //creation de l'enfant
            var commentDiv = document.createElement("div");
            var commentText = document.getElementById('TextComment').value;
            var pText = document.createElement("div");
            pText.innerHTML = commentText;

            var lastChild = parentDiv.lastElementChild;
            var lastChildClass = lastChild.className

            var commentClass;
            switch (lastChildClass) {
                case 'commentDiv0':
                    commentClass = 'commentDiv1'
                    break
                case 'commentDiv1' :
                    commentClass = 'commentDiv0'
                default:
                    commentClass = 'commentDiv0'
                    break
            }
            
            commentDiv.classList.add(commentClass)

            //ajout dans le Dom
            commentDiv.appendChild(pText);
            parentDiv.appendChild(commentDiv);
            
        }
    }
    
    // 3) ouverture requete AJAX
    xhr.open('POST','php/comment.send.php')

    // 4) envoyer la requete
    //preparer les donnees (date et commentaire)
    var dataToSend = new FormData();
    var d = new Date();

    // Construction de date ?
    var year  = d.getFullYear;
    var month = d.getMonth;
    var day = d.getDay;

    // recuperer le comment
    var comment = document.getElementById('TextComment').value;
    dataToSend.append('comment',comment)
    xhr.send(dataToSend)
}

function isNotClicked(e) {
    
    if (e.classList.contains('button_notClicked')) {
        return true;
    }
    else {
        return false;
    }
}
function sendLike(leLike) {
    // 1) Creation objet
    var xhr = new XMLHttpRequest;

    // 2) Fonction de rappel
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {

            var reponse = xhr.responseText  //contenu de la reponse
            /////// update du compteur de like
            var compteur = document.getElementById('divLikeTxt')
            var compteurVal = (Number(compteur.innerHTML) + Number(leLike))
           
            compteur.innerHTML = compteurVal
            
        }
    }

    // 3) ouverture requete AJAX
    xhr.open('POST','php/like.send.php')

    // 4) envoyer la requete
    //preparer les donnees (le Like/dislike)
    var dataToSend = new FormData();

    // recuperer le comment
    
    dataToSend.append('like',leLike)
    xhr.send(dataToSend)

}

function ajaxLike(e) {
    var idelemt = e.id;
    
    //Bouton not_clicked
    if (isNotClicked(e)) { 
        //Si bouton like enlever 1
        if (e.id == 'buttonLike') {
            // envoyer +1 a la DB
            sendLike(1)
            //changer la couleur du bouton
            e.classList.remove('button_notClicked')
            e.classList.add('button_clicked_like')
        }
    
        if (e.id == 'buttonDislike') {

            // envoyer -1 a la DB
            sendLike(-1)
            //changer la couleur du bouton
            e.classList.add('button_clicked_dislike')
            e.classList.remove('button_notClicked')
        }
        
    }

    // Bouton clicked
    else {

        //Si bouton like enlever 1
        if (e.id == 'buttonLike') {
        sendLike(-1)

        //changer la couleur du bouton
        e.classList.remove('button_clicked_like')
        e.classList.add('button_notClicked')
        }

        if (e.id == 'buttonDislike') {
            sendLike(1)
            //changer la couleur du bouton
            e.classList.remove('button_clicked_dislike')
            e.classList.add('button_notClicked')
        }   
    }
}
