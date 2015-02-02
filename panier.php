<?php include("header.php"); ?>

<div class="content">
    <h1 class="content-heading">
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
				<?php include("model/Database.php");
				$jambon = Database::getOneData("SELECT nom FROM objet WHERE idObjet = 1");
				var_dump($jambon);
				echo "<td>$jambon[nom]</td>"; ?>
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
</div><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<?php include("footer.php"); ?>
