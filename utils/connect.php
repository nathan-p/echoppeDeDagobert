<?php 
	session_start(); 
	include_once("../model/Database.php");
	include_once("../model/User.php");

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

		$req = 'SELECT idUtilisateur FROM utilisateur WHERE motDePasse="'.$password.'" AND mail="'.$mail.'";';

		$user = Database::getOneData($req);

		 if($user == true) {

			//$_SESSION['connected'] = $user[0];
		 	$user = new User($user[0]);
			$_SESSION['user'] = serialize($user); 

		 	header('Location: ../pages/home.php');
		 } 
		 else {
		 	//$_SESSION['connected'] = -1; 
			header('Location: ../pages/loginPage.php?state=wrong');
		 }
	}


	function deconnect() {
		//unset($_SESSION['connected']);
		unset($_SESSION['user']);
		header('Location: ../pages/home.php');
	}
	

?>