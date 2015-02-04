<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once("./model/Database.php");

$id = $_POST['id'];
getArticlesInFacture($id);


function getArticlesInFacture($idFacture) {
    $request = 'SELECT * FROM `objet_has_facture` as `ohf`, `objet` 
                WHERE `ohf`.`Facture_idFacture` =' . $idFacture .
                ' AND `ohf`.`Objet_idObjet` = `objet`.`idObjet`;';
    $bdd = new Database();
    $donnee = $bdd->getAllData($request);
    $ligne = $donnee->fetch();


    while ($ligne != false) {
        echo 'idObjet = ' . $ligne['Objet_idObjet'] . ' ';
        echo 'quantité = ' . $ligne['quantité'] . ' ';
        echo 'commentaire = ' . $ligne['commentaire'] . ' ';
        echo 'note = ' . $ligne['note'] . ' ';
        echo 'nom = ' . $ligne['nom'] . ' ';
        echo 'description = ' . $ligne['description'] . ' ';
        echo 'prix = ' . $ligne['prix'] . ' ';
        echo 'urlImage = ' . $ligne['urlImage'] . ' ';
        echo '<br>';
        
        $ligne = $donnee->fetch();  
    }
    $donnee->closeCursor();    
}

?>
