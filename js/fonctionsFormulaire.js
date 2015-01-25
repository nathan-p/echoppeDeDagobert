 
 $( document ).ready( function() {
  

});
$.variables = { 
    color : 0 
}; 

//formulaire function
 function checkSignIn(){
    var inputMail = $("#inputEmail").val();

    if(checkMail(inputMail)) {
        $("#divRegister").children().remove();

        $( "#divRegister" ).append( "<form action='./loginPage.html?' id='signInForm' name='loginForm' method='get'><div class='form-group'><label for='prenom'>Prénom</label><input type='text' id='surname' name='prenom' class='form-control' placeholder='Entrez votre prénom'></div><div class='form-group'><label for='nom'>Nom</label><input type='text' id='name' name='nom' class='form-control'  placeholder='Entrez votre nom'></div><button type='button' onclick='checkForm();' class='btn btn-default'>Envoyer</button></form> " );

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
        return false;
    } else {
        return true;
    }
}

function changeColor() {
    switch($.variables.color) {
        case 0: // rouge
            $('body').css( "background-color",'#D7CCC8' ); break;
        case 1: // orange
            $('body').css( "background-color",'#B0BEC5' ); break;
        case 2: // jaune
            $('body').css( "background-color",'#efeeee' ); break;
        default:
            $('body').css( "background-color",'#efeeee' ); break;
    }
    $.variables.color = ($.variables.color +1 ) % 3 ;
}

function changeLanguage() {
    

    if($("#language").text() == "Français") {
        $("#language").text("English");
    } 
    else {
        $("#language").text("Français");
    }
    
}


