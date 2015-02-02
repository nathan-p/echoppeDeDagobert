
$.variables = {
    color: 0,
    mail: "",
    isOk: "false"
};

//formulaire function
function checkSignIn(mailValide, inputMail) {
//    var inputMail = $("#inputEmail").val();    
//    alert(mailValide);
    if (mailValide == "true") {
        //var mail = inputMMail;
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
        $("#divRegister > #error").remove();
        $("#divRegister").append("<div id='error'><p style='color:red'>Mail incorrect. Veuillez le ressaisir</p></div>");
    }

}
;


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
    var field = $("#inputEmail").val();
    re = new RegExp('[^@]+@.*\.[^\.]+');
    if (!field.match(re)) {
        return false;
    } else {
        $.ajax({
            type: "GET",
            url: "checkMail.php",
            data: {mail: field}
        }).done(function (isOk) {
//            alert(isOk);
            if (isOk == "true") {
                $.variables.mail = field;
            }
            //$.variables.isOk = isOk;
            checkSignIn(isOk, field);
            //init isOk
        });

//        return ($.variables.isOk == "true");
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


