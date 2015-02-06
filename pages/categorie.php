<?php
     
include_once("../includes/header.php");
include_once("../model/ObjetManager.php");
include_once("../model/Objet.php");
    
$categorie = $_GET["categorie"];
// Par convention, on met les espaces avec le caractère '_'. On remplace
// donc ici tous les '_' par des espaces.
// Problème sinon dans les $_GET avec les espaces remplacés par '%20'
$categorie = str_replace("_", " ", $categorie);

$objets = ObjetManager::getObjets($categorie);
$html = '<ul style="list-style: none">';
foreach ($objets as $objet) {
    $html = $html
        . '<div class="col-md-4">'
            . '<li><h2>' . $objet->getNom() . '</h2></li>'
            . '<li>'
                . '<div class="photoObjet">'
                    . '<img src="../img/' . $objet->getUrlImage() . '">'
                . '</div>'
            . '</li>'
            . '<li>' . $objet->getDescription() . '</li>'
            . '<a href="./detailObjet.php?idObjet=' . $objet->getIdObjet() . '" style="color: white"> '
                . '<li class="btn btn-default pull-right">'
                    . 'Détails'
                . '</li>'
            . '</a>'
        . '</div>';
}
$html = $html.'</ul>';
?>
    
<div class="content">
    <ol class="breadcrumb">
        <li><a href="./home.php">Accueil</a></li>
        <li class="active"><?php echo $categorie ?></li>
    </ol>
    <h1 class="content-heading"><?php echo $categorie ?></h1>
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