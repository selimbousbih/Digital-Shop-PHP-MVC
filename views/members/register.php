<link rel="stylesheet" type="text/css" href="assets/css/members_login.css" />
    <div class="wrapper">
        <div class="content">
            <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
            <div class="wrapper">
                <div class="content">
                    <div id="form_wrapper" class="form_wrapper">
					
						
						<!-- REGISTER FORM STARTS -->
                        <form class="register active" method="post" action="includes/register.php">
                            <h1>Créer un compte</h1>
                            <p>Pour créer un compte veuillez remplir ces champs avec des informations basiques. Veuillez utiliser des informations corréctes.</p>
                            <input type="text" name="username" placeholder="Name">
                            <div>
                                <p class="name-help">Votre nom et prénom</p>
                            </div>
                            <input type="email" name="email" placeholder="Email">
                            <div>
                                <p class="email-help">Votre adresse mail</p>
                            </div>
                            <input type="password" name="password" placeholder="Password">
                            <div>
                                <p class="password-help">Votre mot de passe.</p>
                            </div>
                            <input type="password" name="passwordc" placeholder="Confirm Password">
                            <div>
                                <p class="passwordc-help">Confirmer le mot de passe.</p>
                            </div>
                            <input type="text" name="address" placeholder="Address">
                            <div>
                                <p class="address-help">Votre adresse.</p>
                            </div>
                            <input type="submit" class="submit" value="Confirm" onClick="regformhash(this.form,
																										this.form.username,
																										this.form.email,
																										this.form.password,
																										this.form.passwordc);">
                            <p class="forgotten">Vous avez un compte ?<a href="index.html" rel="login" class="linkform">Se connécter</a></p>
                        </form>
						<!-- REGISTER FORM STARTS -->
						
						<!-- LOGIN FORM STARTS -->
						<form class="login" method="post" action="includes/process_login.php">
                            <h1>SE CONNECTER</h1>
                            <p>Accédez à vos commandes, Wishlists and Recommendations.</p>
                            <input type="email" name="email" placeholder="Email">
                            <div>
                                <p class="email-help">Entrer votre adress mail.</p>
                            </div>
                            <input type="password" name="password" placeholder="Password">
                            <div>
                                <p class="password-help">Entrer votre mot de passe.</p>
                            </div>
                            <input type="submit" class="submit" value="Login" onClick="formhash(this.form,																										
																										this.form.password);">
                            <p class="forgotten"><a href="forgot_password.html" rel="forgot_password" class="forgot linkform">Mot de passe oublié?</a></label>
                            </p>
                            <p class="message">Vous n'avez pas de compte? <a href="register.html" rel="register" class="linkform">Créer un compte</a></p>
                        </form>
						<!-- LOGIN FORM ENDS -->
						
						<!-- FORGOT PASSWORD STARTS -->
                        <form class="forgot_password" method="post" action="yourpage.html">
                            <h1>RETRIEVE PASSWORD</h1>
                            <p>Enter your Email and you will receive an email with instructions on how to reset your password in a few minutes</p>
                            <input type="email" class="email" placeholder="Email">
                            <div>
                                <p class="email-help">Please enter your current email address.</p>
                            </div>
                            <input type="submit" class="submit" value="Confirm">
                            <p class="forgotten">Suddenly remebered? <a href="index.html" rel="login" class="linkform">Log in here</a></p>
                            <p class="message">Not registered? <a href="register.html" rel="register" class="linkform">Create an account</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<?php 
for ($x = 0; $x <= 30; $x++) {
    echo "<br>";
} 
?>
		
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="assets/js/index.js"></script>
        <script type="text/JavaScript" src="assets/js/sha512.js"></script> 
        <script src="assets/js/forms.js"></script>
        <!-- The JavaScript -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
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
