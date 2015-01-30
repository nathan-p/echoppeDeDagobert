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
	
	public __constructor() {
	}
	
	public function setIdObjet($id) {
		$id = (int) $id;
		
		if ($id > 0) {
			this->$idObjet = $id;
		}
	}
	
	public function setDescription($desc) {
		$desc = (String) $desc;
		
		this->$description = $desc;
	}
	
	public function setIdObjet($s) {
		$s = (int) $s;
		
		if ($s > 0) {
			this->$stock = $id;
		}
	}
	
	public function setPrix($id) {
		$id = (int) $id;
		
		if ($id > 0) {
			this->$idObjet = $id;
		}
	}
	
	
	http://openclassrooms.com/courses/programmez-en-oriente-objet-en-php/manipulation-de-donnees-stockees
}
	
	