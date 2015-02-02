<?php 

	
	include ("model/Database.php");

	include("header.php"); 


?>


<div class="container">
	<div class="row">

		<h1>Resultat de votre recherche</h1>
		<br><br>
		<div class="list-group">
			
		<?php 
			if(isset($_GET['search'])) {
				$search = $_GET['search'];

				$req = "SELECT * FROM objet WHERE nom LIKE '%".$search."%' OR description LIKE '%".$search."%' ";


				$result = Database::getAllData($req);



				foreach ($result as $key => $value) {
					echo '
					<a class="list-group-item">
					<div class="media col-md-3">
						<figure class="pull-left">
							<img class="media-object img-rounded img-responsive"  src="http://placehold.it/350x250" alt="placehold.it/350x250" >
						</figure>
					</div>
					<div class="col-md-6">
						<h4 class="list-group-item-heading"> '.$value['nom'].' </h4>
						<p class="list-group-item-text"> '.$value['description'].'</p>
					</div>
					<div class="col-md-3 text-center">
						<h2> '.$value['prix'].'€</h2>
						<button type="button" onclick="self.location.href=\'./index.php\'" class="btn btn-default btn-lg btn-block"> 
							<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 
							Ajouter au panier 
						</button>
						<div class="stars">
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star-empty"></span>
						</div>
						<p> Moyenne 4.5 <small> / </small> 5 </p>
					</div>
				</a>

				';
				}
			}

			
		 ?>
		</div>

	</div>
</div>
</div>


<?php include("footer.php"); ?>