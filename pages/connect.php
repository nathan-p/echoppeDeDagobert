<?php 
	session_start(); 
	include_once("../model/Database.php");
	if(isset($_GET['connect'])) {
		if($_GET['connect'] == "true" ) {
			connect();
		}
		else {
			deconnect();

		}
	} 

	function connect() {
		$mail = $_GET['mail'];
		$password = $_GET['password'];

		$req = 'SELECT nomUtilisateur FROM utilisateur WHERE motDePasse="'.$password.'" AND mail="'.$mail.'";';

		$user = Database::getOneData($req);

		 if($user == true) {

			$_SESSION['connected'] = 1; 
			$_SESSION['mail'] = $mail;
		 	header('Location: ./home.php');
		 } 
		 else {
			header('Location: ./loginPage.php?state=wrong');
		 }
	}


	function deconnect() {
		unset($_SESSION['connected']);
		header('Location: ./home.php');
	}
	

?>