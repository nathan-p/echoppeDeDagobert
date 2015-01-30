<?php 
	session_start(); 
	include_once("model/Database.php");
	var_dump($_GET);
	var_dump($_SESSION);

	if(isset($_GET['connect'])) {
		if($_GET['connect'] == "true" ) {
			connect();
			echo "GOOD";
		}
		else {
			deconnect();
			echo "BAD";
		}
		echo "OTHER";

	} 

	function connect() {
		$mail = $_GET['mail'];
		$password = $_GET['password'];

		$req = 'SELECT nomUtilisateur FROM utilisateur WHERE motDePasse="'.$password.'" AND mail="'.$mail.'";';

		$user = Database::getOneData($req);

		 if($user == true) {

			$_SESSION['connected'] = 1; 
			
		 	header('Location: ./index.php');
		 } 
		 else {
			header('Location: ./loginPage.php?state=wrong');
		 }
	}


	function deconnect() {
		unset($_SESSION['connected']);
		header('Location: ./index.php');
	}
	

?>