					<section class="product-carousel">
                    <!-- Heading Starts -->
                    <h2 class="product-head">Produits en promo!</h2>
                    <!-- Heading Ends -->
                    <!-- Products Row Starts -->
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- Product Carousel Starts -->
                            <div id="owl-product" class="owl-carousel">
                                <!-- Products Starts --> 
								<?php								
								foreach($promoted as $product){
								?>
                                <div class="item">
                                    <div class="product-col">
                                        <div class="image">
                                            <img src="<?php echo $img_dir . $product->getImage();?>" alt="product" class="img-responsive" />
                                        </div>
                                        <div class="caption">
                                            <h4><a href="?controller=product&action=show&pid=<?php echo $product->getId();?>"><?php echo $product->getName();?></a></h4>
                                            <p class="description">
                                                <?php echo $product->getDescription(); ?>
                                            </p>
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
													Ajouter au panier
												</button>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>		
								<?php } ?>
                                <!-- Products End -->
                              
                            </div>
                            <!-- Product Carousel Ends -->
                        </div>
                    </div>
                    <!-- Products Row Ends -->
                </section>
				<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
				
				<script>
				$( document ).ready(function() {
					$('.product-col').matchHeight();
				});
				</script>
				