<?php 
	include_once("model/Database.php");

	$mail = $_GET['mail'];
	$password = $_GET['password'];

	$req = 'SELECT nomUtilisateur FROM utilisateur WHERE motDePasse="'.$password.'" AND mail="'.$mail.'";';

	$user = Database::getOneData($req);

	 if($user == true) {
	 	session_start(); 
		
		$_SESSION['user'] = $user[0]; 
		
	 	header('Location: ./index.php');
	 } 
	 else {
		header('Location: ./loginPage.php?state=wrong');
	 }


?>