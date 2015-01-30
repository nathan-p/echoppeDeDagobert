<?php 
	session_start();
	$connected = 0;

	var_dump($_SESSION);

	if(isset($_SESSION['connected'])) {
		if($_SESSION['connected'] == 0) {
			$_SESSION['connected'] = 0;
		} else {
			$_SESSION['connected'] = 1;
			$connected = 1;
		}
	}
	else {
		$_SESSION['connected'] = 0;
	}

	
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="Site web échoppe de Dagobert">
	<title>L'échoppe de Dagobert</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/metro-bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type='text/javascript' src='js/fonctionsFormulaire.js'></script>
</head>

<body>
	<div class="banner">
		<div class="row">
			<div class="col-md-4 col-md-offset-8">
				<a href="./contact.php" style="margin-right:20px;">Contactez-nous</a>
				<a href="javascript:changeLanguage();" id="language" style="margin-right:20px;">English</a>

				<?php 
				if($connected) {
					session_destroy();
					echo '<a href="./index.php" style="margin-right:20px;">Déconnexion</a>';
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
				<a href="./index.php" class="title"><h1> 
					<p><b>Echoppe</b></p>	 
					<p><b>Dagobert</b></p>
				</h1></a>
			</div>

			<div class="col-lg-6 header-center" >
				<div class="input-group input-group-lg">
					<input type="text" class="form-control" placeholder="Rechercher">
					<span class="input-group-btn">
						<button class="btn btn-lg btn-default" type="button">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</button>
					</span>
				</div>
			</div>

			
			<div class="col-md-3 col-md-offset-1 header-center">
				<button type="button" class="btn btn-lg btn-default" onclick="location.href='panier.php'" >
					<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
					&nbsp;&nbsp;&nbsp;Panier (vide)&nbsp;&nbsp;&nbsp;

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
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Costumes <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Pour femme</a></li>
								<li><a href="#">Pour homme</a></li>
								<li class="divider"></li>
								<li><a href="#">Chaussures</a></li>
							</ul>
						</li>

						<!-- MENU ITEM ARME -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Armes <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Armes</a></li>
								<li><a href="#">Armures</a></li>
								<li class="divider"></li>
								<li><a href="#">Instruments de torture</a></li>
							</ul>
						</li>
						<li><a href="#">Instruments</a></li>
						<li><a href="#">Bijoux</a></li>


						<!-- MENU ITEM MOBILIER -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mobilier & autres <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Mobilier</a></li>
								<li><a href="#">Campement</a></li>
							</ul>
						</li>

						<!-- MENU ITEM Alimentation -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Alimentation <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Viandes</a></li>
								<li><a href="#">Fruits et légumes bio</a></li>
								<li class="divider"></li>
								<li><a href="#">Boissons</a></li>
							</ul>
						</li>

					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
