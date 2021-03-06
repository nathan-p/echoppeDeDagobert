<?php

include_once 'Database.php';
include_once "Objet.php";

class ObjetManager {

    /**
     * Retourne l'objet correspondant à l'identifiant passé en paramètre.
     * @param type $idObjet Identifiant de l'objet à récupérer.
     * @return \Objet Objet correspondant à l'identifiant donné.
     */
    public static function getObjet($idObjet) {
        $req = 'SELECT * '
                . 'FROM objet '
                . 'WHERE idObjet="' . $idObjet . '";';
        $result = Database::getOneData($req);

        $object = new Objet();
        $object->hydrate($result);

        return $object;
    }

    /**
     * Retourne tous les objets appartenant à la categorie ou sous catégorie 
     * passée en paramètre.
     * @param type $categoryName Catégorie ou sous categorie dans laquelle 
     * récupérer les objets.
     * @return \Objet Tableau contenant les objets récupérés.
     */
    public static function getObjets($categoryName) {
        $request = 'SELECT * '
                . 'FROM objet '
                . 'WHERE Categorie_idCategorie = (SELECT idCategorie '
                                               . 'FROM categorie '
                                               . 'WHERE nom = "' . $categoryName . '") '
                . 'OR SousCategorie_idCategorie = (SELECT idCategorie '
                                                . 'FROM souscategorie '
                                                . 'WHERE nom = "' . $categoryName . '")';
        $result = Database::getAllData($request);
        
        $objets = array();
        foreach ($result as $key => $value) {
            $objet = new Objet();
            $objet->hydrate($value);
            // Ajoute le nouvel objet au tableau
            $objets[] = $objet;
        }

        return $objets;
    }
    
}
