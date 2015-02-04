<?php 
    include("../includes/header.php"); 
    include("../model/Database.php");
    include("../model/ObjetManager.php");

    //creation d'une fausse session de panier


    $_SESSION['cart'][0]['id'] = 2;
    $_SESSION['cart'][0]['quantite'] = 4;

    $_SESSION['cart'][1]['id'] = 5;
    $_SESSION['cart'][1]['quantite'] = 1;

    $_SESSION['cart'][2]['id'] = 1;
    $_SESSION['cart'][2]['quantite'] = 2;



?>

<div class="content">
    <h1>
        Résumé du panier
    </h1>

    <!-- Menu du panier -->
    <ul class="menu-panier">
        <li>Sommaire</li>
        <li>Login</li>
        <li>Adresse</li>
        <li>Livraison</li>
        <li>Paiement</li>
    </ul>

    <!-- Tableau du panier -->
    <table class="tableau-panier">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Description</th>
                <th>Disponibilité</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="2" rowspan="3"></td>
                <td colspan="3">Total des produits</td>
                <td colspan="2">1€</td>
            </tr>
            <tr>
                <td colspan="3">Frais de livraison</td>
                <td colspan="2">0€</td>
            </tr>
            <tr>
                <td colspan="3">TOTAL</td>
                <td colspan="2">2€</td>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td><img src="img/mr_ventouze.png"/></td>
                <?php 
                
                $jambon = Database::getOneData("SELECT nom FROM objet WHERE idObjet = 1");
                //var_dump($jambon);
                echo "<td>$jambon[nom]</td>"; 
                ?>
                <td>Lorem ipsum dolor sit amet</td>
                <td>En Stock</td>
                <td>500€</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Photo 2</td>
                <td>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</td>
                <td>Epuisé</td>
                <td>-10€</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <div class="navigation-panier">
        <button>Retour</button>
        <button style="float: right">Suivant</button>
    </div>
</div><br><br>

<div class="container">

    

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
        <?php 

            $total = 0;
            for ($i=0; $i < count($_SESSION['cart']); $i++) { 
                //echo "TEST <br> ".$_SESSION['cart'][$i]['quantite'];

                $idProd = $_SESSION['cart'][$i]['id'];
                $product = ObjetManager::getObjet($idProd);

                $sousTotal = $product->getPrix() * $_SESSION['cart'][$i]['quantite'];
                
                //var_dump($product);
                echo '
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
                            <div class="col-sm-10">
                                <h4 class="nomargin">'.$product->getNom().'</h4>
                                <p>'.$product->getDescription().'</p>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">'.$product->getPrix().' €</td>
                    <td data-th="Quantity">
                        <input type="number" class="form-control text-center" value="'.$_SESSION['cart'][$i]['quantite'].'">
                    </td>
                    <td data-th="Subtotal" id="cart-subtotal-price" class="text-center">'.$sousTotal.'€</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm" id="cart-delete" onClick="deleteLineFromCart('.$i.')">
                            <i class="glyphicon glyphicon-trash"></i>
                        </button>                                
                    </td>
                </tr>
                ';   

                $total +=$sousTotal;      
            }

            

        ?>
        </tbody>
        <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Total <?php echo $total; ?></strong></td>
            </tr>
            <tr>
                <td><a href="#" class="btn btn-warning"><i class="glyphicon glyphicon-chevron-left"></i>Continuer shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center" id="cart-total-price">
                    <strong><h4>Total <b style="color:#811512;"> <?php echo $total; ?> € </b></h4></strong>
                    <div><strong>Frais de livraison : GRATUIT ! </strong></div>
                </td>
                <td><a href="#" class="btn btn-success btn-block">Payer <i class="glyphicon glyphicon-chevron-right"></i></a></td>
            </tr>
        </tfoot>
    </table>
</div>

<br><br><br><br><br><br><br><br><br><br><br>
</div>
<?php include("../includes/footer.php"); ?>
