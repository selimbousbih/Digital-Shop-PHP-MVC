			<!-- Sidebar Starts -->
            <div class="col-md-3">
                <!-- Categories Links Starts -->
                <h3 class="side-heading"><i class="fa fa-align-justify"></i> Categories</h3>
                <div class="list-group categories">
					<?php foreach($categories as $side_cat){ ?>
					<a href="?controller=category_grid&action=show&category=<?php echo $side_cat->getName();?>" class="list-group-item">
						<i class="fa fa-chevron-right"></i> <?php echo $side_cat->getDisplayName();?>
					</a>
					<?php } ?>
                    
               </div>
                <!-- Categories Links Ends -->
                
				<!-- Banner #1 Starts -->
                <a href="https://www.facebook.com/GARBYS-Officiel-121001341250638/"><img src="images/banners/side-banner1.png" alt="Side Banner" class="img-responsive img-center-sm img-center-xs" /></a>
                <br>
                <!-- Banner #1 Ends -->
            </div>
            <!-- Sidebar Ends -->