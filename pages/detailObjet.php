<?php
    
include_once("../includes/header.php");
include_once("../model/ObjetManager.php");
include_once("../model/Objet.php");
    
$idObjet = $_GET["idObjet"];
    
$objet = ObjetManager::getObjet($idObjet);
$html = '<ul style="list-style: none">';
    $html = $html
        . '<div class="col-md-4">'
            . '<li><h2>' . $objet->getNom() . '<h2></li>'
            . '<li>'
                . '<img src="../img/' . $objet->getUrlImage() . '">'
            . '</li>'
            . '<li>' . $objet->getDescription() . '</li>'
            . '<a href="./panier.php" style="color: white"> '
                . '<li class="btn btn-default pull-right">'
                    . 'Acheter'
                . '</li>'
            . '</a>'
        . '</div>';
$html = $html.'</ul>';
?>
    
<div class="content">
    <ol class="breadcrumb">
        <li><a href="./home.php">Accueil</a></li>
        <li class="active"><?php echo $objet->getNom() ?></li>
    </ol>
    <h1 class="content-heading">Détail du produit</h1>
    <div class="row">
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