<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once("../model/Database.php");
include("../model/User.php");
include("../includes/header.php");
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['user'])) {

    header('Location: ./loginPage.php');
}

$user = unserialize($_SESSION['user']);

function creerFacture() {
    
}

//addObject dans une classe facture plutôt que pushFacture?
function pushFacture($date, $prixHT, $prixTotal, $taxe, $idUtilisateur, $qte, $idObjet) {
    //Insertion facture
    $request = 'INSERT INTO `bd_echoppe`.`facture`'
            . '(`date`, `prixHT`, `prixTotal`, `taxe`, `Utilisateur_idUtilisateur`)
            VALUES ("' . $date . '", "' . $prixHT . '", "' . $prixTotal . '"
                , "' . $taxe . '", "' . $idUtilisateur . '");';
    $bdd = new Database();
    $donnee = $bdd->getOneData($request);
    $donnee = $bdd->getOneData('SELECT LAST_INSERT_ID()');    
    $idFacture = $donnee[0];    
    //Insertion object has Facture
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
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php pushFacture("2015-04-03", "45", "50", "0", $user->getId(), "2", "1") ?>
        </div>
    </div>
</div>
<?php include("../includes/footer.php"); ?>
