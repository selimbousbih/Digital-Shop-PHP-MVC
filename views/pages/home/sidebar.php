            <!-- Sidebar Starts -->
            <div class="col-md-3">
                <!-- Categories Links Starts -->
                <h3 class="side-heading"><i class="fa fa-align-justify"></i> Categories</h3>
                <div class="list-group categories">
				<?php foreach($categories as $side_cat): ?>
                    <a href="?controller=category_grid&action=show&category=<?php echo $side_cat->getName();?>" class="list-group-item">
                        <i class="fa fa-chevron-right"></i> <?php echo $side_cat->getDisplayName();?>
                    </a>
				<?php endforeach; ?>
                </div>
                <!-- Categories Links Ends -->
                <!-- Special Products Starts -->
                <h3 class="side-heading"><i class="fa fa-align-justify"></i> Specials</h3>
                <ul class="side-products-list">
                    <!-- Special Product #1 Starts -->
					<?php foreach($featured as $product): ?>
                    <li class="clearfix">
                        <img src="<?php echo $img_dir . $product->getImage();?>" alt="Special product" class="img-responsive" />
                        <h5><a href="#"><?php echo $product->getName(); ?></a></h5>
                        <div class="price" style="width: 160px;">
                            <?php if ($product->getNewPrice() > 0): ?>
								<span class="price-new"><?php echo number_format($product->getNewPrice(), 2, ',', ' ') . ' DT' ;?></span> 
								<span class="price-old"><?php echo number_format($product->getPrice(), 2, ',', ' ') . ' DT' ; ?></span> 
							<?php else: ?>
								<span class="price-new"><?php echo number_format($product->getPrice(), 2, ',', ' ') . ' DT' ;?></span> 
							<?php endif;?>
                        </div>
                    </li>
					<?php endforeach; ?>
                    <!-- Special Product #1 Ends -->
                </ul>
                <!-- Special Products Ends -->
                
				<!-- Banner #1 Starts -->
                <a href="https://www.facebook.com/GARBYS-Officiel-121001341250638/"><img src="images/banners/side-banner1.png" alt="Side Banner" class="img-responsive img-center-sm img-center-xs" /></a>
                <br>
                <!-- Banner #1 Ends -->
            </div>
            <!-- Sidebar Ends -->