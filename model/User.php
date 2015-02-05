<?php
	include_once('Database.php');
	
	class User {

		private $id;
		private $name;
		private $surname;
		private $mail;

		private $city;
		private $street;
		private $country;
		private $postalCode;

		private $bdd;


		function __construct($idUser) {
	        $request = 'SELECT * FROM utilisateur WHERE idUtilisateur= ' . $idUser . ';';
	    	$this->bdd = new Database();
	    	$donnee = $this->bdd->getOneData($request);
	    	
	    	$this->mail = $donnee['mail'];


	    	$request = 'SELECT * FROM adresse WHERE Utilisateur_idUtilisateur = ' . $idUser . ';';
	    	$donnee = $this->bdd->getOneData($request);

	    	$this->id = $idUser;
	    	$this->street = $donnee['nomRue'];
	    	$this->postalCode = $donnee['codePostal'];
	    	$this->city = $donnee['ville'];
	    	$this->name = $donnee['nomDestinataire'];
	    	$this->surname = $donnee['prenomDestinataire'];
	    	$this->country = $donnee['pays'];

	    	//$this->printUser();
	    }	


	    public function getId()
		{
			return $this->id;
		}

		public function getName()
		{
			return strtoupper($this->name);
		}

		public function getSurname()
		{
			return ucfirst($this->surname);
		}

		public function getMail()
		{
			return $this->mail;
		}

		    public function getCity()
		{
			return $this->city;
		}

		public function getStreet()
		{
			return $this->street;
		}

		public function getPostalCode()
		{
			return $this->postalCode;
		}

		public function getCountry()
		{
			return $this->country;
		}


		public function setUser (array $newInfos) {
			if(count($newInfos) != 7) {
				print("Erreur : Mauvaises informations de modification d'utilisateur");
			} 
			else {
				$this->id = $newInfos['idUtilisateur'];
		        $this->name = $newInfos['nomDestinataire'];
		        $this->surname = $newInfos['prenomDestinataire'];
		        $this->street = $newInfos['nomRue'];
		        $this->postalCode = $newInfos['codePostal'];
		        $this->city = $newInfos['ville'];
		        $this->country = $newInfos['pays'];

		        $request = 'UPDATE adresse 
		        SET nomDestinataire = "'.$this->name.'", 
		        prenomDestinataire = "'.$this->surname.'", 
		        nomRue = "'. $this->street .'", 
		        codePostal = "'. $this->postalCode .'", 
		        ville = "'. $this->city.'", 
		        pays = "'. $this->country .'"
		        WHERE Utilisateur_idUtilisateur = '. $this->id .';';

		        $_SESSION['user'] = serialize($this); 

		        $donnee = $this->bdd->getOneData($request);
			}
		}


		public function printUser() {
			echo "Id : $this->id <br>";
			echo "Name : $this->name <br>";
			echo "Surname : $this->surname <br>";
			echo "Mail : $this->mail <br>";
			echo "Street : $this->street <br>";
			echo "PostalCode : $this->postalCode <br>";
			echo "City : $this->city <br>";
			echo "Country : $this->country <br>";
		}


		function getFacturesToHtml() {
	        $request = 'Select * FROM facture WHERE Utilisateur_idUtilisateur =' . $this->id . ';';
	        
	        $donnee = $this->bdd->getAllData($request);
	        
	        $ligne = $donnee->fetch();
	        $factures = "";

	        while ($ligne != false) {
	            $factures .= ' 
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
	            <form  action="./facture.php" id="factureForm" method="post" role="form">
	            <input type="hidden" name="id" id="id" value="'. $ligne['idFacture'] .'"/>
	            <input type="hidden" name="date" id="date" value="'. $ligne['date'] .'"/>
	            <button type="submit" class="btn btn-default btn-sm" aria-label="Details">
	            <span class="glyphicon glyphicon-file" aria-hidden="true"></span> Détails
	            </button>
	            </form>
	            </td>
	            </tr>';
	            $ligne = $donnee->fetch();
	        }
	        $donnee->closeCursor();
	        return $factures;
	    }


	}


?>