<?php
include("./header.php");

$mail = $_SESSION['mail'];
$name = '';
$surname = '';
$streetNumber = '';
$streetName = '';
$postalCode = '';
$cityName = '';
$country = '';
//Interoger bd pour demander nom, nb d'adresse, l'adresse, les factures etc...
?>

<body>

    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="TitleForm">
                    <h2>
                        Information du compte
                    </h2>                    
                    <hr>
                    <div class="accountForm">
                        <div class="form-group" id="divRegister">
                            <label for="inputEmail">Adresse mail</label>
                            <input name="email" type="email" value='<?php echo $mail; ?>' class="form-control" id="inputEmail" placeholder="Entrez votre email">
                            <br>
                            <label for="inputPassword">Changer de mot de passe</label>
                            <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Entrez votre nouveau mot de passe">
                            <br>
                            <!-- Rajouter un champ dynamiquement au clic dans le formulaire password-->
                            <!-- Effacer le formulaire et demander l'ancien mot de passe pour valider-->
                            <button type="submit" onclick="checkMail();" class="btn btn-default">Modifier</button>
                        </div>          
                    </div>
                    <br>
                    <div class="deliveryForm">
                        <div>
                            <h2>
                                Adresse de livraison
                            </h2>
                            <hr>
                        </div>
                        <!-- afficher "Vous n'avez pas d'adresse de livraison ! Ajoutez en un -->
                        <label for="inputName">Nom</label>
                        <input name="Name" type="Name" value='<?php echo $name; ?>' class="form-control" id="inputName" placeholder="Entrez votre nom">
                        <br>
                        <label for="inputName">Prénom</label>
                        <input name="Surname" type="Surname" value='<?php echo $surname; ?>' class="form-control" id="inputName" placeholder="Entrez votre prénom">
                        <br>
                        <label for="inputName">N° de rue</label>
                        <input name="StreetNumber" type="StreetNumber" value='<?php echo $streetNumber; ?>' class="form-control" id="inputName" placeholder="N°">
                        <br>
                        <label for="inputName">Nom de la rue</label>
                        <input name="StreetName" type="StreetName" value='<?php echo $streetName; ?>' class="form-control" id="inputName" placeholder="Rue, avenue...">
                        <br>
                        <label for="inputName">Code Postal</label>
                        <input name="PostalCode" type="PostalCode" value='<?php echo $postalCode; ?>' class="form-control" id="inputName" placeholder="Code postal">
                        <br>
                        <label for="inputName">Ville</label>
                        <input name="CityName" type="CityName" value='<?php echo $cityName; ?>' class="form-control" id="inputName" placeholder="Entrez votre ville">
                        <br>
                        <label for="inputName">Pays</label>
                        <input name="Country" type="Country" value='<?php echo $country; ?>' class="form-control" id="inputName" placeholder="Entrez votre pays">                
                        <br>

                        <button type="submit" onclick="checkMail();" class="btn btn-default">Modifier</button>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
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
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                1
                            </td>
                            <td>
                                1
                            </td>
                            <td>
                                1
                            </td>
                            <td>
                                <button type="button" class="btn btn-default" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span> PDF
                                </button>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                1
                            </td>
                            <td>
                                1
                            </td>
                            <td>
                                1
                            </td>
                            <td>
                                <button type="button" class="btn btn-default" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span> PDF
                                </button>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</body>

<?php
include("./footer.php");
?>
