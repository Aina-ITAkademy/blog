function ajaxComment() {
    

    // 1) Creation objet
    var xhr = new XMLHttpRequest;

    // 2) Fonction de rappel
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            //code execute quand le serveur renverra une reponse
           
        }
    }
    
    // 3) ouverture requete AJAX
    xhr.open('POST','http://192.168.33.10/blog/phpscript/postcomment.php') // mettre l'adresse  du script php

    // 4) envoyer la requete
    //preparer les donnees (date et commentaire)
    var dataToSend = new FormData();
    var d = new Date();

    // TODO Construction de date
    var year  = d.getFullYear;
    var month = d.getMonth;
    var day = d.getDay;


    var comment = document.getElementById('TextComment').value;
    dataToSend.append('comment',comment)
    xhr.send(dataToSend)
}