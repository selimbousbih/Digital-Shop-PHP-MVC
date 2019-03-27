<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check(Db::getInstance()) == true) {
    header('Location: dashboard.php');
	$logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
	
<meta charset="UTF-8">

        <title>Connexion sécurisée, page de connexion</title>
        <link rel="stylesheet" href="assets/css/login_page.css" />
        <script type="text/JavaScript" src="assets/js/sha512.js"></script> 
        <script type="text/JavaScript" src="assets/js/forms.js"></script> 
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Une erreur s\'est produite lors de votre connexion!</p>';
        }
        ?> 
		<div class="login">
		<h1> Admin Login </h1>
        <form action="includes/process_login.php" method="post" name="login_form">                      
            <span class="titre">Email: </span><input type="text" name="email" placeholder="Email" />
            <span class="titre">Password:  </span><input type="password" 
							 placeholder="Password"
                             name="password" 
                             id="password"/>
            <input type="button"
				   class = "btn btn-primary btn-block btn-large"
                   value="Connexion" 
                   onclick="formhash(this.form, this.form.password);" /> 
        </form>
	
		</div>
       
    </body>
</html>