<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Garby's Matos</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css">

    <!-- CSS Files -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
	<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" /> 
	
	<link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
	<link rel="icon" href="/favicon.png" type="image/x-icon">
	

    <!--[if lt IE 9]>
		<script src="js/ie8-responsive-file-warning.js"></script>
	<![endif]-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/fav-144.html">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/fav-114.html">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/fav-72.html">
    <link rel="apple-touch-icon-precomposed" href="images/fav-57.html">
    <link rel="shortcut icon" href="images/fav.html">
	<style>
	section.hiddener {
		display: none;
		position: fixed;
		overflow: scroll;
	}
	section article.popup {
		position: relative;
		width: 50%;
		height: auto;
		background: white;
		padding: 10px 10px 40px 40px;
		margin: 10% auto;
		border-radius: 7px;
	}
	span.close {
		text-transform: uppercase;
		color: #222;    
	}
            
	span.close:hover {
		color: red;
		cursor: pointer;
	}



	</style>
	


</head>

  <body>
  

    <?php require_once('routes.php'); ?>
	
	<section class="hiddener">
		<article class="popup">
			<span class="close"><i class="pe-7s-close-circle"></i></span>
            <div class="edit_delivery_form" id="testing">
				<p style="margin-top: 20px; margin-left: 20px; font-size:16px;"><?php echo isset($_SESSION['user_id']) ? "Le produit à été ajouté à votre panier." : "Vous devez être connécté pour pouvoir accéder à votre panier." ?></p>
		   </div>
        </article>
     </section>

	
<!-- Footer Section Starts -->
	<footer id="footer-area">
	<!-- Footer Links Starts -->
		<div class="footer-links">
		<!-- Container Starts -->
			<div class="container">
				<!-- Information Links Starts -->
					<div class="col-md-2 col-sm-3 col-xs-12">
						<h5>Information</h5>
						<ul>
							<li><a href="#">A propos</a></li>
							<li><a href="#">Termes et Conditions</a></li>
						</ul>
					</div>
				<!-- Information Links Ends -->
				<!-- My Account Links Starts -->
					<div class="col-md-2 col-sm-3 col-xs-12">
						<h5>Mon compte</h5>
						<ul>
							<li><a href="#">Mes achats</a></li>
							<li><a href="?controller=members&action=info">Mes adresses</a></li>
							<li><a href="?controller=members&action=info">Mes informations</a></li>
						</ul>
					</div>
				<!-- My Account Links Ends -->					
				<!-- Customer Service Links Starts -->
					<div class="col-md-2 col-sm-3 col-xs-12">
						<h5>Service</h5>
						<ul>
							<li><a href="?controller=pages&action=contact">Contactez Nous</a></li>
							<li><a href="?controller=pages&action=promotions">Promotions</a></li>
						</ul>
					</div>
				<!-- Customer Service Links Ends -->
				<!-- Follow Us Links Starts -->
					<div class="col-md-2 col-sm-3 col-xs-12">
						<h5>Suivez Nous</h5>
						<ul>
							<li><a href="https://www.facebook.com/ANIS-MATOS-584448788421911/">Facebook</a></li>
							<li><a href="https://www.youtube.com/channel/UC5KfVvSd9UJgbe0xX3YMF2Q">YouTube</a></li>
						</ul>
					</div>
				<!-- Follow Us Links Ends -->
				<!-- Contact Us Starts -->
					<div class="col-md-4 col-xs-12 last">
						<h5>Contactez Nous</h5>
						<ul>
							<li>Garby's Matos</li>
							<li>
								Rue Mohamed Rjiba 7000 Bizerte
							</li>
							<li>
								Email: garbys.matos@gmail.com
							</li>								
						</ul>
						<h4 class="lead">
							Tel: <span>+216 97 273 809</span>
						</h4>
					</div>
				<!-- Contact Us Ends -->
			</div>
		<!-- Container Ends -->
		</div>
	<!-- Footer Links Ends -->
	<!-- Copyright Area Starts -->
		<div class="copyright">
		<!-- Container Starts -->
			<div class="container">
			<!-- Starts -->
				<p class="pull-left">
					&copy; <?php echo date("Y"); ?> &nbsp Garby's Matos. Designed By <a href="#">C Squad</a>
				</p>
			<!-- Ends -->
			
			</div>
		<!-- Container Ends -->
		</div>
	<!-- Copyright Area Ends -->
	</footer>
	
		      <!-- JavaScript Files -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/custom.js"></script>
	<script src="assets/elevatezoom-master/jquery.elevatezoom.js"></script>

	<script>
		function showHiddener(){
                 var hiddenSection = $('section.hiddener');
				 setTimeout(function() {
						$(hiddenSection).fadeOut();
					}, 2000);
					
                    hiddenSection.fadeIn()
                        .css({
                            'display': 'block'
                        })

                        .css({
                            width: $(window).width() + 'px',
                            height: $(window).height() + 'px'
               
						})
                        .css({
                            top: ($(window).height() - hiddenSection.height()) / 2 + 'px',
                            left: ($(window).width() - hiddenSection.width()) / 2 + 'px'
                        })
                    
                        .css({
                            'background-color': 'rgba(0,0,0,0.5)'
                        })
                        .appendTo('wrapper');

                    $('span.close').click(function() {
                        $(hiddenSection).fadeOut();
                    });								
            }
			
		function add_to_cart(pid) {
			$.get("includes/shopping-cart.php?action=add&pid=" + pid, function (data) {			
				$("#cart").html(data);
			});    			
		   showHiddener();
		}
		function remove_from_cart(pid) {
			$.get("includes/shopping-cart.php?action=delete&pid=" + pid, function (data) {			
				$("#cart").html(data);
			}); 
		}
	</script>
	
 <script type="text/javascript" src="views/pages/gallery/resources/colorbox/jquery.colorbox.js"></script>
     <script type="text/javascript">
    $(document).ready(function(){
        $("a[rel='colorbox']").colorbox({maxWidth: "90%", maxHeight: "90%", opacity: ".5"});
    });
    </script>
	
	    <script>
		$('#zoom_img').elevateZoom({
			zoomType: "inner",
			cursor: "crosshair",
			zoomWindowFadeIn: 500,
			zoomWindowFadeOut: 750
	   }); 
	</script>
  <body>
  
<html>