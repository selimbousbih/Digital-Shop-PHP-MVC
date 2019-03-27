<?php
include_once 'db_connect.php';
require_once '../includes/mailer.php';
 
$error_msg = "";
 
if (isset($_POST['username'], $_POST['email'], $_POST['p'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_msg .= '<p class="error">L\'adress email que vous avez entrée n\'est pas valide</p>';
    }
 
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);

    if (strlen($password) != 128) {
        $error_msg .= '<p class="error">Mot de passe invalide.</p>';
    }
 
    $prep_stmt = "SELECT id FROM members WHERE email = ? LIMIT 1";
    $db=Db::getInstance();
	$stmt = $db->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bindParam(1, $email);
        $stmt->execute();
 
        if ($stmt->rowCount() == 1) {
            $error_msg .= '<p class="error">Il existe déjà un utilisateur avec le même nom.</p>';
        }
    } else {
        $error_msg .= '<p class="error">Erreur de base de données</p>';
    }
 	
	echo $error_msg . "<br>";
	echo "<a href='../index.php?controller=members&action=login'>Retour</a>";
    if (empty($error_msg)) {
       // Crée un salt au hasard
        $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
        $activation_salt = hash('sha256', uniqid(openssl_random_pseudo_bytes(16), TRUE));
 
        // Crée le mot de passe en se servant du salt ci-dessus 
        $password = hash('sha512', $password . $random_salt);
 
        // Enregistre le nouvel utilisateur dans la base de données
        if ($insert_stmt = $db->prepare("INSERT INTO members (username, email, password, salt, activation_salt) VALUES (?, ?, ?, ?, ?)")) {
            $insert_stmt->bindParam(1, $username);
            $insert_stmt->bindParam(2, $email);
            $insert_stmt->bindParam(3, $password);
            $insert_stmt->bindParam(4, $random_salt);
            $insert_stmt->bindParam(5, $activation_salt);
            // Exécute la déclaration.
            if (!$insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }
        }
		
		//send verification email
		$verification_link = $_SERVER['SERVER_NAME'] . '/?controller=members&action=activate&username='.$username.'&code='.$activation_salt; 
		$mail = Mailer::getInstance();

		$mail->setFrom('from@example.com', 'Garbys Matos');
		$mail->addAddress($email);               // Name is optional
		$mail->addReplyTo('info@example.com', 'Information');
		
		$mail->isHTML(true);            


		$mail->Subject = 'Activation du compte GarbysMatos';
		$mail->Body    = 'Bonjour,<br><br> Veuillez cliquer sur ce lien pour activer votre compte.<br>' . $verification_link .
							'<br><br>Bienvenue parmis nous.';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
		
        header('Location: /?controller=members&action=reg_success');
    }
	
	

}
?>