<?php 
	include("./header.php");

	$sended = false;

	if(isset($_GET['contact'])) {
		if($_GET['contact'] == 'sended') {
			$sended = true;
		}
	} 

?>

<div class="container" id="contact">
	<h2>Contactez-nous !</h2>
	<?php if($sended) echo '<div class="alert alert-success" style="margin-left:5%;" role="alert">Votre message à bien été envoyé !</div> ' ?>
	<br>
    <div class="row">
        <div class="col-md-7 col-md-offset-1">
            <div class="well well-sm">
                <form action="contact.php">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Nom</label>
                            <input type="text" class="form-control" id="name" placeholder="Entrez votre nom" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Adresse mail</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Entrez votre mail" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Objet</label>
                            <select id="subject" class="form-control" required="required">
                                <option value="service">Service client général</option>
                                <option value="suggestions">Suggestions</option>
                                <option value="product">Autre</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                                <input type="text" style="display:none;" value="sended" name="contact">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-default pull-right">Envoyer</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-3 adress">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Notre entreprise</legend>
            <address>
                <strong>Echoppe Dagobert, Inc.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <abbr title="Phone">
                    P:</abbr>
                (123) 456-7890
            </address>
            <address>
                <strong>Adresse mail</strong><br>
                <a href="mailto:contact@echoppeDagobert.com">contact@echoppeDagobert.com</a>
            </address>
            </form>
        </div>
    </div>
</div>

<br><br><br><br>
</div>
<?php 

	include("./footer.php");
	
?>