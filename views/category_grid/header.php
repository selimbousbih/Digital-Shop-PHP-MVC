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
                            <li><a href="cart.html">Panier</a></li>
                            <li><a href="login.html">Se connecter</a></li>
                            <li><a href="login.html">s'inscrire</a></li>
                        </ul>
                    </div>
                    <!-- Header Top Links Ends -->
				<!-- Currency & Languages Starts -->
					<div class="col-md-2 col-sm-5 col-xs-12 text-center">
					<!-- Languages Starts -->
						<div class="btn-group">
							<button class="btn btn-link dropdown-toggle text-uppercase" data-toggle="dropdown">
								Fr
								<i class="fa fa-caret-down"></i>
							</button>
							<ul class="pull-right dropdown-menu">
								<li>
									<a tabindex="-1" href="#">English</a>
								</li>
								<li>
									<a tabindex="-1" href="#">French</a>
								</li>
							</ul>
						</div>
					<!-- Languages Ends -->
					<!-- Currency Starts -->
						<div class="btn-group">
							<button class="btn btn-link dropdown-toggle text-uppercase" data-toggle="dropdown">
								TND
								<i class="fa fa-caret-down"></i>
							</button>
							<ul class="pull-right dropdown-menu">
								<li><a tabindex="-1" href="#">Pound </a></li>
								<li><a tabindex="-1" href="#">US Dollar</a></li>
								<li><a tabindex="-1" href="#">Euro</a></li>
							</ul>
						</div>
					<!-- Currency Ends -->
					</div>
				<!-- Currency & Languages Ends -->
				<!-- Shopping Cart Starts -->
					<div class="col-md-2 col-sm-3 col-xs-12">
						<div id="cart" class="btn-group pull-right">
							<button type="button" data-toggle="dropdown" class="btn dropdown-toggle text-uppercase">
								<i class="fa fa-shopping-cart"></i>
								<span id="cart-total">0 item(s)</span>
								<i class="fa fa-caret-down"></i>
							</button>
							<ul class="dropdown-menu">
								<li>
									<p class="text-center">Votre Panier est vide!</p>
								</li>									
							</ul>
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
		<nav id="main-menu" class="navbar" role="navigation">
		<!-- Nested Container Starts -->
			<div class="container">
			<!-- Nav Header Starts -->
				<div class="navbar-header">
					<button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-cat-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<i class="fa fa-bars"></i>
					</button>
				</div>
			<!-- Nav Header Ends -->
			<!-- Navbar Cat collapse Starts -->
				<div class="collapse navbar-collapse navbar-cat-collapse">
				<!-- Nav Links Starts -->
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="?controller=category_grid&action=show&category=guitars" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10">
								Guitares
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a tabindex="-1" href="?controller=category_grid&action=show&category=classic-guitars">Guitares classiques</a></li>
								<li><a tabindex="-1" href="?controller=category_grid&action=show&category=electric-guitars">Guitares éléctriques</a></li>
								<li><a tabindex="-1" href="?controller=category_grid&action=show&category=guitars">Guitares Folk</a></li>
								<li><a tabindex="-1" href="?controller=category_grid&action=show&category=guitars">Guitares éléctro-acoustiques</a></li>
								<li><a tabindex="-1" href="?controller=category_grid&action=show&category=guitars">Basses</a></li>
								<li><a tabindex="-1" href="?controller=category_grid&action=show&category=guitars">Amplis guitares</a></li> 
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="?controller=category_grid&action=show&category=keyboards" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10">
								Claviers
							</a>
							<ul class="dropdown-menu" role="menu">
                                <li><a tabindex="-1" href="#">Pianos</a></li> 
								<li><a tabindex="-1" href="#">Arrangeurs</a></li>
								<li><a tabindex="-1" href="#">Synthétiseurs</a></li>
                                <li><a tabindex="-1" href="#">Amplis</a></li> 
                                <li><a tabindex="-1" href="#">Accessoires</a></li> 
								
							</ul>
						</li>
						<li class="dropdown">
							<a href="category-list.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10">Batteries </a>
							<div class="dropdown-menu">
								<div class="dropdown-inner">
									<ul class="list-unstyled">
									
										<li><a tabindex="-1" href="#">Batteries éléctriques</a></li>
										<li><a tabindex="-1" href="#">Batteries acoustiques</a></li>
										<li><a tabindex="-1" href="#">Percussions</a></li>
										<li><a tabindex="-1" href="#">Peaux</a></li>
										<li><a tabindex="-1" href="#">Accéssoires</a></li>
									</ul>										
							
								</div>
							</div>
						</li>
						
                        <li class="dropdown">
							<a href="category-list.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10">
								Instruments à cordes
							</a>
							<ul class="dropdown-menu" role="menu">
                                <li><a tabindex="-1" href="#">Violons</a></li> 
								<li><a tabindex="-1" href="#">Violoncelles</a></li>
								<li><a tabindex="-1" href="#">Contrebasse</a></li>
                                <li><a tabindex="-1" href="#">Oud</a></li> 
                                <li><a tabindex="-1" href="#">Accessoires</a></li> 
								
							</ul>
						</li>
                        
                        <li class="dropdown">
							<a href="category-list.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10">
								Instruments à vents
							</a>
							<ul class="dropdown-menu" role="menu">
                                <li><a tabindex="-1" href="#">Saxo</a></li> 
								<li><a tabindex="-1" href="#">Harmonica</a></li>
								<li><a tabindex="-1" href="#">Flute</a></li>
                                <li><a tabindex="-1" href="#">Amplis</a></li> 
                                <li><a tabindex="-1" href="#">Accessoires</a></li> 
								
							</ul>
						</li>
                        
						<li class="dropdown">
							<a href="category-list.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10">
								Pages
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a tabindex="-1" href="?page=home">Home</a></li>
								<li><a tabindex="-1" href="?page=about">About</a></li>
								<li><a tabindex="-1" href="category-list.html">Category List</a></li>
								<li><a tabindex="-1" href="category-grid.html">Category Grid</a></li>
								<li><a tabindex="-1" href="?page=product">Product</a></li>
								<li><a tabindex="-1" href="product-full.html">Product Full Width</a></li>
								<li><a tabindex="-1" href="cart.html">Cart</a></li>
								<li><a tabindex="-1" href="login.html">Login</a></li>
								<li><a tabindex="-1" href="compare.html">Compare Products</a></li>
								<li><a tabindex="-1" href="typography.html">Typography</a></li>
								<li><a tabindex="-1" href="register.html">Register</a></li>
								<li><a tabindex="-1" href="contact.html">Contact</a></li>
								<li><a tabindex="-1" href="404.html">404</a></li>
							</ul>
						</li>
					</ul>
				<!-- Nav Links Ends -->
				<!-- Search Form Starts -->
                    <form action="" method="get" class="navbar-form navbar-right hidden-sm hidden-xs" role="search">
                        <div class="input-group">
							<input name="page" value="search" type="hidden">
                            <input name="keywords" type="text" class="form-control" placeholder="Recherche">
                            <span class="input-group-btn">
							<button class="btn btn-default" type="submit">
								<i class="fa fa-search"></i>
							</button>
						  </span>
                        </div>
                    </form>
                    <!-- Search Form Ends -->
				</div>
			<!-- Navbar Cat collapse Ends -->
			</div>
		<!-- Nested Container Ends -->
		</nav>
	<!-- Main Menu Ends -->
	</header>
<!-- Header Wrap Ends -->