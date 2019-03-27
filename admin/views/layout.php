<!doctype html>
<html lang="en">
<head>
	    <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Light Bootstrap Dashboard by Creative Tim</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <!-- Bootstrap core CSS   Animation library for notifications   Light Bootstrap Table core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/animate.min.css" rel="stylesheet" />
        <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet" />
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<!--
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
		-->
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" /> 
        <link rel="stylesheet" type="text/css" href="assets/jTable/media/css/jquery.dataTables.css">
        <style>
        .hide-text{font:0/0 a;color:transparent;text-shadow:none;background-color:transparent;border:0;}
        .input-block-level{display:block;width:100%;min-height:30px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}
        .btn-file{overflow:hidden;position:relative;vertical-align:middle;}.btn-file>input{position:absolute;top:0;right:0;margin:0;opacity:0;filter:alpha(opacity=0);transform:translate(-300px, 0) scale(4);font-size:23px;direction:ltr;cursor:pointer;}
        .fileupload{margin-bottom:9px;}.fileupload .uneditable-input{display:inline-block;margin-bottom:0px;vertical-align:middle;cursor:text;}
        .fileupload .thumbnail{overflow:hidden;display:inline-block;margin-bottom:5px;vertical-align:middle;text-align:center;}.fileupload .thumbnail>img{display:inline-block;vertical-align:middle;max-height:100%;}
        .fileupload .btn{vertical-align:middle;}
        .fileupload-exists .fileupload-new,.fileupload-new .fileupload-exists{display:none;}
        .fileupload-inline .fileupload-controls{display:inline;}
        .fileupload-new .input-append .btn-file{-webkit-border-radius:0 3px 3px 0;-moz-border-radius:0 3px 3px 0;border-radius:0 3px 3px 0;}
        .thumbnail-borderless .thumbnail{border:none;padding:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;}
        .fileupload-new.thumbnail-borderless .thumbnail{border:1px solid #ddd;}
        </style>
		</head>
<body>
 
<?php $db = Db::getInstance();
 if (login_check($db) == true) : ?> 

<div class="wrapper">
    <div class="sidebar" data-color="azure" data-image="assets/img/sidebar-5.jpg">

    <!--
        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag
    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Garbys Matos
                </a>
            </div>

            <ul class="nav">
                <li <?php echo ($controller=="products" ? "class='active'" : "") ;?>>
                    <a href="?controller=products&action=show">
                        <i class="pe-7s-note2"></i>
                        <p>Produits</p>
                    </a>
                </li>
                <li <?php echo ($controller=="promotions" ? "class='active'" : "") ;?>>
                    <a href="?controller=promotions&action=show">
                        <i class="pe-7s-star"></i>
                        <p>Promotions</p>
                    </a>
                </li>
                <li <?php echo ($controller=="contacts" ? "class='active'" : "") ;?>>
                    <a href="?controller=contacts&action=show">
                        <i class="pe-7s-ribbon"></i>
                        <p>Contact</p>
                    </a>
                </li>
                <li <?php echo ($controller=="members" ? "class='active'" : "") ;?>>
                    <a href="?controller=members&action=show">
                        <i class="pe-7s-users"></i>
                        <p>Membres</p>
                    </a>
                </li>
                <li <?php echo ($controller=="gallery" ? "class='active'" : "") ;?>>
                    <a href="?controller=gallery&action=show">
                        <i class="pe-7s-star"></i>
                        <p>Gallery</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                       
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
						<li>
                            <a href="includes/logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

<!-- content -->
		<?php require_once('routes.php'); ?>
  

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                       
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>
 <?php else : ?>
            <p>
                <span class="error">Vous n’avez pas les autorisations nécessaires pour accéder à cette page.</span> Please <a href="login.php">login</a>.
            </p>
<?php endif;?>

</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();
			demo.showNotification();
        

    	});
	</script>

	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" language="javascript" src="assets/jTable/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="assets/jTable/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="assets/jTable/resources/demo.js"></script>
	<script type="text/javascript" language="javascript" class="init">
	$(document).ready(function() {
		$('#dynamic').DataTable();
	} );
	</script>

</html>
