$.variables = {
    color: 0
}

/************************************************/
/********Fonctions pour la page de connextion****/
/************************************************/
function checkSignIn(mailValide, inputMail) {
    if (mailValide == 'true') {
        $("#divRegister").children().remove();

        $("#divRegister").append("<form action='./createUser.php?' id='signInForm' name='loginForm' method='get'>\n\
                                        <div class='form-group'>\n\
                                            <input type='hidden' name='email' id='mail' value='" + inputMail + "'/>\n\
                                            <label for='prenom'>Prénom</label><input type='text' id='surname' name='prenom' class='form-control' placeholder='Entrez votre prénom'>\n\
                                        </div>\n\
                                        <div class='form-group'>\n\
                                            <label for='nom'>Nom</label><input type='text' id='name' name='nom' class='form-control'  placeholder='Entrez votre nom'>\n\
                                        </div>\n\
                                        <div class='form-group'>\n\
                                            <label for='motDePasse'>Mot de Passe</label><input type='text' id='motDePasse' name='motDePasse' class='form-control'  placeholder='Mot de passe'>\n\
                                        </div>\n\
                                        <button type='button' onclick='checkForm();' class='btn btn-default'>Envoyer</button></form> ");

        $('#consignesMail').html("Vous pouvez maintenant entrer votre nom et prénom pour compléter votre inscription.");
    }
    else {
        if (mailValide == 'Mail Invalide') {
            $("#divRegister > #error").remove();
            $("#divRegister").append("<div id='error'><p style='color:red'>Mail incorrect. Veuillez le ressaisir</p></div>");
        } else {
            $("#divRegister > #error").remove();
            $("#divRegister").append("<div id='error'><p style='color:red'>Mail déjà enregistré. Utilisez votre mot de passe pour vous connecter.</p></div>");
        }
    }

}

function checkForm() {
    $("#divRegister > .error").remove();

    if ($("#surname").val() == '' || $("#surname").val() == undefined ||
            $("#name").val() == '' || $("#name").val() == undefined) {
        $("#divRegister").append("<p class='error' style='color:red'><br>Veuillez saisir correctement vos informations</p>");
    }
    else {
        $('#signInForm').submit();
    }
}

function checkMail() {
    var mailInput = $("#inputEmail").val();
    re = new RegExp('[^@]+@.*\.[^\.]+');
    if (!mailInput.match(re)) {
        checkSignIn('Mail Invalide', mailInput);
    } else {
        $.ajax({
            type: "GET",
            url: "checkMail.php",
            data: {mail: mailInput}
        }).done(function (isOk) {
            checkSignIn(isOk, mailInput);
        });
    }
}

function changeColor() {
    switch ($.variables.color) {
        case 0: // rouge
            $('body').css("background-color", '#8D6E63');
            break;
        case 1: // orange
            $('body').css("background-color", '#A1887F');
            break;
        case 2: // jaune
            $('body').css("background-color", '#795548');
            break;
        default:
            $('body').css("background-color", '#795548');
            break;
    }
    $.variables.color = ($.variables.color + 1) % 3;
}

function changeLanguage() {
    if ($("#language").text() == "Français") {
        $("#language").text("English");
    }
    else {
        $("#language").text("Français");
    }

}


$(document).ready(function () {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function () {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function () {
            //Completed slidetoggle
            if (idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-triangle-top text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-triangle-bottom text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

});



function search() {
    var search = $('#search_input').val();

    window.location.href = './searchResult.php?search='+search;
}

/************************************************/
/********Fonctions pour la page de compte********/
/************************************************/

function cancelEditAdresse() {
    $("#adress-consult").css("display","inline-block");
    $("#adress-edit").css("display","none");
    $("#compte-edit-button").css("cursor","pointer");
    $("#compte-edit-button").css("color","#811512");
    $("#compte-edit-button").attr( "data-toggle","tooltip" );
    $("#compte-edit-button").attr( "data-placement","top" );
    $("#compte-edit-button").attr( "data-original-title","Modifier mon compte" );
}

function detailFacture() {
    //choper l'id facture
    //Appel à facture.php
}


function accountEdit() {
    $("#adress-edit").css("display","inline-block");
    $("#adress-consult").css("display","none");
    $("#compte-edit-button").css("cursor","auto");
    $("#compte-edit-button").css("color","gray");
    $("#compte-edit-button").removeAttr( "data-toggle" );
    $("#compte-edit-button").removeAttr( "data-placement" );
    $("#compte-edit-button").removeAttr( "data-original-title" );
}


/************************************************/
/********Fonctions pour la page de panier********/
/************************************************/


function deleteLineFromCart(lineNumber) {
    alert("Suppression du produit numéro "+lineNumber+" dans le panier");
}