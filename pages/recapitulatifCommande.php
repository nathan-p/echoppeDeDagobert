<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once("../model/Database.php");
include("../model/User.php");
include_once("../model/ObjetManager.php");
include_once("../model/Objet.php");

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header('Location: ./loginPage.php');
}


$user = unserialize($_SESSION['user']);


if (isset($_SESSION['cart'])) {

    $nbProd = count($_SESSION['cart']);
    $prixTotal = $_SESSION['total'];
    $idFacture = creerFacture();
    $factureCree = true;
} else {
    $factureCree = false;
}

include("../includes/header.php");

function creerFacture() {
    $date = date("Y-m-d");
    global $nbProd, $prixTotal, $user;

    $taxe = 19.6;
    $idFacture = pushFacture($date, $prixTotal, $prixTotal, $taxe, $user->getId());
    for ($i = 0; $i < $nbProd; $i++) {
        insertItemInFacture($idFacture, $_SESSION['cart'][$i]['id'], $_SESSION['cart'][$i]['quantite']);
    }
    unset($_SESSION['cart']);
    return $idFacture;
}

//Insertion facture
function pushFacture($date, $prixHT, $prixTotal, $taxe, $idUtilisateur) {
    $request = 'INSERT INTO `bd_echoppe`.`facture`'
            . '(`date`, `prixHT`, `prixTotal`, `taxe`, `Utilisateur_idUtilisateur`)
            VALUES ("' . $date . '", "' . $prixHT . '", "' . $prixTotal . '"
                , "' . $taxe . '", "' . $idUtilisateur . '");';
    $bdd = new Database();
    $donnee = $bdd->getOneData($request);
    $donnee = $bdd->getOneData('SELECT LAST_INSERT_ID()');
    $idFacture = $donnee[0];
    return $idFacture;
}

//Insertion object has Facture
function insertItemInFacture($idFacture, $idObjet, $qte) {
    $request = 'INSERT INTO `bd_echoppe`.`objet_has_facture`'
            . '(`Objet_idObjet`, `Facture_idFacture`, `quantite`)
            VALUES ("' . $idObjet . '", "' . $idFacture . '", "' . $qte . '");';
    $bdd = new Database();
    $donnee = $bdd->getOneData($request);
}

function getFactureInfo() {
    global $id, $date;
    echo '<h1> Facture n° ' . $id . ' </h1>'
    . '<h3> Commande passée le ' . $date . ' </h3>';
}


function sendMail() {
     global $user;
     //ini_set('SMTP','localhost'); 
     $to      = $user->getMail();
     $subject = 'Commande site Echoppe Dagobert';
     $message = 'Bonjour, '."\r\n".'Votre commande à bien été prise en compte. Connectez vous sur l\'echoppe de Dagobert pour consulter votre facture.';
     $headers = 'From: commande@echoppeDagobert.com' . "\r\n" .
     'Reply-To: commande@echoppeDagobert.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

     mail($to, $subject, $message, $headers);
}


function getFeedbackFacture($factureCree) {

    if ($factureCree) {
        global $idFacture;
        $date = date("Y-m-d");
        echo '<div class="alert alert-success" style="margin-left:5%;" role="alert">
                Votre commande à bien été reçue ! Vous avez reçu un mail récapitulatif de votre commande
                <br>
                Vous recevrez votre commande d\'ici quelques jours.
            </div>';
        echo '
            <div style="margin-left:5%;"> 
                Vous pouvez consulter votre facture en cliquant ci-dessous:
            </div>
            <br>
                <form  action="./facture.php" id="factureForm" method="post" role="form">
                    <input type="hidden" name="id" id="id" value="' . $idFacture . '"/>
                    <input type="hidden" name="date" id="date" value="' . $date . '"/>
                    <div class="text-center">
                        <button type="submit" class="btn btn-default btn-sm" aria-label="Details">
                            <span class="glyphicon glyphicon-file" aria-hidden="true"></span> Voir votre facture
                        </button>
                    </div>
                </form>';
    } else {
        echo '<div class="alert alert-danger" style="margin-left:5%;" role="alert">
                Une erreur est survenue : votre panier est vide.
                <br>
                Veuillez ajouter au moins un article avant de procéder au paiement.
            </div>';
        echo '<p class="text-center"> 
                <a href=\'./home.php\'>
                    Cliquez ici pour retourner à l\'accueil
                </a>
            </p>';
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">     
            <ol style="margin-left:5%;" class="breadcrumb">
                <li><a href="./home.php">Accueil</a></li>
                <li><a href="./panier.php">Panier</a></li>
                <li class="active">Récapitulatif de la commande</li>
            </ol>
            <?php 
                sendMail();
                getFeedbackFacture($factureCree);

             ?>            
        </div>
    </div>
</div>
<?php include("../includes/footer.php"); ?>
