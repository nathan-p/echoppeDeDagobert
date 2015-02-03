<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once("./model/Database.php");

//$mail = $_SESSION['mail'];

function getId($mail) {
    $request = 'SELECT `idUtilisateur` FROM `utilisateur` WHERE `mail`= \'' . $mail . '\';';
    $bdd = new Database();
    $donnee = $bdd->getOneData($request);

    return $donnee['idUtilisateur'];
}

function getAdress($id) {
    $request = 'Select * FROM `adresse` WHERE `Utilisateur_idUtilisateur` =' . $id . ';';
    $bdd = new Database();
    $donnee = $bdd->getOneData($request);

    return $donnee;
}

function setAdress() {
    $idUser = $_POST['idUtilisateur'];
    $name = $_POST['nomDestinataire'];
    $surname = $_POST['prenomDestinataire'];
    $streetName = $_POST['nomRue'];
    $postalCode = $_POST['codePostal'];
    $cityName = $_POST['ville'];
    $country = $_POST['pays'];

    $request = 'UPDATE `adresse` 
                SET `nomDestinataire` = \'' . $name . '\', 
                    `prenomDestinataire` = \'' . $surname . '\', 
                    `nomRue` =\'' . $streetName . '\', 
                    `codePostal` =\'' . $postalCode . '\', 
                    `ville` =\'' . $cityName . '\', 
                    `pays`=\'' . $country . '\'
                WHERE `Utilisateur_idUtilisateur`= \'' . $idUser . '\';';
    $bdd = new Database();
    $donnee = $bdd->getOneData($request);
}

function getFactures($id) {
    $request = 'Select * FROM `adresse` WHERE `Utilisateur_idUtilisateur` =' . $id . ';';
    $bdd = new Database();
    $donnee = $bdd->getOneData($request);

    var_dump($donnee);
}

function getArticlesInFacture($id) {
    
}
?>
