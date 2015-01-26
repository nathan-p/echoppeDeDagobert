<?php include("header.php"); ?>

            <div class="mainDiv">
                <div class="content">
                    <ol class="breadcrumb">
                        <li><a href="./index.html">Home</a></li>
                        <li class="active">Authentication</li>
                    </ol>
                    <h1 class="TitleMainDiv">
                        Authentication
                    </h1>
                    <div class="row ">
                        <div class="col-md-5 " > 
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
                        <div class="col-md-5 col-md-offset-2"> 
                            <div  id="LoginFormGrid">
                                <div class="TitleForm">
                                    <h2>
                                        Vous avez déjà un compte ?
                                    </h2>
                                    <hr>
                                </div>
                                <div class="LoginForm">
                                    <form name="loginForm">
                                        <div class="form-group">
                                            <label for="InputEmail">Adresse mail</label>
                                            <input type="email" class="form-control" id="InputEmail" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label for="InputPassword">Mot de passe</label>
                                            <input type="password" class="form-control" id="InputPassword" placeholder="Password">
                                        </div>
                                        <br>
                                        <!-- ENVOI BDD -->
                                        <button type="submit" onclick="checkForm()" class="btn btn-default">Se connecter</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<?php include("footer.php"); ?>