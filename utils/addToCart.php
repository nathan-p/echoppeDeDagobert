<?php 
	if (!isset($_SESSION)) {
        session_start();
    }

	$idObjet = $_POST['id'];

	$qteProd = 0;

	$quantite = 1;
	$nbProd = 0;
    if (isset($_SESSION['cart'])) {
        $nbProd = count($_SESSION['cart']);
    }
    
    $exist = false;
    for($i = 0 ; $i < $nbProd ; $i++) {
        if ($_SESSION['cart'][$i]['id'] == $idObjet) {
            $oldQuantite = $_SESSION['cart'][$i]['quantite'];
            $_SESSION['cart'][$i]['quantite'] = $quantite + $oldQuantite;
            $exist = true;
        }

        $qteProd = $qteProd + $_SESSION['cart'][$i]['quantite'];
    }

    if(! $exist) {
        $_SESSION['cart'][$nbProd]['id'] = $idObjet;
        $_SESSION['cart'][$nbProd]['quantite'] = $quantite;
        $qteProd = $qteProd +1;
    }

    echo $qteProd;

 ?>