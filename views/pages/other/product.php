<?php  require_once('header.php'); ?>


<!-- Breadcrumb Starts -->
	<div class="breadcrumb-wrap">
		<div class="container">
		<!-- Breadcrumb Starts -->
			<ol class="breadcrumb">
				<li><a href="index-2.html">Home</a></li>
				<li><a href="category-list.html">Category</a></li>
				<li class="active">Product</li>
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
							<img src="images/product-images/pimg3.jpg" alt="Image" class="img-responsive thumbnail" />
						</p>
						<ul class="list-unstyled list-inline">
							<li>
								<img src="images/product-images/thumb1.jpg" alt="Image" class="img-responsive thumbnail" />
							</li>
							<li>
								<img src="images/product-images/thumb2.jpg" alt="Image" class="img-responsive thumbnail" />
							</li>
							<li>
								<img src="images/product-images/thumb3.jpg" alt="Image" class="img-responsive thumbnail" />
							</li>
							<li>
								<img src="images/product-images/thumb4.jpg" alt="Image" class="img-responsive thumbnail" />
							</li>
						</ul>
					</div>
				<!-- Left Ends -->
				<!-- Right Starts -->
					<div class="col-sm-7 product-details">
					<!-- Product Name Starts -->
						<h2>Digital Electro Goods</h2>
					<!-- Product Name Ends -->
						<hr />
					<!-- Manufacturer Starts -->
						<ul class="list-unstyled manufacturer">
							<li>
								<span>Brand:</span> Indian spices
							</li>
							<li><span>Reward Points:</span> 300</li>
							<li>
								<span>Availability:</span> <strong class="label label-success">In Stock</strong>
							</li>
						</ul>
					<!-- Manufacturer Ends -->
						<hr />
					<!-- Price Starts -->
						<div class="price">
							<span class="price-head">Price :</span>
							<span class="price-new">$199.50</span> 
						</div>
					<!-- Price Ends -->
						<hr />
					<!-- Available Options Starts -->
						<div class="options">
							<div class="form-group">
								<label class="control-label text-uppercase" for="input-quantity">Qty:</label>
								<input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
							</div>
							<div class="cart-button button-group">
								<button type="button" title="Wishlist" class="btn btn-wishlist">
									<i class="fa fa-heart"></i>
								</button>
								<button type="button" title="Compare" class="btn btn-compare">
									<i class="fa fa-bar-chart-o"></i>
								</button>
								<button type="button" class="btn btn-cart">
									<i class="fa fa-shopping-cart hidden-sm hidden-xs"></i> Add to Cart
								</button>									
							</div>
						</div>
					<!-- Available Options Ends -->
						<hr />
					</div>
				<!-- Right Ends -->
				</div>
			<!-- product Info Ends -->
			<!-- Product Description Starts -->
				<div class="product-info-box">
					<h4 class="heading">Description</h4>
					<div class="content panel-smart">
						<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
						</p>
						<p>
							It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
						</p>
					</div>
				</div>
			<!-- Product Description Ends -->
			<!-- Additional Information Starts -->
				<div class="product-info-box">
					<h4 class="heading">Additional Information</h4>
					<div class="content panel-smart">
						<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
						</p>
					</div>
				</div>
			<!-- Additional Information Ends -->
			<!-- Related Products Starts -->
				<div class="product-info-box">
					<h4 class="heading">Related Products</h4>
					<br>
				<!-- Products Row Starts -->
					<div class="row">
					<!-- Product #1 Starts -->
						<div class="col-md-4 col-sm-6">
							<div class="product-col">
								<div class="image">
									<img src="images/product-images/2.jpg" alt="product" class="img-responsive" />
								</div>
								<div class="caption">
									<h4><a href="product.html">Digital Electro Goods</a></h4>
									<div class="description">
										We are so lucky living in such a wonderful time. Our almost unlimited ...
									</div>
									<div class="price">
										<span class="price-new">$199.50</span> 
										<span class="price-old">$249.50</span>
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
									<img src="images/product-images/3.jpg" alt="product" class="img-responsive" />
								</div>
								<div class="caption">
									<h4><a href="product.html">Digital Electro Goods</a></h4>
									<div class="description">
										We are so lucky living in such a wonderful time. Our almost unlimited ...
									</div>
									<div class="price">
										<span class="price-new">$199.50</span> 
										<span class="price-old">$249.50</span>
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
									<img src="images/product-images/4.jpg" alt="product" class="img-responsive" />
								</div>
								<div class="caption">
									<h4><a href="product.html">Digital Electro Goods</a></h4>
									<div class="description">
										We are so lucky living in such a wonderful time. Our almost unlimited ...
									</div>
									<div class="price">
										<span class="price-new">$199.50</span> 
										<span class="price-old">$249.50</span>
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
					</div>
				<!-- Products Row Ends -->
				</div>
			<!-- Related Products Ends -->
			</div>
		<!-- Primary Content Ends -->
		</div>
	</div>
<!-- Main Container Ends -->