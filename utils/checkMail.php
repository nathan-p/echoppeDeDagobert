<?php
	include("../model/Database.php");
	$mail = $_GET['mail'];
	//    echo $mail;
	$bdd = new Database();
	$donnee = $bdd->getOneData('SELECT Count(*) FROM `utilisateur` WHERE mail = ' . '\'' . $mail . '\';');
	if ($donnee[0] != "0") {
	    echo 'false';
	} else {
	    echo 'true';
	}
?>