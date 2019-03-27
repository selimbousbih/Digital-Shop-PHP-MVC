<!-- Header Wrap Starts -->
	<header class="header-wrap inner">
	<!-- Header Top Starts -->
		<div class="header-top">
		<!-- Nested Container Starts -->
			<div class="container">
			<!-- Nested Row Starts -->
				<div class="row">
				<!-- Logo Starts -->
					<div class="col-md-3 col-sm-4 col-xs-12">
						<a href="?controller=pages&action=home">
							<img src="images/logo.png" alt="Digi Shoppe" class="img-responsive logo" />
						</a>
					</div>
				<!-- Logo Ends -->
                    <!-- Header Top Links Starts -->
                    <div class="col-md-5 col-xs-12 hidden-sm hidden-xs">
                        <ul class="list-unstyled list-inline header-links text-center">
                            <li><a href="?controller=pages&action=home">Accueil</a></li>
                            <li><a href="?controller=order&action=cart">Panier</a></li>
                            <?php if (login_check(Db::getInstance())): ?>
								<li><a href="#"><?php echo 'Bienvenu ' . $_SESSION['username'] . ' <a href="?controller=members&action=logout">(Se déconnecter)</a>'; ?></a></li>
							<?php else: ?>	
								<li><a href="?controller=members&action=login">Se connecter</a></li>
							<?php endif; ?>	
                        </ul>
                    </div>
                    <!-- Header Top Links Ends -->
				<?php require_once('controllers/shopping_cart_controller.php');?>
	
				<!-- Shopping Cart Starts -->
				<div class="col-md-2 col-sm-3 col-xs-12">
						<div id="cart" class="btn-group pull-right">
						
						<?php require_once('views/shopping-cart.php'); ?>					
						</div>
					</div>
				<!-- Shopping Cart Ends -->
				</div>
			<!-- Nested Row Ends -->
			</div>
		<!-- Nested Container Ends -->
		</div>
	<!-- Header Top Ends -->
	<!-- Main Menu Starts -->
		<?php require_once('navbar.php');?>
	<!-- Main Menu Ends -->
	</header>
<!-- Header Wrap Ends -->