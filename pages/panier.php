<?php 

if (!isset($_SESSION)) {
    session_start();
}


include_once("../model/Database.php");
include_once("../model/ObjetManager.php");
include_once("../model/Objet.php");

function addToCart($idObjet, $quantite) {
    $nbProd = count($_SESSION['cart']);
    
    $exist = false;
    for($i = 0 ; $i < $nbProd ; $i++) {
        if ($_SESSION['cart'][$i]['id'] == $idObjet) {
            $oldQuantite = $_SESSION['cart'][$i]['quantite'];
            $_SESSION['cart'][$i]['quantite'] = $quantite + $oldQuantite;
            $exist = true;
        }
    }

    if(! $exist) {
        $_SESSION['cart'][$nbProd]['id'] = $idObjet;
        $_SESSION['cart'][$nbProd]['quantite'] = $quantite;
    }
}

if (isset($_POST['idObjet']) && isset($_POST['quantite'])) {
    addToCart($_POST['idObjet'], $_POST['quantite']);
}

if (isset($_GET['rmIdObjet'])) {
    unset($_SESSION['cart'][$_GET['rmIdObjet']]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

$cartContent = "";
$total = 0;
for ($i=0; $i < count($_SESSION['cart']); $i++) { 

    $idProd = $_SESSION['cart'][$i]['id'];
    $product = ObjetManager::getObjet($idProd);
    $quantite = $_SESSION['cart'][$i]['quantite'];
    $sousTotal = $product->getPrixReel() * $quantite;

    $cartContent .= 
    '<tr name="ligneDuPanier" id="lignePanier' . $i . '">
        <td data-th="Product">
            <div class="row">
                <div class="col-sm-2 hidden-xs"><img src="../img/' .$product->getUrlImage() . '" alt="..." class="img-responsive" style="max-height: 100px"/></div>
                <div class="col-sm-10">
                    <h4 class="nomargin">'.$product->getNom().'</h4>
                    <p>'.$product->getDescription().'</p>
                </div>
            </div>
        </td>
        <td data-th="Price" name="prixReelObjetPanier">'.$product->getPrixReel().' €</td>
        <td data-th="Quantity">
            <input type="number" class="form-control text-center" value="'.$quantite.'" min="1" max="' . $product->getStock() . '" name="quantiteObjet" onChange="updateSousTotal(' . $i . ')" >
        </td>
        <td data-th="Subtotal" id="cart-subtotal-price" name="cart-subtotal-price" class="text-center">'.$sousTotal.'€</td>
        <td class="actions" data-th="">
            <button class="btn btn-danger btn-sm" id="cart-delete" name="cartDeleteBtn" onClick="deleteLineFromCart('.$i.')">
                <i class="glyphicon glyphicon-trash"></i>
            </button>                                
        </td>
    </tr>';   

    $total +=$sousTotal;      
}

?>

<?php include("../includes/header.php"); ?>
<div class="container">

    <ol class="breadcrumb">
        <li><a href="./home.php">Accueil</a></li>
        <li class="active">Panier</li>
    </ol>
    <h1>
        Résumé du panier
    </h1>
    <br><br>

    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Article</th>
                <th style="width:10%">Prix</th>
                <th style="width:8%">Quantité</th>
                <th style="width:22%" class="text-center">Sous-total</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            <?php echo $cartContent ?>
        </tbody>
        <tfoot>
            <tr>
                <td><a href="./home.php" class="btn btn-warning"><i class="glyphicon glyphicon-chevron-left"></i>Continuer shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center" id="cart-total-price">
                    <strong><h4>Total <b id="prixTotalPanier" style="color:#811512;"> <?php echo $total; ?> € </b></h4></strong>
                    <div><strong>Frais de livraison : GRATUIT ! </strong></div>
                </td>
                <td><a href="./pay.php" class="btn btn-success btn-block">Payer <i class="glyphicon glyphicon-chevron-right"></i></a></td>
            </tr>
        </tfoot>
    </table>
</div>

<br><br><br><br><br><br><br><br><br><br><br>
</div>
<?php include("../includes/footer.php"); ?>
