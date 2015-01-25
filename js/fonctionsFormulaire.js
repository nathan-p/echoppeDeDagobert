 function checkSignIn(){
    var inputMail = $("#inputEmail").val();

    if(checkMail(inputMail)) {
        $("#divRegister").children().remove();

        $( "#divRegister" ).append( "<form action='http://127.0.0.1/Master/Echoppe_Dagobert/loginPage.html?' id='signInForm' name='loginForm' method='get'><div class='form-group'><label for='prenom'>Prénom</label><input type='text' id='surname' name='prenom' class='form-control' placeholder='Entrez votre prénom'></div><div class='form-group'><label for='nom'>Nom</label><input type='text' id='name' name='nom' class='form-control'  placeholder='Entrez votre nom'></div><button type='button' onclick='checkForm();' class='btn btn-default'>Envoyer</button></form> " );

        $('#consignesMail').html("Vous pouvez maintenant entrer votre nom et prénom pour compléter votre inscription.");
    } 
    else {
        $( "#divRegister > #error" ).remove();
        $( "#divRegister" ).append("<div id='error'><p style='color:red'>Mail incorrect. Veuillez le ressaisir</p></div>");
    }

};


function checkForm() { 
    $( "#divRegister > .error" ).remove();

    if( $("#surname").val() == '' || $("#surname").val() == undefined ||

        $("#name").val() == '' || $("#name").val() == undefined  ) {
        $( "#divRegister" ).append("<p class='error' style='color:red'><br>Veuillez saisir correctement vos informations</p>");
    } 
    else {  
        $('#signInForm').submit();
    }
}


function checkMail(field) {
    re = new RegExp('[^@]+@.*\.[^\.]+');
    if (!field.match(re)) {
        //window.alert("Votre adresse mail n'a pas une forme valide");
        return false;
    } else {
        //addFieldOnRegister();
        return true;
    }
}


function checkName(field) {
    if( field.val() == '' || field.val() == undefined  ) {
        return false;
    }
    return true;
}

function addFieldOnRegister() {    
    var nomUtilisateur = "Nom utilisateur";
    var newLabel = document.createElement('p');
    var nodeNomUtilisateur = document.createTextNode(nomUtilisateur);
    newLabel.appendChild(nodeNomUtilisateur);

    var inputNomUtilisateur = "InputNomUtilisateur";
    var newInput = document.createElement('input');
    newInput.className = "form-control";
    //alert(document.registerForm.name);
    document.registerForm.appendChild(newLabel);
//    var toto = document.getElementsByName(document.forms[0].name);
//    alert(document.getElementById('toto'));
//    document.getElementByName('registerForm').appendChild(newLabel);
//    document.getElementByName('registerForm').appendChild(newInput);
}