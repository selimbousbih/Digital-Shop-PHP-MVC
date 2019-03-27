<?php  
require_once('/../header.php'); 
?>
    <!-- Breadcrumb Starts -->
    <div class="breadcrumb-wrap">
        <div class="container">
            <!-- Breadcrumb Starts -->
            <ol class="breadcrumb">
                <li><a href="?controller=pages&action=home">Accueil</a></li>
                <li class="active">Commande</li>
            </ol>
            <!-- Breadcrumb Ends -->
        </div>
    </div>
    <!-- Breadcrumb Ends -->
    <!-- Main Container Starts -->
    <div class="main-container container">
        <!-- Main Heading Starts -->
        <h2 class="main-heading text-center">
			Commander
		</h2>
        <!-- Main Heading Ends -->
        <?php 
		if (!isset($_SESSION['user_id']))
			die("Vous devez être connécté pour accéder à cette page.");
		else if (isset($_GET['done'])) 
			die("Nous vous remercions pour votre commande sur notre site, un mail vous a été envoyé avec les détailles de votre commande.");
		else if (empty($items)) 
			die("Vous n'avez aucune commande.");
	?>
            <!-- Shipping Section Starts -->
            <section class="registration-area">
                <div class="row">
                    <!-- Shipping & Shipment Block Starts -->
                    <div id="form_wrapper" class="form_wrapper">
                        <form class="facturation active" action="includes/order/submit.php" id="facturation" method="post" enctype="multipart/form-data">
                            <div class="panel panel-smart">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
								Informations de facturation
									</h3> 
								</div>
                                <div class="panel-body">
								<div class="form-group">
									<label class="col-sm-2 control-label">Nom :</label>
									<div class="col-sm-9">
										<input class="form-control" type="text" name="last_name" placeholder="Nom">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Prenom :</label>
									<div class="col-sm-9">
										<input class="form-control" type="text" name="first_name" placeholder="Prenom">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Adresse :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="address" id="inputAddress1" placeholder="Adresse">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Ville :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="city" id="inputCity" placeholder="Ville">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Code Postal :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="postal" id="inputPostCode" placeholder="Code Postal">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Téléphone :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="number" id="inputPostCode" placeholder="Téléphone">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-2" style="margin-top: 12px;">
										<button class="btn btn-black linkform" rel="form2" >
											Suivant
										</button>
									</div>
								</div>
								</div>
                            </div>
                        </form>
						
                        <form id="form2" class="form2" action="admin/includes/addresses-inc/add.php" method="post" enctype="multipart/form-data">
                            <div class="panel panel-smart">
                                 <div class="panel-heading">
                                    <h3 class="panel-title">
								Méthode de payement
									</h3> 
								</div>
                                <div class="panel-body">
									<fieldset>
									<div class="form-group">
										<label for="methode1">
											<input type="radio" name="methode" value="method1" id="methode1" checked/>
											Virement Banquaire
										</label>
										<div id="method1" >
										<ul><li>
											Voici nos coordonnées.<br>
											Titulaire du compte :	Garby's Matos<br>
											Banque :	UBCI<br>
											Domiciliation :	Rue Mohamed Rjiba Bizerte<br>
											Numéro de compte :	11*********02100278839<br>

											Dès que nous avons la confirmation que la somme due a bien été versée sur le compte, et qu'elle correspond exactement à votre commande, nous activons votre service.<br>

											Attention, n'oubliez pas d'indiquer votre numéro de bon de commande dans le champ "Communication" de l'opération bancaire.<br>
										</li></ul>
										</div>
									</div>
									
									<div class="form-group">
										<label for="methode2">
												<input type="radio" name="methode" value="method2" id="methode2"/>
												Versement espèce (La Poste)
										</label>
										<div id="method2" style="display:none;">
										<ul><li>
											Contactez la Poste la plus proche de chez vous et payez plus simplement votre commande.<br>
											Voici nos coordonnées postales. <br>
											Numéro de compte ( CCP) :	L27352 53<br> 
											Titulaire du compte :	Garby's Matos<br> 
											Dès que nous avons la confirmation que la somme due a bien été versée sur le compte, 
											et qu'elle correspond exactement à votre commande, nous activons votre service. <br>
											Attention!: n'oubliez pas d'indiquer votre numéro de bon de commande dans le champ "Communication" de l'opération bancaire. 
											</li></ul>
										</div>
									</div>
									
									<div class="form-group">
										<label for="methode3">
												<input type="radio" name="methode" value="method3" id="methode3"/>
												Chèque Bancaire
										</label>
										<div id="method3" style="display:none;">
										<ul><li>
											Libeller le chèque à l'ordre de : Garby's Matos<br>
											Envoyer le chèque à: <br>
											Garby's Matos,<br>
											Rue Mohamed Rjiba 7000 Bizerte
										</li></ul>
										</div>
									</div>
										</fieldset>
										<div class="form-group">
												<a href="#" class="btn btn-black linkform" rel="facturation">
													Revenir
												</a>
												
												<button class="btn btn-black" type="button" onClick="finalize()">
													Envoyer
												</button>
										</div>									
								</div>
                            </div>
                        </form>
						
                    </div>
                </div>
                <!-- Discount & Conditions Blocks Ends -->
    </div>
    </section>
	<p id="log"></p>
    <!-- Shipping Section Ends -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	
	<script type="text/javascript">
		$( "input" ).on( "click", function() {
		  var a = $( "input[name=methode]:checked" ).val();
		  hide();
		  document.getElementById(a).style.display = 'block';
		});
		function hide() {
			tab = document.getElementsByName("methode");
			for (i=1; i<=tab.length;i++){
				id = 'method'+i;
				document.getElementById(id).style.display = 'none'; 
			}
		}
	</script>
	
	<script type="text/javascript">
		function finalize(){
			form = document.getElementById("facturation");	
			v = $('input[name="methode"]:checked').val();
			var m = document.createElement("input");
		 
			form.appendChild(m);
			m.name = "m";
			m.type = "hidden";
			m.value = v;
			
			form.submit();
		}
	</script>

	  
    <script type="text/javascript">
        $(function () {
            //the form wrapper (includes all forms)
            var $form_wrapper = $('#form_wrapper')
                , //the current form is the one with class active
                $currentForm = $form_wrapper.children('form.active')
                , //the change form links
                $linkform = $form_wrapper.find('.linkform');
            //get width and height of each form and store them for later						
            $form_wrapper.children('form').each(function (i) {
                var $theForm = $(this);
                //solve the inline display none problem when using fadeIn fadeOut
                if (!$theForm.hasClass('active')) $theForm.hide();
                $theForm.data({
                    width: $theForm.width()
                    , height: $theForm.height()
                });
            });
            //set width and height of wrapper (same of current form)
            setWrapperWidth();
            /*
            clicking a link (change form event) in the form
            makes the current form hide.
            The wrapper animates its width and height to the 
            width and height of the new current form.
            After the animation, the new form is shown
            */
            $linkform.bind('click', function (e) {
				//Check Form complete
				form = document.getElementById("facturation");
				if (form.elements.item(0).value == ''         || 
				form.elements.item(1).value == ''     || 
				form.elements.item(2).value == '') {
					
				alert('Vous devez fournir tous les détails nécessaires. Veuillez essayer de nouveau');
				return false;
			}
			
                var $link = $(this);
                var target = $link.attr('rel');
                $currentForm.fadeOut(400, function () {
                    //remove class active from current form
                    $currentForm.removeClass('active');
                    //new current form
                    $currentForm = $form_wrapper.children('form.' + target);
                    //animate the wrapper
                    $form_wrapper.stop().animate({
                        width: $currentForm.data('width') + 'px'
                        , height: $currentForm.data('height') + 'px'
                    }, 600, function () {
                        //new form gets class active
                        $currentForm.addClass('active');
                        //show the new form
                        $currentForm.fadeIn(400);
                    });
                });
                e.preventDefault();
            });

            function setWrapperWidth() {
                $form_wrapper.css({
                    width: $currentForm.data('width') + 'px'
                    , height: $currentForm.data('height') + 'px'
                });
            }
            /*
            for the demo we disabled the submit buttons
            if you submit the form, you need to check the 
            which form was submited, and give the class active 
            to the form you want to show
            */
            $form_wrapper.find('input[type="submit"]').click(function (e) {
                e.preventDefault();
            });
        });
    </script>