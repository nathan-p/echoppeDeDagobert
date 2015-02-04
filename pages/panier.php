<?php 
include("../includes/header.php"); 
include("../model/Database.php");

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
                var_dump($jambon);
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
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
                        <div class="col-sm-10">
                            <h4 class="nomargin">Product 1</h4>
                            <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </td>
                <td data-th="Price">1.99 €</td>
                <td data-th="Quantity">
                    <input type="number" class="form-control text-center" value="1">
                </td>
                <td data-th="Subtotal" class="text-center">1.99</td>
                <td class="actions" data-th="">
                    <button class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>                                
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Total 1.99</strong></td>
            </tr>
            <tr>
                <td><a href="#" class="btn btn-warning"><i class="glyphicon glyphicon-chevron-left"></i>Continuer shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center" id="cart-total-price"><strong>Total 1.99 €</strong></td>
                <td><a href="#" class="btn btn-success btn-block">Payer <i class="glyphicon glyphicon-chevron-right"></i></a></td>
            </tr>
        </tfoot>
    </table>
</div>

<br><br><br><br><br><br><br><br><br><br><br>
</div>
<?php include("../includes/footer.php"); ?>
