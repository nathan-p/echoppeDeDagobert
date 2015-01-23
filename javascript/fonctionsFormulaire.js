/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function checkForm(formulaire) {
    checkMail(formulaire.email);
}

function checkMail(field) {
    re = new RegExp('[^@]+@.*\.[^\.]+');
    if (!field.value.match(re)) {
        window.alert("Votre adresse mail n'a pas une forme valide");
    } else {
        addFieldOnRegister();
    }
}

function checkName(field) {
    if ((field.value == '') || (field.value == undefined)) {
        window.alert('Vous devez donner un nom');
    }
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