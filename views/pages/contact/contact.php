<?php  
require_once('/../../header.php');
?>
<link rel="stylesheet" type="text/css" href="views/pages/gallery/resources/UberGallery.css" />
<link rel="stylesheet" type="text/css" href="views/pages/gallery/resources/colorbox/1/colorbox.css" />

<!-- Breadcrumb Starts -->
	<div class="breadcrumb-wrap">
		<div class="container">
		<!-- Breadcrumb Starts -->
			<ol class="breadcrumb">
				<li><a href="?page=home">Accueil</a></li>
				<li class="active">Contact</li>
			</ol>
		<!-- Breadcrumb Ends -->		
		</div>
	</div>
<!-- Breadcrumb Ends -->
<!-- Main Container Starts -->
	<div class="main-container container">
	<!-- Main Heading Starts -->
		<h2 class="main-heading text-center">
			Contactez Nous
		</h2>
	<!-- Main Heading Ends -->
	<!-- Starts -->
		<div class="row">
		<!-- Contact Details Starts -->
			<div class="col-sm-4">
				<div class="panel panel-smart">
					<div class="panel-heading">
						<h3 class="panel-title">Détails</h3>
					</div>
					<div class="panel-body">
						<ul class="list-unstyled contact-details">
							<li class="clearfix">
								<i class="fa fa-home pull-left"></i>
								<span class="pull-left">
									Garby's Matos <br />
									Bizerte Beb Rmal 7000<br />
								</span>
							</li>
							<li class="clearfix">
								<i class="fa fa-phone pull-left"></i>
								<span class="pull-left">
									+216 97 273 809 <br />
								</span>
							</li>
							<li class="clearfix">
								<i class="fa fa-envelope-o pull-left"></i>
								<span class="pull-left">
									garbysmatos@gmail.com <br />
								</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<!-- Contact Details Ends -->
		<!-- Contact Form Starts -->
			<div class="col-sm-8">
				<div class="panel panel-smart">
					<div class="panel-heading">
						<h3 class="panel-title">Envoyer nous un message</h3>
					</div>
					<?php if (isset($_GET['done'])): ?>
						<div class="panel-body">
						<?php if ($_GET['done']=="success"): ?>
							<p>Votre message a été envoyé et est en cours de traitement. Merci.</p>
						<?php else: ?>
							<p>Une erreur inconnu est survenu.</p>
							<?php endif; ?>
							Cliquez <a href="?controller=pages&action=home">ici</a> pour revenir à l'accueil.
						</div>
					<?php else: ?>
					<div class="panel-body">
						<form class="form-horizontal" role="form" action="includes/pages/contact/submit.php" method="post">
							<div class="form-group">
								<label for="name" class="col-sm-2 control-label">
									Nom
								</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="name" id="name" placeholder="Name">
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-sm-2 control-label">
									Email
								</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" name="email" id="email" placeholder="Email">
								</div>
							</div>
							<div class="form-group">
								<label for="subject" class="col-sm-2 control-label">
									Sujet 
								</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
								</div>
							</div>
							<div class="form-group">
								<label for="message" class="col-sm-2 control-label">
									Message
								</label>
								<div class="col-sm-10">
									<textarea name="message" id="message" class="form-control" rows="5" placeholder="Message"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="button" onClick="post_form(this.form, this.form.name, this.form.email, this.form.message);" class="btn btn-black text-uppercase">		Envoyer
									</button>
								</div>
							</div>
						</form>
					</div>
					<?php endif; ?>
				</div>
			</div>
		<!-- Contact Form Ends -->
		</div>
	<!-- Ends -->
	</div>

	<script>
	
function post_form(form, username, email, message) {
    if (username.value == ''         || 
          email.value == ''     || 
          message.value == '') {
        alert('Vous devez fournir tous les détails nécessaires. Veuillez essayer de nouveau');
        return false;
    }
    re = /^[A-Za-z\d\s]+$/; 
    if(!re.test(form.name.value)) { 
        alert("Le nom est incorrecte. Essayez de nouveau"); 
        form.name.focus();
        return false; 
    }
	
	re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(form.email.value)) { 
        alert("Veuillez entrez une adresse mail valide"); 
        form.email.focus();
        return false; 
    }
 
	form.submit();
    return true;
}
	</script>
<!-- Main Container Ends -->

