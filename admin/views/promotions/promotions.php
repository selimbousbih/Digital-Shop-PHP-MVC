<?PHP
include "crudPromo.php";
$crudPro = new crudPromo();
$conn=$crudPro->cnx;//public
$reponse=$crudPro->afficherProd($conn);
$reponse1=$crudPro->afficherPromo($conn);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    
    <!--      JavaScript         -->
    <script src="mainP.js"></script>
    
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="azure" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                    GARBY'S MATOS
                </a>
                </div>

                <ul class="nav">
                    <li>
                        <a href="dashboard.php">
                            <i class="pe-7s-graph"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="user.php">
                            <i class="pe-7s-user"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="table.php">
                            <i class="pe-7s-note2"></i>
                            <p>Table List</p>
                        </a>
                    </li>
                    <li>
                        <a href="typography.php">
                            <i class="pe-7s-news-paper"></i>
                            <p>Typography</p>
                        </a>
                    </li>
                    <li>
                        <a href="icons.php">
                            <i class="pe-7s-science"></i>
                            <p>Icons</p>
                        </a>
                    </li>
                    <li>
                        <a href="maps.php">
                            <i class="pe-7s-map-marker"></i>
                            <p>Maps</p>
                        </a>
                    </li>
                    <li>
                        <a href="notifications.php">
                            <i class="pe-7s-bell"></i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="promotions.php">
                            <i class="pe-7s-graph2"></i>
                            <p>Offers</p>
                        </a>
                    </li>
                    <li>
                        <a href="advertisement.php">
                            <i class="pe-7s-photo"></i>
                            <p>Advertisements</p>
                        </a>
                    </li>
                    <li class="active-pro">
                        <a href="upgrade.php">
                            <i class="pe-7s-rocket"></i>
                            <p>Upgrade to PRO</p>
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
                    <a class="navbar-brand" href="#">Offers</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Dropdown
										<b class="caret"></b>
									</p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Offers</h4>
                                <br>
                                <p align="center"><button type="button" onclick="AddP()" class="btn btn-info btn-fill">Add Offer</button>
                                <button type="button" onclick="EditP()" class="btn btn-info btn-fill">Edit Offer</button>
                                <button type="button" onclick="DeleteP()" class="btn btn-info btn-fill">Delete Offer</button></p>
                                <br>
                            </div>
                            <div class="content" id="AddProm" style="display:none;">
                               <form action="ajoutPromo.php" method="POST" onsubmit="return ajout(this)" enctype="multipart/form-data">
                                   <legend>Add Offer</legend>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Promotion ID</label>
                                                <input type="number" name="identifier" id="identifier" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Start Date</label>
                                                <input type="date" name="startdate" id="startdate" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <input type="date" name="enddate" id="enddate" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                       <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Percent of Discount</label>
                                                <input type="number" name="discount" id="discount" class="form-control" min="0" max="100">
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Attachement</label>
                                                <input type="file" name="filename" id="filename">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Product ID</label><br>
                                                  <select name="prodid" id="prodid">
                                                        <?php
                                                        //On affiche les lignes du tableau une à une à l'aide d'une boucle
                                                        foreach ($reponse as $donnees)
                                                        {
                                                        ?>
                                                        <option value=" <?php echo $donnees['id_product']; ?>"> <?php echo $donnees['id_product']; ?></option>
                                                        <?php
                                                        }
                                                        //fin de la boucle, la liste contient toute la BDD
                                                        ?>
                                                    </select> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea rows="5" name="description" id="description" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            
                            
                            
                            <div class="content" id="EditProm" style="display:none;">
                                <form action="modifierPromo.php" method="post" enctype="multipart/form-data">
                                  <legend>Edit Offer</legend>
                                   <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="content table-responsive table-full-width">
                                                <table class="table table-hover table-striped">
                                                    <thead>
                                                        <th>Offer ID</th>
                                                        <th>Product ID</th>
                                                        <th>Attachement</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Discount</th>
                                                        <th>Description</th>
                                                        <th><p class="pe-7s-config"></p></th>
                                                    </thead>
                                                    <tbody>
                                                         <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
                                                        foreach ($reponse1 as $donnees)
                                                        {
                                                        ?>
                                                        <tr>
                                                            <th><?php echo $donnees['id_promotion'];?></th>
                                                            <th><?php echo $donnees['id_product'];?></th>
                                                            <th><?php echo $donnees['attachment'];?></th> 
                                                            <th><?php echo $donnees['start_date'];?></th>   
                                                            <th><?php echo $donnees['end_date'];?></th>
                                                            <th><?php echo $donnees['percent'];?> %</th> 
                                                            <th><?php echo $donnees['description'];?></th> 
                                                            <th><input type="radio" name="edtp" value="<?php echo $donnees['id_promotion']?>"></th>
                                                        </tr>
                                                        <?php
                                                        } //fin de la boucle, le tableau contient toute la BDD
                                                        ?>
                                                    </tbody>
                                                </table>
                                                </div>   
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start Date</label>
                                                <input type="date" name="startdate" id="startdate" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <input type="date" name="enddate" id="enddate" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Percent of Discount</label>
                                                <input type="number" name="discount" id="discount" class="form-control" min="0" max="100">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Attachement</label>
                                                <input type="file" name="filename" id="filename" accept="image/gif, image/jpeg, image/png">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea rows="5" name="description" id="description" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Edit Selection</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            
                            
                            
                            <div class="content" id="DeleteProm" style="display:none;">
                                <form action="suppPromo.php" method="post">
                                  <legend>Delete Offer</legend>
                                   <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                               <div class="content table-responsive table-full-width">
                                                <table class="table table-hover table-striped">
                                                    <thead>
                                                        <th>Offer ID</th>
                                                        <th>Product ID</th>
                                                        <th>Attachement</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Discount</th>
                                                        <th>Description</th>
                                                        <th><p class="pe-7s-close"></p></th>
                                                    </thead>
                                                    <tbody>
                                                        <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
                                                        foreach ($reponse1 as $donnees)
                                                        {
                                                        ?>
                                                        <tr>
                                                            <th><?php echo $donnees['id_promotion'];?></th>
                                                            <th><?php echo $donnees['id_product'];?></th>
                                                            <th><?php echo $donnees['attachment'];?></th> 
                                                            <th><?php echo $donnees['start_date'];?></th>   
                                                            <th><?php echo $donnees['end_date'];?></th>
                                                            <th><?php echo $donnees['percent'];?> %</th> 
                                                            <th><?php echo $donnees['description'];?></th> 
                                                            <th><input type="checkbox" name="idpromo[]" value="<?php echo $donnees['id_promotion']?>"></th>
                                                        </tr>
                                                        <?php
                                                        } //fin de la boucle, le tableau contient toute la BDD
                                                        ?>
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Delete Selection</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            
                            
                            
                        </div>
                    </div>
                      
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
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

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>