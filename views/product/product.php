<?php  
require_once('/../header.php'); 
?>

<!-- Breadcrumb Starts -->
	<div class="breadcrumb-wrap">
		<div class="container">
		<!-- Breadcrumb Starts -->
			<ol class="breadcrumb">
				<li><a href="?controller=pages&action=home">Accueil</a></li>
				<li class="active">Produit</li>
			</ol>
		<!-- Breadcrumb Ends -->		
		</div>
	</div>
<!-- Breadcrumb Ends -->
<!-- Main Container Starts -->
	<div class="main-container inner container">
		<div class="row">
		<!-- sidebar starts -->
		<?php include_once('sidebar.php');?>
		
		<!-- Primary Content Starts -->
			<div class="col-md-9">
			<!-- Product Info Starts -->
				<div class="row product-info">
				<!-- Left Starts -->
					<div class="col-sm-5 images-block">
						<p>
							<img id="zoom_img" src="<?php echo $img_dir . $product->getImage(); ?>" data-zoom-image = "<?php echo $img_dir . $product->getImage(); ?>" alt="Image" class="img-responsive thumbnail product_image" />
						</p>
					</div>
				<!-- Left Ends -->
				<!-- Right Starts -->
					<div class="col-sm-7 product-details">
					<!-- Product Name Starts -->
						<h2><?php echo $product->getName(); ?></h2>
					<!-- Product Name Ends -->
						<hr />
					<!-- Manufacturer Starts -->
						<ul class="list-unstyled manufacturer">
							<li>
								<span>Marque:</span><?php echo $product->getBrand();?>
							</li>
							<li>
								<?php if($product->getStock() > 3): ?>
									<span>Stock:</span> <strong class="label label-success">Disponible</strong>
								<?php elseif($product->getStock() > 0): ?>
									<span>Stock:</span> <strong class="label label-info">Limité</strong>
								<?php else: ?>
									<span>Stock:</span> <strong class="label label-danger">Non Disponible</strong>
								<?php endif; ?>
							</li>
						</ul>
					<!-- Manufacturer Ends -->
						<hr />
					<!-- Price Starts -->
						<div class="price">
							<span class="price-head">Prix :</span>
							<?php if ($product->getNewPrice() > 0): ?>
								<span class="price-new"><?php echo number_format($product->getNewPrice(), 3, ',', ' ') . ' DT' ;?></span> 
								<span class="price-old"><?php echo number_format($product->getPrice(), 3, ',', ' ') . ' DT' ; ?></span> 
							<?php else: ?>
								<span class="price-new"><?php echo number_format($product->getPrice(), 3, ',', ' ') . ' DT' ;?></span> 
							<?php endif;?>
						</div>
					<!-- Price Ends -->
						<hr />
					<!-- Available Options Starts -->
						<div class="options">
							<div class="form-group">
								<label class="control-label text-uppercase" for="input-quantity">Quantité:</label>
								<input type="number" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
							</div>
							<div class="cart-button button-group">
								<button type="button" class="btn btn-cart" onClick="add_to_cart(<?php echo $product->getId();?>)">
									<i class="fa fa-shopping-cart hidden-sm hidden-xs"></i> Ajouter au panier
								</button>									
							</div>
						</div>
					<!-- Available Options Ends -->
						
					</div>
				<!-- Right Ends -->
				</div>
			<!-- product Info Ends -->
	<!-- Tabs Starts -->
		<div class="tabs-panel panel-smart">
		<!-- Nav Tabs Starts -->
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab-description">Description</a>
				</li>
				<li><a href="#tab-review">Review</a></li>
			</ul>
		<!-- Nav Tabs Ends -->
		<!-- Tab Content Starts -->
			<div class="tab-content clearfix">
			<!-- Description Starts -->
				<div class="tab-pane active" id="tab-description">
					<p style="font-size: 14px">
						Appelez le numéro 97 273 809 ou visitez notre boutique à Rue Mohamed Rjiba 7000 Bizerte.<br>
						Garbys Matos.
					</p>
					<p>
						<?php echo $product->getDescription(); ?>
					</p>
				</div>
			<!-- Description Ends -->
			<!-- Review Starts -->
				<div class="tab-pane" id="tab-review">
					<form class="form-horizontal" method="post" action="includes/product-review.php">
						<input type="hidden" name="pid" value="<?php echo $product->getId();?>">
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-name">Name</label>
							<div class="col-sm-10">
							<input type="text" name="name" value="<?php if (login_check(Db::getInstance())) echo $_SESSION['username']; ?>" id="input-name" class="form-control" />
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-review">Review</label>
							<div class="col-sm-10">
								<textarea name="text" rows="5" id="input-review" class="form-control"></textarea>

							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label ratings">Ratings</label>
							<div class="col-sm-10">
								Bad&nbsp;
								<input type="radio" name="rating" value="1" />
								&nbsp;
								<input type="radio" name="rating" value="2" />
								&nbsp;
								<input type="radio" name="rating" value="3" />
								&nbsp;
								<input type="radio" name="rating" value="4" />
								&nbsp;
								<input type="radio" name="rating" value="5" />
								&nbsp;Good
							</div>
						</div>
						<div class="buttons">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" id="button-review" class="btn btn-main">
									Submit
								</button>
							</div>
						</div>
					</form>
				</div>
			<!-- Review Ends -->
			</div>
		<!-- Tab Content Ends -->
		</div>
	<!-- Tabs Ends -->	
	
			<!-- Related Products Starts -->		
			<div class="product-info-box">
					<h4 class="heading">Produits Similaires</h4>
					
				<!-- Products Row Starts -->
					<div class="row">
					<!-- Product Starts -->
					<?php foreach($related as $product): ?>
						<div class="col-md-4 col-sm-6">
							<div class="product-col">
								<div class="image">
									<img src="<?php echo $img_dir . $product->getImage(); ?>" alt="product" class="img-responsive" />
								</div>
								<div class="caption">
									<h4><a href="?controller=product&action=show&pid=<?php echo $product->getId();?>"><?php echo $product->getName(); ?></a></h4>
									<div class="description">
										<?php echo $product->getDescription(); ?>
									</div>
									<div class="price">
									<?php if ($product->getNewPrice() > 0): ?>
										<span class="price-new"><?php echo number_format($product->getNewPrice(), 3, ',', ' ') . ' DT' ;?></span> 
										<span class="price-old"><?php echo number_format($product->getPrice(), 3, ',', ' ') . ' DT' ; ?></span> 
									<?php else: ?>
										<span class="price-new"><?php echo number_format($product->getPrice(), 3, ',', ' ') . ' DT' ;?></span> 
									<?php endif;?>
									</div>
									<div class="cart-button button-group">
										<button type="button" class="btn btn-cart">
											<i class="fa fa-shopping-cart"></i> 
											Ajouter au panier
										</button>								
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<!-- Product Ends -->
					</div>
				<!-- Products Row Ends -->
				</div>
			<!-- Related Products Ends -->
			</div>
		<!-- Primary Content Ends -->
		</div>
	</div>
<!-- Main Container Ends -->