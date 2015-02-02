<?php 
include("header.php"); 

if(isset($_GET["state"]) && $_GET["state"] == "wrong" ) {
    $wrongConnection = false;
}
else {
    $wrongConnection = true;
}

?>
<br>    
<div style="margin-top:40px;">
    <div class="content">
        <ol class="breadcrumb">
            <li><a href="./index.php">Home</a></li>
            <li class="active">Authentication</li>
        </ol>
        <h1 class="TitleMainDiv">
            Authentication
        </h1>
        <div class="row ">
            <div class="col-md-4 col-md-offset-1" > 
                <div id="RegisterFormGrid"> 
                    <div class="TitleForm">
                        <h2>
                            Créer un compte
                        </h2>                    
                        <hr>
                    </div>
                    <div>
                        <p id="consignesMail">
                            Merci d'entrer votre adresse mail pour vous inscrire
                        </p>
                    </div>
                    <div class="RegisterForm">
                        <div class="form-group" id="divRegister">
                            <label for="inputEmail">Adresse mail</label>
                            <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Entrez votre email">
                            <br>
                            <button type="submit" onclick="checkSignIn();" class="btn btn-default">Créer un compte</button>
                        </div>          

                    </div>
                </div>
            </div>
            <div class="col-md-5 col-md-offset-1"> 
                <div  id="LoginFormGrid">
                    <div class="TitleForm">
                        <h2>
                            Vous avez déjà un compte ?
                        </h2>
                        <hr>
                    </div>
                    <div class="LoginForm">
                        <form name="loginForm" action='./connect.php'>
                            <div class="form-group">
                                <label for="InputEmail">Adresse mail</label>
                                <input type="email" class="form-control" name="mail" id="InputEmail" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="InputPassword">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="InputPassword" placeholder="Password">
                            </div>
                            <input type="text" style="display:none;" class="form-control" name="connect" value="true">
                            <?php 
                            if(!$wrongConnection) 
                                echo "<p style='color:red;'>Votre mot de passe ou mail est incorrect !</p>"; 
                            ?>
                            <br>
                            <!-- ENVOI BDD -->
                            <button type="submit" class="btn btn-default">Se connecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br><br><br><br><br>
</div>
<?php include("footer.php"); ?>
