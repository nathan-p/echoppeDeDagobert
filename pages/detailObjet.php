<?php
    
include_once("../includes/header.php");
include_once("../model/ObjetManager.php");
include_once("../model/Objet.php");
    
$idObjet = $_GET["idObjet"];
    
$objet = ObjetManager::getObjet($idObjet);
$quantite = 1;

$html = '<div class="col-md-3">'
            . '<div class="photoObjet">'
                . '<img src="../img/' . $objet->getUrlImage() . '" class="img-thumbnail">'
            . '</div>'
        . '</div>'
        . '<div class="col-md-6">'
            . '<h2>' . $objet->getNom() . '</h2>'
            . '<p>' . $objet->getDescription() . '</p>'
            . '<p>Article(s) disponible(s) : ' . $objet->getStock() . '</p>'
        . '</div>'
        . '<div class="col-md-3" style="border: 1px solid #CCC; background-color: #EEEEEE; min-height: 350px; border-radius: 4px;">'
            . '<form action="panier.php" id="ajouterPanier" method="post" role="form">'
                . '<h2>' . $objet->getPrix() . ' €</h2>'
                . '<input type="hidden" name="idObjet" value="' . $objet->getIdObjet() . '"/>'
                . '<p>Quantité :</p>'
                . '<input type="number" name="quantite" value="1" min="1" width="5px" style="width: 50px; padding-left: 7px"/>'
                . '<img src="../img/payment-logo.png">'
                    . '<button type="submit" class="btn btn-default">Ajouter au panier</button>'
            . '</form>'
        . '</div>';
$html = $html.'</ul>';

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