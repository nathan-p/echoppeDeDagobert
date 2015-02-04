<?php 
	session_start();

	$connected = 0;
	if(isset($_SESSION['connected'])) {
		if($_SESSION['connected'] == 0) {
			$connected = 0;
		} else {
			$connected = 1;
		}
	}

	if(isset($_SESSION['cart'])) {
		$cart = "( ".count($_SESSION['cart'])." articles)";
	}
	else {
		$cart = "(vide)";
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="Site web échoppe de Dagobert">
	<title>L'échoppe de Dagobert</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../css/metro-bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type='text/javascript' src='../js/utilsFunctions.js'></script>
</head>

<body>
	<div class="banner">
		<div class="row">
			<div class="col-md-4 col-md-offset-8">
				<a href="./contact.php" style="margin-right:20px;">Contactez-nous</a>
				<?php 
				if($connected) {
					echo '<a href="./compte.php" style="margin-right:20px;">Mon compte</a>';
					echo '<a href="./connect.php?connect=false" style="margin-right:20px;">Déconnexion</a>';
				} 
				else {
					echo '<a href="./loginPage.php" style="margin-right:20px;">Connexion</a>';
				}

				?>
				
			</div>
		</div>
	</div>

	<div class="main-div">

		<div class="row header">


			<div class="col-md-2 ">
				<a href="../pages/home.php" class="title"><h1> 
					<p><b>Echoppe</b></p>	 
					<p><b>Dagobert</b></p>
				</h1></a>
			</div>

			<div class="col-lg-6 header-center" >
				<div class="input-group input-group-lg">
					<input type="text" class="form-control" id="search_input" placeholder="Rechercher">
					<span class="input-group-btn">
						<button class="btn btn-lg btn-default" type="button" onClick='search();'>
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</button>
					</span>
				</div>
			</div>

			
			<div class="col-md-3 col-md-offset-1 header-center">
				<button type="button" class="btn btn-lg btn-default" onclick="location.href='panier.php'" >
					<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
					&nbsp;&nbsp;&nbsp;Panier <?php echo $cart; ?>&nbsp;&nbsp;&nbsp;

				</button>
			</div>
		</div>

		<nav class="navbar navbar-inverse col-md-10 col-md-offset-1">
			<div class="container-fluid">
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" >
					<ul class="nav navbar-nav">
						<!-- MENU ITEM COSTUMES -->
						<li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Costumes<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href='categorie.php?categorie=Pour_femme'>Pour femme</a></li>
								<li><a href="categorie.php?categorie=Pour_homme">Pour homme</a></li>
								<li class="divider"></li>
								<li><a href="categorie.php?categorie=Chaussures">Chaussures</a></li>
							</ul>
						</li>

						<!-- MENU ITEM ARME -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Armes <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="categorie.php?categorie=Armes">Armes</a></li>
								<li><a href="categorie.php?categorie=Armures">Armures</a></li>
								<li class="divider"></li>
								<li><a href="categorie.php?categorie=Instruments_de_torture">Instruments de torture</a></li>
							</ul>
						</li>
						<li><a href="categorie.php?categorie=Instruments">Instruments</a></li>
						<li><a href="categorie.php?categorie=Bijoux">Bijoux</a></li>


						<!-- MENU ITEM MOBILIER -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mobilier & autres <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="categorie.php?categorie=Mobilier">Mobilier</a></li>
								<li><a href="categorie.php?categorie=Campement">Campement</a></li>
							</ul>
						</li>

						<!-- MENU ITEM Alimentation -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Alimentation <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="categorie.php?categorie=Viandes">Viandes</a></li>
								<li><a href="categorie.php?categorie=Fruits_et_légumes_bio">Fruits et légumes bio</a></li>
								<li class="divider"></li>
								<li><a href="categorie.php?categorie=Boissons">Boissons</a></li>
							</ul>
						</li>

					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
