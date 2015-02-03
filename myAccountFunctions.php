<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

include("./model/Database.php");

//$mail = $_SESSION['mail'];
$mail = 'jeanluc.hak@gmail.com';


getAdress(1);

function getId($mail) {
    $request = 'SELECT `idUtilisateur` FROM `utilisateur` WHERE `mail`= \'' . $mail . '\';';
    $bdd = new Database();
    $donnee = $bdd->getOneData($request);
    
    echo $donnee['idUtilisateur'];    
}

function getAdress($id) {
    $request = 'Select * FROM `adresse` WHERE `Utilisateur_idUtilisateur` =' . $id . ';';
    $bdd = new Database();
    $donnee = $bdd->getOneData($request);
    
    var_dump($donnee);
    $nomDestinataire = $donnee['nomDestinataire'];
    $prenomDestinataire = $donnee['prenomDestinataire'];
    $nomRue = $donnee['nomRue'];
    $codePostal = $donnee['codePostal'];
    $ville = $donnee['ville'];
    $pays = $donnee['pays'];
}

function getFactures($id) {
    
}
?>
