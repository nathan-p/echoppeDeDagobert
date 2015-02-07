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
    $desc = $objet->getDescription();
    // limiter la description à 150 caractères
    if (mb_strlen($desc) > 147) {
        $desc = rtrim(mb_strimwidth($desc, 0, 147))."...";
    }
    $prix = "";
    if (!is_null($objet->getPromotions())) {
        $prix = '<div><span style="text-decoration:line-through"> ' . $objet->getPrix() . '€</span>';
        $prix .= '   -'.$objet->getPromotions().'% <br>'.($objet->getPrix()*(1-($objet->getPromotions()/100))).'€</div>';
    } else {
        $prix = '<span> ' . $objet->getPrix() . '€</span><br>';
    }
    $html = $html
        . '<div class="col-md-4">'
            . '<div class="col-md-11 well" style="padding:10px">'
                . '<li>'
                    . '<div class="photoObjet">'
                        . '<img src="../img/' . $objet->getUrlImage() . '">'
                    . '</div>'
                .  '</li>'
                . '<li><h2>' . $objet->getNom() . '</h2></li>'
                . '<li style="height:60px">' . $desc . ' </li>'
                . '<li>'
                    .$prix

                    . '<a href="./detailObjet.php?idObjet=' . $objet->getIdObjet() . '" style="color: white"> '
                        . '<div class="btn btn-default pull-right">'
                            . 'Détails'
                        . '</div>'
                    . '</a>'
                . '</li>'
                . '</div>'
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