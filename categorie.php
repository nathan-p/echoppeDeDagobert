<?php
/**
 * Created by PhpStorm.
 * User: Raptor
 * Date: 02/02/2015
 */

include("./header.php");
include("./model/ObjetManager.php");
include("./model/Objet.php");
$objets = ObjetManager::getObjets("Alimentation");
$html = '<ol class="menu-panier">';
foreach ($objets as $objet) {
    $html = $html.'<li><ul>'
        .'<li>'.$objet->getNom().'</li>'
        .'<li>'.$objet->getDescription().'</li>'
        .'<li><a href="./objet.php?id='.$objet->getIdObjet().'"> click me bitch</a></li>'
        .'</ul></li>';
}

$html = $html.'</ol>';

echo $html;


include("./footer.php"); ?>