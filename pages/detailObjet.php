<?php
    
include_once("../includes/header.php");
include_once("../model/ObjetManager.php");
include_once("../model/Objet.php");
    
$idObjet = $_GET["idObjet"];
    
$objet = ObjetManager::getObjet($idObjet);
$html = '<div class="col-md-4" style="border: 1px solid #999999; padding-bottom: 1em; min-height: 350px">'
            . '<h2>' . $objet->getNom() . '</h2>'
            . '<div class="photoObjet">'
                . '<img src="../img/' . $objet->getUrlImage() . '">'
            . '</div>'
        . '</div>'
        . '<div class="col-md-5">'
            . '<h2>Description</h2>'
            . $objet->getDescription()
        . '</div>'
        . '<div class="col-md-3" style="border: 1px solid #999999; background-color: #EEEEEE; min-height: 350px">'
        . '<h2>' . $objet->getPrix() . ' €</h2>'
        . '<img src="../img/payment-logo.png">'
            . '<a class="btn btn-default" href="./panier.php" style="color: white"> '
                . 'Acheter'
            . '</a>'
        . '</div>'
        ;
$html = $html.'</ul>';

function addToCart($idObjet, $quantite) {
    
}

?>
    
<div class="content">
    <ol class="breadcrumb">
        <li><a href="./home.php">Accueil</a></li>
        <li class="active"><?php echo $objet->getNom() ?></li>
    </ol>
    <h1 class="content-heading">Détail du produit</h1>
    <div class="row" style="padding: 1em">
        <div class="product-list">
            <?php echo $html ?>
        </div>
    </div>
</div>
    
<br><br><br>
</div>
    
<?php
include_once("../includes/footer.php");
?>