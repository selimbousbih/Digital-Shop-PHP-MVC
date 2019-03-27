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
                
				<!-- Shopping Options Starts -->
                <h3 class="side-heading"><i class="fa fa-align-justify"></i> Shopping Options</h3>
                <div class="list-group">
                    <div class="list-group-item">
                        Marque
                    </div>
                    <div class="list-group-item">
                        <div class="filter-group">
                            <label class="checkbox">
								<input name="filter1" type="checkbox" value="br1" checked="checked" />
								Brand Name 1
							</label>
                            <label class="checkbox">
								<input name="filter2" type="checkbox" value="br2" />
								Brand Name 2
							</label>
                            <label class="checkbox">
								<input name="filter3" type="checkbox" value="br3" />
								Brand Name 3
							</label>
                            <label class="checkbox">
								<input name="filter4" type="checkbox" value="br4" />
								Brand Name 4
							</label>
                        </div>
                    </div>
                    <div class="list-group-item">
                        Manufacturer
                    </div>
                    <div class="list-group-item">
                        <div class="filter-group">
                            <label class="radio">
								<input name="filter-manuf" type="radio" value="mr1" checked="checked" />
								Manufacturer Name 1
							</label>
                            <label class="radio">
								<input name="filter-manuf" type="radio" value="mr2" />
								Manufacturer Name 2
							</label>
                            <label class="radio">
								<input name="filter-manuf" type="radio" value="mr3" />
								Manufacturer Name 3
							</label>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <button type="button" class="btn btn-black">Filter</button>
                    </div>
                </div>
                <!-- Shopping Options Ends -->
                <!-- Banner #1 Starts -->
                <a href="#"><img src="images/banners/side-banner1.png" alt="Side Banner" class="img-responsive img-center-sm img-center-xs" /></a>
                <br>
                <!-- Banner #1 Ends -->
            </div>
            <!-- Sidebar Ends -->