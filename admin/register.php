<?php
require_once 'includes/register.inc.php';
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Connexion scurise, formulaire denregistrement</title>
        <script type="text/JavaScript" src="assets/js/sha512.js"></script> 
        <script type="text/JavaScript" src="assets/js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
	
        <h1>Enregistrez-vous</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <ul>
            <li>Le nom dutilisateur ne peut contenir que des nombres, des lettres en minuscule et majuscule et des underscores</li>
            <li>Les emails doivent avoir un format valide</li>
            <li>Le mot de passe doit avoir au moins 6 caractres</li>
            <li>Le mot de passe doit contenir
                <ul>
                    <li>Au moins une lettre majuscule (A..Z)</li>
                    <li>Au moins une lettre minuscule (a..z)</li>
                    <li>Au moins un chiffre (0..9)</li>
                </ul>
            </li>
            <li>Les deux mots de passe entrs doivent être éxactement les mêmes</li>
        </ul>
        <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
                method="post" 
                name="registration_form">
            Username: <input type='text' 
                name='username' 
                id='username' /><br>
            Adresse email: <input type="text" name="email" id="email" /><br>
            Mot de passe: <input type="password"
                             name="password" 
                             id="password"/><br>
            Confirmez le mot de passe: <input type="password" 
                                     name="confirmpwd" 
                                     id="confirmpwd" /><br>
            <input type="button" 
                   value="Senregistrer" 
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
        </form>
        <p>Retournez la page d<a href="index.php">inscription</a>.</p>
    </body>
</html>