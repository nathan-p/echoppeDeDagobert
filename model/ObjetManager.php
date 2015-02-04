<?php

include_once 'Database.php';

class ObjetManager {



    /**
     * Retourne l'objet correspondant à l'identifiant passé en paramètre.
     * @param type $id Identifiant de l'objet à récupérer.
     * @return \Objet Objet correspondant à l'identifiant donné.
     */
    public static function getObjet($id) {
        $req = 'SELECT *'
                . 'FROM objet'
                . 'WHERE idObjet="' . $id . '";';
        $object = Database::getOneData($req);

        return new Objet($object);
    }

    /**
     * Retourne tous les objets appartenant à la categorie passée en paramètre.
     * @param type $categoryName Catégorie dans laquelle récupérer les objets.
     * @return \Objet Tableau contenant les objets récupérés.
     */
    public static function getObjets($categoryName) {
        $request = 'SELECT o.idObjet, o.nom, o.description, o.stock, o.prix, o.promotions, o.urlImage, o.SousCategorie_idCategorie '
                . 'FROM objet o, categorie c '
                . 'WHERE c.idCategorie = o.SousCategorie_idCategorie '
                . 'AND c.nom = "Alimentation"';

        $result = Database::getAllData($request);

        $objets = array();
        foreach ($result as $key => $value) {
            //var_dump($value);
            $objet = new Objet;
            $objet->hydrate($value);
            // Ajoute le nouvel objet au tableau
            $objets[] = $objet;
        }

        return $objets;
    }

}
