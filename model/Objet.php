<?php

class Objet {

	private $idObjet;
	private $nom;
	private $description;
	private $stock;
	private $prix;
	private $promotion;
	private $urlImage;
	private $Categorie_idCategorie;
	private $SousCategorie_idCategorie;

	/**
	 * @param array $donnees
     */
	public function hydrate(array $donnees) {

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

	/**
	 * @param $id
     */
	public function setIdObjet($id) {
		$id = (int) $id;
		// si la conversion échoue, $id = 0
		if ($id > 0) {
			$this->idObjet = $id;
		}
	}

	/**
	 * @param mixed $nom
	 */
	public function setNom($nom)
	{
		if (is_string($nom)) {
			$this->nom = $nom;
		} else {
			$this->nom = "kkkkk";
		}
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
	 * @param mixed $Categorie_idCategorie
	 */
	public function setCategorieIdCategorie($Categorie_idCategorie)
	{
		$this->Categorie_idCategorie = $Categorie_idCategorie;
	}

	/**
	 * @param mixed $SousCategorie_idCategorie
	 */
	public function setSousCategorieIdCategorie($SousCategorie_idCategorie)
	{
		$this->SousCategorie_idCategorie = $SousCategorie_idCategorie;
	}

	/**
	 * @param $desc
     */
	public function setDescription($desc) {
		$desc = (String) $desc;
		
		$this->description = $desc;
	}

	/**
	 * @param $s nombre de stock restant
     */
	public function setStock($s) {
		$s = (int) $s;
		
		if ($s > 0) {
			$this->stock = $s;
		}
	}

	/**
	 * @param $p prix
     */
	public function setPrix($p) {
		$p = (float) $p;
		
		if ($p > 0) {
			$this->prix = $p;
		}
	}

	/**
	 * @return mixed
	 */
	public function getIdObjet()
	{
		return $this->idObjet;
	}

	/**
	 * @return mixed
	 */
	public function getNom()
	{
		return $this->nom;
	}

	/**
	 * @return mixed
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @return mixed
	 */
	public function getStock()
	{
		return $this->stock;
	}

	/**
	 * @return mixed
	 */
	public function getPrix()
	{
		return $this->prix;
	}

	/**
	 * @return mixed
	 */
	public function getPromotion()
	{
		return $this->promotion;
	}

	/**
	 * @return mixed
	 */
	public function getUrlImage()
	{
		return $this->urlImage;
	}

	/**
	 * @return mixed
	 */
	public function getCategorieIdCategorie()
	{
		return $this->Categorie_idCategorie;
	}

	/**
	 * @return mixed
	 */
	public function getSousCategorieIdCategorie()
	{
		return $this->SousCategorie_idCategorie;
	}
	
	public function getPrixReel() {
		return $this->prix * (1-($this->promotion / 100));
	}

}
	
	