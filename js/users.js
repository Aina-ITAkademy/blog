function ajouter_User() {

    // 1) Creation objet
    var xhr = new XMLHttpRequest;

    // 2) Fonction de rappel
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            //code execute quand le serveur renverra une reponse
            var lastUser = JSON.parse(xhr.response);
            var User_ID = lastUser[0]['id']
            var User_nom = lastUser[0]['nom']
            var User_prenom = lastUser[0]['prenom']
            var User_email = lastUser[0]['email']
            var newDivUser =  document.createElement("div")
            newDivUser.classList.add("UserDiv")

            var DivNom = document.createElement("div")
            var DivNomTxt = document.createTextNode(User_nom)
            DivNom.appendChild(DivNomTxt)
            var DivPrenom = document.createElement("div")
            var DivPrenomTxt = document.createTextNode(User_prenom)
            DivPrenom.appendChild(DivPrenomTxt)
            var DivEmail = document.createElement("div")
            var DivEmailTxt = document.createTextNode(User_email)
            DivEmail.appendChild(DivEmailTxt)

            var DivBModify = document.createElement("div")
            var BModify= document.createElement("BUTTON")
            var BModify_Txt = document.createTextNode("Modifier")
            BModify.onclick=modifier_User(User_ID)
            BModify.appendChild(BModify_Txt)
            DivBModify.appendChild(BModify)

            var DivBDelete= document.createElement("div")
            var BDelete= document.createElement("BUTTON")
            var BDelete_Txt = document.createTextNode("Supprimer")
            BDelete.onclick=supprimer_User(User_ID)
            BDelete.appendChild(BDelete_Txt)
            DivBDelete.appendChild(BDelete)


            newDivUser.appendChild(DivNom)
            newDivUser.appendChild(DivPrenom)
            newDivUser.appendChild(DivEmail)
            newDivUser.appendChild(DivBModify)
            newDivUser.appendChild(DivBDelete)

            newDivUser.id = User_ID
            var DivUser = document.getElementById('DivUserList')
            DivUser.appendChild(newDivUser)

        }
    }
    
    // 3) ouverture requete AJAX
    xhr.open('POST','php/user.add.php')

    // 4) envoyer la requete

    // recuperer les info à envoyer
    var user_nom = document.getElementById('nom').value;
    var user_prenom = document.getElementById('prenom').value;
    var user_email = document.getElementById('email').value;

    var dataToSend = new FormData();
    dataToSend.append('nom',user_nom);
    dataToSend.append('prenom',user_prenom);
    dataToSend.append('email',user_email);
    
    // alert("Donnee recuperée : \n" + 
    //                         user_nom + "\n" +
    //                         user_prenom + "\n" +
    //                         user_email + "\n")
    xhr.send(dataToSend)
}


function supprimer_User() {

}

function modifier_User() {

}
