<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

include("./model/Database.php");

$mail = $_GET["email"];
$prenom = $_GET["prenom"];
$nom = $_GET["nom"];
$motDePasse = $_GET["motDePasse"];

echo $mail;
echo $prenom;
echo $nom;
echo $motDePasse;

$bdd = new Database();
$bdd->getOneData('INSERT INTO `utilisateur` (`nomUtilisateur`, `motDePasse`, `mail`) VALUES
('.'\''.$mail.'\''.','.'\''.$motDePasse.'\''.','.'\''.$mail.'\''.');');
 

//header('Location: ./index.php');

class User {

    private $_id;
    private $_nomUtilisateur;
    private $_mail;
    private $_motDePasse;

    public function getNomUtilisateur() {
        return $this->_nomUtilisateur;
    }

    public function getMail() {
        return $this->_mail;
    }

    public function getMotDePasse() {
        return $this->_motDePasse;
    }

    public function setNomUtilisateur($nom) {
        $this->_nomUtilisateur = $nom;        
    }
    
    public function setMail($mail) {
        $this->_mail = $mail;        
    }
    
    public function setMotDePasse($mdp) {
        $this->_motDePasse = $mdp;        
    }
}
?>
