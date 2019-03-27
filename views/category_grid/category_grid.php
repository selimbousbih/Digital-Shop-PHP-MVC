<?php   
	require_once('/../header.php'); 
?>
<!-- Breadcrumb Starts -->
	<div class="breadcrumb-wrap">
		<div class="container">
		<!-- Breadcrumb Starts -->
			<ol class="breadcrumb">
				<li><a href="?controller=pages&action=home">Home</a></li>
				<?php if (isset($main_cat)){ ?>
					<li><a href="?controller=category_grid&action=show&category=<?php echo $main_cat->getName(); ?>"><?php echo $main_cat->getDisplayName(); ?></a></li>
				<?php } ?>
				<li class="active"><?php echo $cat->getDisplayName(); ?></li>
			</ol>
		<!-- Breadcrumb Ends -->		
		</div>
	</div>
<!-- Breadcrumb Ends -->
<!-- Main Container Starts -->
	<div class="main-container inner container">
		<div class="row">		
		<!-- sidebar -->
		<?php include_once('category_sidebar.php'); ?>
		<!-- Primary Content Starts -->
			<div class="col-md-9">
			<!-- Main Heading Starts -->
				<h2 class="main-heading2 inner">
					<?php echo $cat->getDisplayName(); ?>
				</h2>
			<!-- Main Heading Ends -->
			<!-- Product Grid Display Starts -->
				<div class="row">
				<?php foreach($products as $product): ?>
				<!-- Product #1 Starts -->
					<div class="col-md-4 col-sm-6">
						<div class="product-col">
							<div class="image">
								<img src="images/product-images/<?php echo $product->getImage();?>" alt="product" class="img-responsive" />
							</div>
							<div class="caption">
								<h4><a href="?controller=product&action=show&pid=<?php echo $product->getId();?>"><?php echo $product->getName();?></a></h4>
								<div class="description">
									<?php echo $product->getDescription();?>
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
									<button type="button" class="btn btn-cart" onClick="add_to_cart(<?php echo $product->getId();?>)">
										<i class="fa fa-shopping-cart"></i> 
										Add to cart
									</button>
									<button type="button" title="Wishlist" class="btn btn-wishlist">
										<i class="fa fa-heart"></i>
									</button>
									<button type="button" title="Compare" class="btn btn-compare">
										<i class="fa fa-bar-chart-o"></i>
									</button>									
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
				<!-- Product #1 Ends -->
				
				</div>
			<!-- Product Grid Display Ends -->
			</div>
		<!-- Primary Content Ends -->
		</div>
	</div>
<!-- Main Container Ends -->