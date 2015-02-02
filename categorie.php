<?php
/**
 * Created by PhpStorm.
 * User: Raptor
 * Date: 02/02/2015
 */

include("./header.php");

$objManager = new ObjetManager();
$objets = $objManager.getObjets($_GET['categorie']);
$html = '<ul class="menu-panier">';

foreach ($objets as $objet) {
    $html = $html
        .'<li>'.$objet->getNom()
        .'<br>'.$objet->getDescription()
        .'<br><a href="./objet?'.$objet->getIdObjet().'"> click me bitch</a>'
        .'</li>';

}
$html = $html.'</ul>';

echo $html;


include("./footer.php"); ?>