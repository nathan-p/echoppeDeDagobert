<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once("./model/Database.php");

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
    $request = 'Select * FROM `facture` WHERE `Utilisateur_idUtilisateur` =' . $id . ';';
    $bdd = new Database();
    $donnee = $bdd->getAllData($request);
    $ligne = $donnee->fetch();

    while ($ligne != false) {
        echo ' 
                        <tr>
                            <td>
                               ' . $ligne['idFacture'] . ' 
                            </td>
                            <td>
                                ' . $ligne['date'] . ' 
                            </td>
                            <td>
                                ' . $ligne['prixHT'] . ' €
                            </td>
                            <td>
                                ' . $ligne['prixTotal'] . ' €
                            </td>
                            <td>
                            <form  action=\'./facture.php\' id=\'factureForm\' method=\'post\' role="form">
                                <input type=\'hidden\' name=\'id\' id=\'id\' value=\''. $ligne['idFacture'] .'\'/>
                                <input type=\'hidden\' name=\'date\' id=\'date\' value=\''. $ligne['date'] .'\'/>
                                <button type="button" onClick="submit()" class="btn btn-default btn-sm" aria-label="Details">
                                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span> Détails
                                </button>
                            </form>
                            </td>
                        </tr>';
        $ligne = $donnee->fetch();
    }
    $donnee->closeCursor();
}

?>
