<?php
/**
 * Created by PhpStorm.
 * User: Raptor
 * Date: 02/02/2015
 */

include("../includes/header.php");
include("../model/ObjetManager.php");
include("../model/Objet.php");

$categorie = $_GET["categorie"];

$objets = ObjetManager::getObjets($categorie);
$html = '<ol>';
foreach ($objets as $objet) {
    $html = $html
        .'<li>'.$objet->getNom().'</li>'
        .'<li>'.$objet->getDescription().'</li>'
        .'<li><a href="./objet.php?id='.$objet->getIdObjet().'"> click me bitch</a></li>';
}
$html = $html.'</ol>';
?>

<div class="content">
    <?php echo $html ?>
</div>

<?php
include("../includes/footer.php"); ?>