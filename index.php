<?php 

	include("./header.php"); 


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
			<img src="img/slider_img_1.jpg" alt="Alix le beau gosse !">
			<div class="carousel-caption">
				<h3>FREE SHIPPING</h3>
				<p>Alix le beau gosse ! </p>
			</div>
		</div>
		<div class="item">
			<img src="img/slider_img_2.jpg" alt="Aymeric la belle gosse !">
			<div class="carousel-caption">
				<h3>FINAL SALE <p>-70% </p></h3>
				<p>Aymeric la belle gosse ! </p>
			</div>
		</div>

	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#slider" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#slider" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<div id="categories">
	<h3>Catégories du moment</h3>
	<div class="row">
		<div class="col-md-3 categorie-block" id="cat_robe">
			<div class="row" >
				<div class="col-md-6 button"><center><a href="./categorie.php?categorie=Alimentation"><p>BOUFFE</p></a></center></div>
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
				<del>54 euros</del>
				<div class="new-price">29 €</div>	
			</div>
			<div class="row">
				<div class="col-md-6 button"><center><a href=""><p>Tunique Lodin</p></a></center></div>
			</div>
		</div>
		<div class="col-md-3 col-md-offset-1 promotion-block" id="promo_bottine">
			<div class="col-md-4 col-md-offset-8 price">
				<del>38 euros</del>
				<div class="new-price">24 €</div>	
			</div>
			<div class="row">
				<div class="col-md-6 button"><center><a href=""><p>Bottines médiévales</p></a></center></div>
			</div>
		</div>
		<div class="col-md-3 col-md-offset-1 promotion-block" id="promo_chaise">
			<div class="col-md-4 col-md-offset-8 price">
				<del>19 euros</del>
				<div class="new-price">13.9 €</div>	
			</div>
			<div class="row">
				<div class="col-md-6 button"><center><a href=""><p>Chaise haute</p></a></center></div>
			</div>
		</div>
	</div>
</div>

<br><br><br>
</div>
<?php include("footer.php"); ?>