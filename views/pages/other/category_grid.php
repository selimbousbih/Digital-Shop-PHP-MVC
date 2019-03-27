<?php   require_once('header.php'); 
		require_once "models/crudCategory.php";
		$crud = new crudCategory();
		
		if (isset($_GET['category'])){
			$category = $_GET['category'];
		}
		else
		{
			$category = 'guitars';
		}
		
		$cat = $crud->selectCategory($category);
		$categories = $crud->selectSubCategories($category);
		if ($crud->isSub($category)){
			$main_cat = $crud->selectMainCategory($category);
			$categories = $crud->selectSubCategories($main_cat->getName());
		}
?>

<!-- Breadcrumb Starts -->
	<div class="breadcrumb-wrap">
		<div class="container">
		<!-- Breadcrumb Starts -->
			<ol class="breadcrumb">
				<li><a href="?page=home">Home</a></li>
				<?php if (isset($main_cat)){ ?>
					<li><a href="?page=category_grid&category=<?php echo $main_cat->getName(); ?>"><?php echo $main_cat->getDisplayName(); ?></a></li>
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
							<select id="input-limit" class="form-control">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3" selected="selected">3</option>
							</select>
						</div>
					</div>						 
				</div>
			<!-- Product Filter Ends -->
			<!-- Product Grid Display Starts -->
				<div class="row">
				<!-- Product #1 Starts -->
					<div class="col-md-4 col-sm-6">
						<div class="product-col">
							<div class="image">
								<img src="images/product-images/15.jpg" alt="product" class="img-responsive" />
							</div>
							<div class="caption">
								<h4><a href="product.html">Lag Arkane 200</a></h4>
								<div class="description">
									We are so lucky living in such a wonderful time. Our almost unlimited ...
								</div>
								<div class="price">
									<span class="price-new">TND499.50</span> 
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
				<!-- Product #1 Ends -->
				<!-- Product #2 Starts -->
					<div class="col-md-4 col-sm-6">
						<div class="product-col">
							<div class="image">
								<img src="images/product-images/14.jpg" alt="product" class="img-responsive" />
							</div>
							<div class="caption">
								<h4><a href="product.html">Ibanez GRG170</a></h4>
								<div class="description">
									We are so lucky living in such a wonderful time. Our almost unlimited ...
								</div>
								<div class="price">
									<span class="price-new">TND699.50</span> 
									<span class="price-old">TND749.50</span>
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
				<!-- Product #2 Ends -->
				<!-- Product #3 Starts -->
					<div class="col-md-4 col-sm-6">
						<div class="product-col">
							<div class="image">
								<img src="images/product-images/5.jpg" alt="product" class="img-responsive" />
							</div>
							<div class="caption">
								<h4><a href="product.html">Ibanez GRG140</a></h4>
								<div class="description">
									We are so lucky living in such a wonderful time. Our almost unlimited ...
								</div>
								<div class="price">
									<span class="price-new">TND199.50</span> 
									<span class="price-old">TND249.50</span>
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
				<!-- Product #3 Ends -->
				<!-- Product #4 Starts -->
					<div class="col-md-4 col-sm-6">
						<div class="product-col">
							<div class="image">
								<img src="images/product-images/6.jpg" alt="product" class="img-responsive" />
							</div>
							<div class="caption">
								<h4><a href="product.html">Digital Electro Goods</a></h4>
								<div class="description">
									We are so lucky living in such a wonderful time. Our almost unlimited ...
								</div>
								<div class="price">
									<span class="price-new">TND199.50</span> 
									<span class="price-old">TND249.50</span>
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
				<!-- Product #4 Ends -->
				<!-- Product #5 Starts -->
					<div class="col-md-4 col-sm-6">
						<div class="product-col">
							<div class="image">
								<img src="images/product-images/7.jpg" alt="product" class="img-responsive" />
							</div>
							<div class="caption">
								<h4><a href="product.html">Digital Electro Goods</a></h4>
								<div class="description">
									We are so lucky living in such a wonderful time. Our almost unlimited ...
								</div>
								<div class="price">
									<span class="price-new">TND199.50</span> 
									<span class="price-old">TND249.50</span>
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
				<!-- Product #5 Ends -->
				<!-- Product #6 Starts -->
					<div class="col-md-4 col-sm-6">
						<div class="product-col">
							<div class="image">
								<img src="images/product-images/8.jpg" alt="product" class="img-responsive" />
							</div>
							<div class="caption">
								<h4><a href="product.html">Digital Electro Goods</a></h4>
								<div class="description">
									We are so lucky living in such a wonderful time. Our almost unlimited ...
								</div>
								<div class="price">
									<span class="price-new">TND199.50</span> 
									<span class="price-old">TND249.50</span>
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
				<!-- Product #6 Ends -->
				</div>
			<!-- Product Grid Display Ends -->
			</div>
		<!-- Primary Content Ends -->
		</div>
	</div>
<!-- Main Container Ends -->