<?php  
require_once('/../header.php'); 
?>
    <!-- Breadcrumb Starts -->
    <div class="breadcrumb-wrap">
        <div class="container">
            <!-- Breadcrumb Starts -->
            <ol class="breadcrumb">
                <li><a href="?controller=pages&action=home">Accueil</a></li>
                <li class="active">Mes Informations</li>
            </ol>
            <!-- Breadcrumb Ends -->
        </div>
    </div>
    <!-- Breadcrumb Ends -->
    <!-- Main Container Starts -->
    <div class="main-container container">
        <!-- Main Heading Starts -->
        <h2 class="main-heading text-center">
			Informations Personelles
		</h2>
        <!-- Main Heading Ends -->
        <?php 
		if (!isset($_SESSION['user_id']))
			die("Vous devez être connécté pour accéder à cette page.");
		?>
            <!-- Shipping Section Starts -->
            <section class="registration-area">
                <div class="row">
                    
					<div id="form_wrapper" class="form_wrapper">
<form id="form2" class="form2" action="includes/members/personal-info.php" method="post" enctype="multipart/form-data">
                            <div class="panel panel-smart">
                                 <div class="panel-heading">
                                    <h3 class="panel-title">
								Mes informations
									</h3> 
								</div>
                                <div class="panel-body">
										<div class="form-group">
									<label for="inputLname" class="col-sm-2 control-label">Nom :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="inputLname" name="first_name" placeholder="Nom" value="<?php echo $member->getFirstName(); ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="inputFname" class="col-sm-2 control-label">Prenom :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="inputFname" name="last_name" placeholder="Prenom" value="<?php echo $member->getLastName(); ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="inputPhone" class="col-sm-2 control-label">Téléphone :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="inputPhone" name="number" placeholder="Téléphone" value="<?php echo $member->getNumber(); ?>">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-2" style="margin-top: 12px;">
										<button type="submit" class="btn btn-black">
											Sauvegarder
										</button>
									</div>
								</div>
															
								</div>
                            </div>
                        </form>                    

												
                    </div>
                </div>
          
    </section>
	</div>
	<p id="log"></p>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	