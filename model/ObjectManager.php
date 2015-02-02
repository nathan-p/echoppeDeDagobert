<?php

include_once './Database.php';

class ObjetManager {

    private $_db; // Instance de PDO

    public function __construct() {
        $this->_db = Database::getConnection();
    }

    public function get($id) {
        $req = 'SELECT * FROM objet WHERE idObjet="' . $id . '";';
        $object = Database::getOneData($req);

        return new Objet($object);
    }

    public function getObjets($categoryName) {
        $request = 'SELECT o.idObjet, o.nom, o.description, o.stock, o.prix, o.promotions, o.urlImage, o.SousCategorie_idCategorie
                FROM objet o, categorie c
                WHERE c.idCategorie = o.SousCategorie_idCategorie
                AND c.nom = "' . $categoryName . '";';
        $result = Database::getAllData($request);

        $objets = array();
        while ($ligne = mysql_fetch_array($result)) {
            $objet = new Objet($ligne);
            // Ajoute le nouvel objet au tableau
            $objets[] = $objet;
        }

        return $objets;
    }

    public function getList() {
        $persos = [];

        $q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages ORDER BY nom');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $persos[] = new Personnage($donnees);
        }

        return $persos;
    }

}
