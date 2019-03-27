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
                
				<!-- Shopping Options Starts -->
                <h3 class="side-heading"><i class="fa fa-align-justify"></i> Shopping Options</h3>
				<form action="" method="get">
				<input type="hidden" name="controller" value="category_grid">
				<input type="hidden" name="action" value="show">
				<input type="hidden" name="category" value="<?php echo $category;?>">
                <div class="list-group">
                    <div class="list-group-item">
                        Marque
                    </div>
                    <div class="list-group-item">
                        <div class="filter-group">
						<?php foreach($brands as $brand){ ?>
                            <label class="checkbox">
							 <input name="<?php echo $brand->getName();?>" type="checkbox" value="1" <?php echo $brand->isChecked() ? ' checked="1"' : '';?> />
							 <?php echo sprintf('%s (%d)', $brand->getName(), $brand->getCount());  ?>
							</label>
						<?php } ?>
                        </div>
                    </div>
                    <div class="list-group-item">
                        Afficher
                    </div>
                    <div class="list-group-item">
                        <div class="filter-group">
                            <label class="radio">
								<input name="filter-promo" type="radio" value="all" checked="checked" />
								Tout
							</label>
                            <label class="radio">
								<input name="filter-promo" type="radio" value="discount" />
								Produits en promotion
							</label>
                        </div>
                    </div>
					<div class="list-group-item">
                        <button type="button" class="btn btn-black" onclick="this.form.submit();">Filtrer</button>
                    </div>
                </div>
				</form>
                <!-- Shopping Options Ends -->
                <!-- Banner #1 Starts -->
                <a href="https://www.facebook.com/GARBYS-Officiel-121001341250638/"><img src="images/banners/side-banner1.png" alt="Side Banner" class="img-responsive img-center-sm img-center-xs" /></a>
                <br>
                <!-- Banner #1 Ends -->
            </div>
            <!-- Sidebar Ends -->