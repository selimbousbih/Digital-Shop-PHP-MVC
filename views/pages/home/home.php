	<!-- Header Wrap Starts -->
    <header class="header-wrap">
        <!-- Slider Starts -->
        <div id="main-carousel" class="carousel slide carousel-fade" data-ride="carousel" align="center">
            <!-- Indicators Starts -->
            <ol class="carousel-indicators hidden-sm hidden-xs">
                <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#main-carousel" data-slide-to="1"></li>
            </ol>
            <!-- Indicators Ends -->
            <!-- Wrapper For Slides Starts -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="images/slider-imgs/slider-img4.jpg" alt="Slider" class="img-responsive" />
                    <div class="carousel-caption text-center hidden-xs">
                        <h1>ROLAND KIYOLA KF-10</h1>
                        <p>
                            Un piano numérique de conception artisanale qui abrite la technologie de<br> modélisation dans un meuble en bois naturel fabriqué à la main.
                        </p>
                        <h2>Prix <span>TND2099.90</span></h2>
                    </div>
                </div>
                <div class="item">
                    <img src="images/slider-imgs/slider-img5.jpg" alt="Slider" class="img-responsive" align="center" />
                    <div class="carousel-caption text-center hidden-xs">
                        <h1>TAYLOR 614CE</h1>
                        <p>
                            Le modèle grand auditorium de la nouvelle<br>série 600 présentée au Winter NAMM 2015
                        </p>
                        <h2>Prix <span>TND699.90</span></h2>
                    </div>
                </div>
            </div>
            <!-- Wrapper For Slides Ends -->
            <!-- Controls Starts -->
            <a class="left carousel-control hidden-xs" href="#main-carousel" role="button" data-slide="prev">
                <span class="fa fa-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>
            <a class="right carousel-control hidden-xs" href="#main-carousel" role="button" data-slide="next">
                <span class="fa fa-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
            <!-- Controls Ends -->
        </div>
        <!-- Slider Ends -->
        <!-- Header Top Starts -->
        <div class="header-top">
            <!-- Nested Container Starts -->
            <div class="container">
                <!-- Nested Row Starts -->
                <div class="row">
                    <!-- Logo Starts -->
                    <div class="col-md-3 col-sm-4 col-xs-10">
                        <a href="?controller=pages&action=home">
                            <img src="images/logo.png" alt="GarbysMatos" class="img-responsive logo" />
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
                    				<?php 
					require_once('models/crudShoppingCart.php');
					$items = array();
					if(isset($_SESSION['user_id'])){
						$uid = $_SESSION['user_id'];
						$items = crudShoppingCart::getMemberItems($uid);
						$itemsCount = crudShoppingCart::getItemsCount($uid);
					}
					
				?>
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
			<?php include_once('navbar.php'); ?>
        <!-- Main Menu Ends -->
    </header>
	
    <!-- Header Wrap Ends -->
    <!-- Main Container Starts -->
    <div class="main-container container">
        <!-- Nested Row Starts -->
        <div class="row">
			<?php include_once('sidebar.php');?>
			
            <!-- Primary Content Starts -->
            <div class="col-md-9">
                <!-- 2 Column Banners Starts -->
                <div class="col2-banners">
                    <ul class="row list-unstyled">
                        <li class="col-sm-8">
                            <a href="?controller=product&action=show&pid=11"><img src="images/banners/2col-banner1.png" alt="banners" class="img-responsive" /></a>
                        </li>
                        <li class="col-sm-4">
                            <img src="images/banners/2col-banner2.png" alt="banners" class="img-responsive" />
                        </li>
                    </ul>
                </div>
                <!-- 2 Column Banners Ends -->
				
				<!-- Promotions Products Starts -->
				<?php include_once('promotion_products.php'); ?>
                <!-- Promotion Products Ends -->
				
                <!-- 1 Column Banners Starts -->
                <div class="col1-banners">
                   <a href="?controller=category_grid&action=show&category=guitars">
						<img src="images/banners/1col-banner1.png" alt="banners" class="img-responsive img-center-sm img-center-xs" />
				   </a>
                </div>
                <!-- 1 Column Banners Ends -->
                
				<!-- Latest Products Starts -->
				<?php include_once('latest_products.php');?>
                <!-- Latest Products Ends -->
				
            </div>
            <!-- Nested Row Ends -->
        </div>
        <!-- Nested Container Ends -->
    </div>
    <!-- Footer Top Ends -->