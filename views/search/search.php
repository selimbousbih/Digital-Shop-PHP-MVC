<?php   
	require_once('/../header.php'); 
?>

<!-- Breadcrumb Starts -->
	<div class="breadcrumb-wrap">
		<div class="container">
		<!-- Breadcrumb Starts -->
			<ol class="breadcrumb">
				<li><a href="?controller=pages&action=home">Accueil</a></li>
				<li class="active">Recherche</li>
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
					Résultats
				</h2>
			<!-- Main Heading Ends -->
			<!-- Product Filter Starts -->
				<div class="product-filter">
					<div class="row">
						<div class="col-md-4">
							<div class="display">
								<a href="category-list.html">
									<i class="fa fa-th-list" title="List View"></i>
								</a>
								<a href="category-grid.html" class="active">
									<i class="fa fa-th" title="Grid View"></i>
								</a>
							</div>
						 </div>
						<div class="col-md-2 text-right">
							<label class="control-label">Sort</label>
						</div>
						<div class="col-md-3 text-right">
							<select class="form-control">
								<option value="default" selected="selected">Default</option>
								<option value="NAZ">Name (A - Z)</option>
								<option value="NZA">Name (Z - A)</option>
							</select>
						</div>
						<div class="col-md-1 text-right">
							<label class="control-label" for="input-limit">Show</label>
						</div>
						<div class="col-md-2 text-right">
						<form id="show-submit" action="" method="get">
							<select name ="show" id="input-limit" class="form-control" onChange="">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3" selected="selected">3</option>
							</select>
						</form>
						</div>
					</div>						 
				</div>
			<!-- Product Filter Ends -->
			<?php
				
			?>
			
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
								<h4><a href="?page=product&pid=<?php echo $product->getId();?>"><?php echo $product->getName();?></a></h4>
								<div class="description">
									<?php echo $product->getDescription();?>
								</div>
								<div class="price">
									<span class="price-new"><?php echo $product->getPrice();?></span> 
									<span class="price-old">TND549.50</span>
								</div>
								<div class="cart-button button-group">
									<button type="button" class="btn btn-cart">
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