<?php

if(!isset($_SESSION['mail'])) {
    header('Location: ./loginPage.php');
}

include("../includes/header.php");
include("./myAccountFunctions.php");

$mail = $_SESSION['mail'];
$id = getId($mail);
$donnee = getAdress($id);

$name = strtoupper($donnee['nomDestinataire']);
$surname = $donnee['prenomDestinataire'];
$streetName = $donnee['nomRue'];
$postalCode = $donnee['codePostal'];
$cityName = $donnee['ville'];
$country = $donnee['pays'];

//Interoger bd pour demander nom, nb d'adresse, l'adresse, les factures etc...
?>

<div class="content">
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <div class="TitleForm">
                <h2>
                    Information du compte
                </h2>                    
                <hr>


                <div class="row">
                    <div class="col-md-11 col-md-offset-1">
                        <legend>Adresse mail</legend>
                        <label> <?php echo $mail; ?> </label>
                        <br>
                        <br>
                        <!-- Rajouter un champ dynamiquement au clic dans le formulaire password-->
                        <!-- Effacer le formulaire et demander l'ancien mot de passe pour valider-->

                    </div>
                    <br>
                    <br>
                    <div class="col-md-11 col-md-offset-1">
                        <form class="form-horizontal" action='./updateAdress.php' id='editAdressForm' method='post' role="form">
                            <fieldset>
                                <!-- Créer le formulaire avec les bon champs et modifier le sauvegarder pour pointer vers php-->
                                <!-- Form Name -->
                                <legend>
                                    Addresse de livraison 
                                    <div class="pull-right">
                                        <span class="glyphicon glyphicon-edit" onclick="accountEdit();" id="compte-edit-button" 
                                        aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Modifier mon compte"></span>
                                        <br>
                                    </div>
                                </legend>
                                <div id="adress-consult">

                                    <!-- Text input-->
                                    <div class="form-group">
                                        <input type='hidden' name='idUtilisateur' id='idUtilisateur' value='<?php echo $id ?>'/>
                                        <div class="col-sm-4">
                                            <p><b>Nom</b></p>
                                        </div>

                                        <div class="col-sm-8">
                                            <p> <?php echo  $name." ".$surname  ?> </p>
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <p><b>Rue</b></p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p> <?php echo  $streetName ?> </p>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <p><b>Ville</b></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p> <?php echo  $postalCode.' '.$cityName ?> </p>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <p><b>Pays</b></p>
                                        </div>
                                        <div class="col-sm-8">
                                            <p> <?php echo  $country ?> </p>
                                        </div>
                                    </div>
                                </div>


                                <div id="adress-edit">

                                    <!-- Text input-->
                                    <div class="form-group">
                                        <input type='hidden' name='idUtilisateur' id='idUtilisateur' value='<?php echo $id ?>'/>
                                        <div class="col-sm-6">
                                            <input type="text" name='nomDestinataire' placeholder="Nom" value=<?php echo  "'$name'" ?> class="form-control">
                                        </div>

                                        <div class="col-sm-6">
                                            <input type="text" name='prenomDestinataire' placeholder="Prénom" value= <?php echo "'$surname'" ?> class="form-control">
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" name='nomRue' placeholder="Addresse" value=<?php echo  "'$streetName'" ?> class="form-control">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <input type="number" name='codePostal' pattern="^([0-9]{5})$" placeholder="CodePostal" value=<?php echo  "'$postalCode'" ?> class="form-control">
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name='ville' placeholder="Ville" value=<?php echo "'$cityName'" ?> class="form-control">
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" name='pays' placeholder="Pays" value= <?php echo  "'$country'" ?> class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <div class="pull-right">
                                                <button type="button" onClick='cancelEditAdresse();' class="btn btn-default">Annuler</button>
                                                <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </fieldset>
                        </form>
                    </div>       
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="">
                <h2>
                    Historique des commandes
                </h2>                    
                <hr>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Prix hors taxe
                            </th>
                            <th>
                                Prix TTC
                            </th>
                            <th>
                                Détails
                            </th>
                        </tr>
                    </thead>
                    <!--insérer les factures via php--> 
                    <?php getFactures($id); ?>                    
                </table>

            </div>
        </div>
        <div class="col-md-1">            
        </div>
    </div>
</div>
</div>
<?php
include("../includes/footer.php");
?>
