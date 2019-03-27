	<nav id="main-menu" class="navbar" role="navigation">
            <!-- Nested Container Starts -->
            <div class="container">
                <!-- Nav Header Starts -->
                <div class="navbar-header">
                    <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-cat-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<i class="fa fa-bars"></i>
					</button>
                </div>
                <!-- Nav Header Ends -->
                
                <!-- Navbar Cat collapse Starts -->
				<div class="collapse navbar-collapse navbar-cat-collapse">
				<!-- Nav Links Starts -->
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="category-list.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10">
								Produits
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a tabindex="-1" href="?controller=category_grid&action=show&category=guitars">Guitares</a></li>
								<li><a tabindex="-1" href="?controller=category_grid&action=show&category=keyboards">Claviers</a></li>
								<li><a tabindex="-1" href="?controller=category_grid&action=show&category=drums">Batteries</a></li>
								<li><a tabindex="-1" href="?controller=category_grid&action=show&category=strings">Strings</a></li>
								<li><a tabindex="-1" href="?controller=category_grid&action=show&category=brass">Brass</a></li>
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="?controller=pages&action=accessories">
								Accéssoires
							</a>
						</li>
						
						<li class="dropdown">
							<a href="?controller=pages&action=promotions">
								Promotions
							</a>
						</li>
						
                        <li class="dropdown">
							<a href="?controller=pages&action=gallery">
								Gallerie
							</a>
						</li>
                        <li class="dropdown">
							<a href="?controller=pages&action=contact">
								Contact
							</a>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10">
								Pages
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a tabindex="-1" href="?controller=pages&action=home">Accueil</a></li>
								<li><a tabindex="-1" href="?controller=members&action=login">Se connecter</a></li>
								<li><a tabindex="-1" href="?controller=order&action=cart">Mon Panier</a></li>
								<li><a tabindex="-1" href="?controller=members&action=info">Mes informations</a></li>
							</ul>
						</li>
                        
					</ul>
				<!-- Nav Links Ends -->
				<!-- Search Form Starts -->
                    <form action="" method="get" class="navbar-form navbar-right hidden-sm hidden-xs" role="search">
                        <div class="input-group dropdown">
							<input name="controller" value="search" type="hidden">
							<input name="action" value="show" type="hidden">
                            <input id="keyw" name="keywords" type="text" autocomplete="off" class="form-control" placeholder="Recherche">
							<div id="myDropdown" class="dropdown-content">
								
							 </div>
                            <span class="input-group-btn">
							
							<button class="btn btn-default dropbtn" type="button" onclick="myFunction();">
								<i class="fa fa-search"></i>
							</button>
							
							
							</span>
							
                        </div>
							
						
                    </form>
                    <!-- Search Form Ends -->
                </div>
                <!-- Navbar Cat collapse Ends -->
            </div>
            <!-- Nested Container Ends -->
        </nav>
<script src="assets/js/jquery-1.11.1.min.js"></script>    
<script>
	function myFunction() {
		element = document.getElementById("myDropdown");
		if (!element.classList.contains('show'))
			element.classList.toggle("show");
		
	}
	window.onclick = function(event) {
	  if (!event.target.matches('.dropbtn')) {

		var dropdowns = document.getElementsByClassName("dropdown-content");
		var i;
		for (i = 0; i < dropdowns.length; i++) {
		  var openDropdown = dropdowns[i];
		  if (openDropdown.classList.contains('show')) {
			openDropdown.classList.remove('show');
		  }
		}
	  }
	}
	$(document).ready(function(){
		$( "#keyw" ).keypress(function() {
			$.get("includes/search_dropdown.php?keywords=" + document.getElementsByName("keywords")[0].value, function (data) {
                        $("#myDropdown").html(data);
            });
			myFunction();
	});
	});
</script>