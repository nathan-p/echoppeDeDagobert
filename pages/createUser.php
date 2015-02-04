<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include("../model/Database.php");

$mail = $_GET["email"];
$prenom = $_GET["prenom"];
$nom = $_GET["nom"];
$motDePasse = $_GET["motDePasse"];

$bdd = new Database();

//Insertion de l'utilisateur dans la bd
$request = 'INSERT INTO `utilisateur` (`nomUtilisateur`, `motDePasse`, `mail`) VALUES
(' . '\'' . $mail . '\'' . ',' . '\'' . $motDePasse . '\'' . ',' . '\'' . $mail . '\'' . ');';
$bdd->getOneData($request);

//Récupération de son ID
$request = 'SELECT `idUtilisateur` FROM `utilisateur` WHERE `mail`= \'' . $mail . '\';';
$donnee = $bdd->getOneData($request);


//Création d'une adresse à son nom
$request = 'INSERT INTO `adresse` (`nomDestinataire`, `prenomDestinataire`, `Utilisateur_idUtilisateur`) VALUES
(' . '\'' . $nom . '\'' . ',' . '\'' . $prenom . '\',' . '\'' . $donnee['idUtilisateur'] . '\');';
$bdd->getOneData($request);
?>
