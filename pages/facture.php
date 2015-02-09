<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if(!isset($_SESSION['user'])) {

        header('Location: ./loginPage.php');
    }
    
include_once("../model/Database.php");
include("../includes/header.php");
    
$id = $_POST['id'];
$date = $_POST['date'];
$prixTotalFacture = 0;

function getFactureInfo() {
    global $id, $date;
    echo '<h1> Facture n° ' . $id . ' </h1>'
    . '<h3> Commande passée le ' . $date . ' </h3>';
}

function getArticlesInFacture($idFacture) {
    $request = 'SELECT * FROM `objet_has_facture` as `ohf`, `objet` 
                WHERE `ohf`.`Facture_idFacture` =' . $idFacture .
            ' AND `ohf`.`Objet_idObjet` = `objet`.`idObjet`;';
    $bdd = new Database();
    $donnee = $bdd->getAllData($request);
    $ligne = $donnee->fetch();

    while ($ligne != false) {
        $idObjet = $ligne['Objet_idObjet'];
        $quantite = $ligne['quantite'];
        $commentaire = $ligne['commentaire'];
        $note = $ligne['note'];
        $nom = $ligne['nom'];
        $description = $ligne['description'];
        $prix = $ligne['prix'];
        $nomImg = $ligne['urlImage'];

        addLineArticle($nom, $description, $quantite, $prix, $nomImg);
        $ligne = $donnee->fetch();
    }
    $donnee->closeCursor();
}

function addLineArticle($nom, $description, $quantite, $prix, $nomImg) {
    if($nomImg == null) {
        $urlImg = "http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png";
    } else {        
        $urlImg = "../img/" . $nomImg;
    }
    $prixTotal = $quantite * $prix;
    global $prixTotalFacture;
    $prixTotalFacture = $prixTotalFacture + $prixTotal;

    echo '<tr>
            <td class="col-sm-8 col-md-6">
            <div class="media">
                <a class="thumbnail pull-left" href="./searchResult.php?search=' . $nom . '"> <img class="media-object" src="' . $urlImg . '" style="width: 72px; height: 72px;"> </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="./searchResult.php?search=' . $nom . '">' . $nom . '</a></h4>
                    <h5 class="media-heading"> by <a href="#"> Dagobert Industries </a></h5>
                </div>
            </div>
            </td>
            <td class="col-sm-1 col-md-1 text-center"><strong>' . $quantite . '</strong></td>
            </td>
            <td class="col-sm-1 col-md-1 text-center"><strong>' . $prix . ' €</strong></td>
            <td class="col-sm-1 col-md-1 text-right"><strong>' . $prixTotal . ' €</strong></td>
        </tr>';
}
?>


<div class="container">
    <div class="col-md-12">
        <?php getFactureInfo(); ?>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-11 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Article</th>
                        <th>Quantité</th>
                        <th class="text-center">Prix</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody>

                    <?php getArticlesInFacture($id); ?>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Sous-total</h5></td>
                        <td class="text-right"><h5><strong><?php echo $prixTotalFacture; ?> €</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Frais de livraison</h5></td>
                        <td class="text-right"><h5><strong> GRATUIT ! </strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong> <?php echo $prixTotalFacture; ?> €</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                            <button type="button" onClick="window.location = './compte.php'"  class="btn btn-default">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Retour au compte
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("../includes/footer.php"); ?>
