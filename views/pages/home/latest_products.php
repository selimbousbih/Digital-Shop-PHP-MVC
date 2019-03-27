                <!-- Promotions Products Starts -->
                <section class="products-list">
                    <!-- Heading Starts -->
                    <h2 class="product-head">Nouveautés</h2>
                    <!-- Heading Ends -->
                    <!-- Products Row Starts -->
                    <div class="row">
                        <?php foreach($latest as $product) :?>
                        <div class="col-md-4 col-sm-6">
                            <div class="product-col">
                                <div class="image">
                                    <img src="<?php echo $img_dir . $product->getImage();?>" alt="product" class="img-responsive img-center-sm img-center-xs" />
                                </div>
                                <div class="caption">
                                    <h4>
                                        <a href="?controller=product&action=show&pid=<?php echo $product->getId();?>"><?php echo $product->getName();?></a>
                                    </h4>
                                    <p class="description">
                                        <?php echo (strlen($product->getDescription()) < 10 ? $product->getDescription() : substr($product->getDescription(), 0, 10) . "...") ;?>
                                    </p>
                                    <div class="price">
									<?php if ($product->getNewPrice() > 0 and $product->getNewPrice()!=$product->getPrice()): ?>
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
                        <?php endforeach;?>
                    </div>
                    <!-- Products Row Ends -->
                </section>
                <!-- Featured Products Ends -->
