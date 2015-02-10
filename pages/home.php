<?php 

	include("../includes/header.php"); 


	/*
		LIEN UTILES

		http://bootsnipp.com/
		http://bootsnipp.com/snippets/featured/responsive-shopping-cart
		http://bootsnipp.com/snippets/featured/product-page-for-online-shop

	*/

?>

<div id="slider" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#slider" data-slide-to="0" class="active"></li>
		<li data-target="#slider" data-slide-to="1"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img src="../img/slider_img_1.jpg" alt="Alix le beau gosse !">
			<div class="carousel-caption">
				<h3>FREE SHIPPING</h3>
				<p>Alix le beau gosse ! </p>
			</div>
		</div>
		<div class="item">
			<img src="../img/slider_img_2.jpg" alt="Aymeric la belle gosse !">
			<div class="carousel-caption">
				<h3>FINAL SALE <p>-70% </p></h3>
				<p>Aymeric la belle gosse ! </p>
			</div>
		</div>

	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#slider" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Précédant</span>
	</a>
	<a class="right carousel-control" href="#slider" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Suivant</span>
	</a>
</div>

<div id="categories">
	<h3>Catégories du moment</h3>
	<div class="row">
		<div class="col-md-3 categorie-block" id="cat_robe">
			<div class="row" >
				<div class="col-md-6 button"><center><a href="./categorie.php?categorie=Pour_femme"><p>Femmes</p></a></center></div>
			</div>
		</div>
		<div class="col-md-3 col-md-offset-1 categorie-block" id="cat_arme">
			<div class="row">
				<div class="col-md-6 button"><center><a href="./categorie.php?categorie=Arme"><p>Armes</p></a></center></div>
			</div>
		</div>
		<div class="col-md-3 col-md-offset-1 categorie-block" id="cat_bijoux">
			<div class="row">
				<div class="col-md-6 button"><center><a href="./categorie.php?categorie=Bijoux"><p>bijoux</p></a></center></div>
			</div>
		</div>
	</div>
</div>

<div id="promotion">
	<h3>Promotions</h3>
	<div class="row">
		<div class="col-md-3 promotion-block" id="promo_tunique">
			<div class="col-md-4 col-md-offset-8 price">
				<del>20 euros</del>
				<div class="new-price">18 €</div>
			</div>
			<div class="row">
				<div class="col-md-6 button"><center><a href="./detailObjet.php?idObjet=23"><p>Costume de gueux</p></a></center></div>
			</div>
		</div>
		<div class="col-md-3 col-md-offset-1 promotion-block" id="promo_bottine">
			<div class="col-md-4 col-md-offset-8 price">
				<del>100 euros</del>
				<div class="new-price">90 €</div>
			</div>
			<div class="row">
				<div class="col-md-6 button"><center><a href="./detailObjet.php?idObjet=4000"><p>Bottines de gueux</p></a></center></div>
			</div>
		</div>
		<div class="col-md-3 col-md-offset-1 promotion-block" id="promo_chaise">
			<div class="col-md-4 col-md-offset-8 price">
				<del>50 euros</del>
				<div class="new-price">45 €</div>
			</div>
			<div class="row">
				<div class="col-md-6 button"><center><a href="./detailObjet.php?idObjet=4001"><p>Chaise haute</p></a></center></div>
			</div>
		</div>
	</div>
</div>

<br><br><br>
</div>
<?php include("../includes/footer.php"); ?>
