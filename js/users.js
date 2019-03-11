function ajouter_User() {

    // 1) Creation objet
    var xhr = new XMLHttpRequest;

    // 2) Fonction de rappel
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            //code execute quand le serveur renverra une reponse
            var lastUser = JSON.parse(xhr.response);

            //Recuperer les infos
            var User_ID = lastUser[0]['id']
            var User_nom = lastUser[0]['nom']
            var User_prenom = lastUser[0]['prenom']
            var User_email = lastUser[0]['email']
            var newDivUser =  document.createElement("div")
            var ID_param = '('+User_ID+')' //pour les fonctions onclick
            newDivUser.classList.add("UserDiv")

            //Creer le Div et ses sous div nom,prenom (et email ?)
            var DivNom = document.createElement("div")
            DivNom.classList.add("DivNomStyle");
            var DivNomTxt = document.createTextNode(User_nom)
            DivNom.appendChild(DivNomTxt)
            var DivPrenom = document.createElement("div")
            var DivPrenomTxt = document.createTextNode(User_prenom)
            DivPrenom.classList.add("DivPrenomStyle");
            DivPrenom.appendChild(DivPrenomTxt)


            // sous-div du bouton MODIFIER
            var DivBModify = document.createElement("div")
            var BModify= document.createElement("BUTTON")
            var BModify_Txt = document.createTextNode("Modifier")
            //BModify.onclick=modifier_User(User_ID)
            BModify.setAttribute("onclick","modifier_User"+ID_param)
            BModify.appendChild(BModify_Txt)
            DivBModify.appendChild(BModify)

            // sous-div du bouton SUPPRIMER    
            var DivBDelete= document.createElement("div")
            var BDelete= document.createElement("BUTTON")
            var BDelete_Txt = document.createTextNode("Supprimer")
            BDelete.setAttribute("onclick","supprimer_User"+ID_param)
            BDelete.appendChild(BDelete_Txt)
            DivBDelete.appendChild(BDelete)

            // sous-div du bouton VOIR
            var DivBVoir= document.createElement("div")
            var BVoir= document.createElement("BUTTON")
            var BVoir_Txt = document.createTextNode("Voir")
            BVoir.setAttribute("onclick","voir_User"+ID_param)
            BVoir.appendChild(BVoir_Txt)
            DivBVoir.appendChild(BVoir)

            newDivUser.appendChild(DivNom)
            newDivUser.appendChild(DivPrenom)
            //newDivUser.appendChild(DivEmail)
            newDivUser.appendChild(DivBVoir)
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
    
    xhr.send(dataToSend)
}


function supprimer_User(id) {
    // 1) Creation objet
    var xhr = new XMLHttpRequest;

    // 2) Fonction de rappel
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // On ne fait rien
        }
    }
    
    // 3) ouverture requete AJAX
    xhr.open('POST','php/user.delete.php')

    // 4) envoyer la requete

    var dataToSend = new FormData();
    dataToSend.append('id',id);
    xhr.send(dataToSend)

    //Effacer dans le dom
    var DivUserList = document.getElementById('DivUserList')
    DivUserList.removeChild(document.getElementById(id))
}

function modifier_User(id) {
        // 1) Creation objet
        var xhr = new XMLHttpRequest;

        // 2) Fonction de rappel
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                //code execute quand le serveur renverra une reponse
                var lastUser = JSON.parse(xhr.response);
    
                
                //Recuperer les infos
                var User_ID = lastUser[0]['id']
                var User_nom = lastUser[0]['nom']
                var User_prenom = lastUser[0]['prenom']
                var User_email = lastUser[0]['email']
                var newDivUser =  document.createElement("div")
                var ID_param = '('+User_ID+')' //pour les fonctions onclick
                newDivUser.classList.add("UserDiv")
    
                //Recreer la div
                //Creer le Div et ses sous div nom,prenom (et email ?)
                var DivNom = document.createElement("div")
                var DivNomTxt = document.createTextNode(User_nom)
                DivNom.classList.add("DivPrenomStyle");
                DivNom.appendChild(DivNomTxt)
                var DivPrenom = document.createElement("div")
                var DivPrenomTxt = document.createTextNode(User_prenom)
                DivPrenom.classList.add("DivPrenomStyle");
                DivPrenom.appendChild(DivPrenomTxt)
                var DivEmail = document.createElement("div")
                var DivEmailTxt = document.createTextNode(User_email)
                DivEmail.appendChild(DivEmailTxt)
    
                // sous-div du bouton MODIFIER
                var DivBModify = document.createElement("div")
                var BModify= document.createElement("BUTTON")
                var BModify_Txt = document.createTextNode("Modifier")
                //BModify.onclick=modifier_User(User_ID)
                BModify.setAttribute("onclick","modifier_User"+ID_param)
                BModify.appendChild(BModify_Txt)
                DivBModify.appendChild(BModify)
    
                // sous-div du bouton SUPPRIMER    
                var DivBDelete= document.createElement("div")
                var BDelete= document.createElement("BUTTON")
                var BDelete_Txt = document.createTextNode("Supprimer")
                BDelete.setAttribute("onclick","supprimer_User"+ID_param)
                BDelete.appendChild(BDelete_Txt)
                DivBDelete.appendChild(BDelete)
    
                // sous-div du bouton VOIR
                var DivBVoir= document.createElement("div")
                var BVoir= document.createElement("BUTTON")
                var BVoir_Txt = document.createTextNode("Voir")
                BVoir.setAttribute("onclick","voir_User"+ID_param)
                BVoir.appendChild(BVoir_Txt)
                DivBVoir.appendChild(BVoir)
    

    
                //Effacer toutes les divs
                var DivUser = document.getElementById(id)
                while (DivUser.firstChild) {
                    DivUser.removeChild(DivUser.firstChild);
                }
                //Ajouter les nouvelles divs
                DivUser.appendChild(DivNom)
                DivUser.appendChild(DivPrenom)
                DivUser.appendChild(DivBVoir)
                DivUser.appendChild(DivBModify)
                DivUser.appendChild(DivBDelete)

            }
        }
        
        // 3) ouverture requete AJAX
        xhr.open('POST','php/user.update.php')
    
        // 4) envoyer la requete
    
        // recuperer les info à envoyer
        var user_nom = document.getElementById('nom').value;
        var user_prenom = document.getElementById('prenom').value;
        var user_email = document.getElementById('email').value;
        
        var dataToSend = new FormData();
        dataToSend.append('id',id);
        dataToSend.append('nom',user_nom);
        dataToSend.append('prenom',user_prenom);
        dataToSend.append('email',user_email);
        
        xhr.send(dataToSend)
}

function voir_User(id) {
        // 1) Creation objet
        var xhr = new XMLHttpRequest;

        // 2) Fonction de rappel
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // On ne fait rien
                var User = JSON.parse(xhr.response);
                // Recuperer les infos
                var User_ID = User[0]['id']
                var User_nom = User[0]['nom']
                var User_prenom = User[0]['prenom']
                var User_email = User[0]['email']
                var Input_nom = document.getElementById('nom')
                var Input_prenom = document.getElementById('prenom')
                var Input_email = document.getElementById('email')
                Input_nom.value = User_nom
                Input_prenom.value = User_prenom
                Input_email.value = User_email

            }
        }
        
        // 3) ouverture requete AJAX
        xhr.open('POST','php/user.load.php')
    
        // 4) envoyer la requete
    
        var dataToSend = new FormData();
        dataToSend.append('id',id);
        xhr.send(dataToSend)
    
}

function testAlert() {
    alert("Alerte de test")
}