<?php

class Objet {

	private $idObjet;
	private $nom;
	private $description;
	private $stock;
	private $prix;
	private $promotion;
	private $urlImage;
	private $SousCategorie_idCategorie;
	
	public function __constructor(array $donnees) {

		foreach ($donnees as $key => $value)
		{
			// On récupère le nom du setter correspondant à l'attribut.
			$method = 'set'.ucfirst($key);

			// Si le setter correspondant existe.
			if (method_exists($this, $method))
			{
				// On appelle le setter.
				$this->$method($value);
			}
		}
	}

	
	public function setIdObjet($id) {
		$id = (int) $id;
		
		if ($id > 0) {
			$this->$idObjet = $id;
		}
	}

	/**
	 * @param mixed $nom
	 */
	public function setNom($nom)
	{
		$this->nom = $nom;
	}

	/**
	 * @param mixed $promotion
	 */
	public function setPromotion($promotion)
	{
		$this->promotion = $promotion;
	}

	/**
	 * @param mixed $urlImage
	 */
	public function setUrlImage($urlImage)
	{
		$this->urlImage = $urlImage;
	}

	/**
	 * @param mixed $SousCategorie_idCategorie
	 */
	public function setSousCategorieIdCategorie($SousCategorie_idCategorie)
	{
		$this->SousCategorie_idCategorie = $SousCategorie_idCategorie;
	}

	
	public function setDescription($desc) {
		$desc = (String) $desc;
		
		$this->$description = $desc;
	}
	
	public function setStock($s) {
		$s = (int) $s;
		
		if ($s > 0) {
			$this->$stock = $s;
		}
	}
	
	public function setPrix($p) {
		$p = (float) $p;
		
		if ($p > 0) {
			$this->$prix = $p;
		}
	}
	
	

}
	
	