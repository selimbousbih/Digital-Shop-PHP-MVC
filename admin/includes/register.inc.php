<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
 
$error_msg = "";
 
if (isset($_POST['username'], $_POST['email'], $_POST['p'])) {
    // Nettoyez et validez les donn�es transmises au script
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // L�adresse email n�est pas valide
        $error_msg .= '<p class="error">L�adress email que vous avez entr�e n�est pas valide</p>';
    }
 
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // Le mot de passe hash� ne doit pas d�passer les 128 caract�res
        // Si ce n�est aps le cas, quelque chose de vraiment bizarre s�est produit
        $error_msg .= '<p class="error">Mot de passe invalide.</p>';
    }
 
    // La forme du nom d�utilisateur et du mot de passe a �t� v�rifi�e c�t� client
    // Cela devrait suffire, car personne ne tire avantage
    // � briser ce genre de r�gles.
    //
 
    $prep_stmt = "SELECT id FROM admin WHERE email = ? LIMIT 1";
    $db=Db::getInstance();
	$stmt = $db->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bindParam(1, $email);
        $stmt->execute();
 
        if ($stmt->rowCount() == 1) {
            // Il y a d�j� un utilisateur avec ce nom-l�
            $error_msg .= '<p class="error">Il existe d�j� un utilisateur avec le m�me nom.</p>';
        }
    } else {
        $error_msg .= '<p class="error">Erreur de base de donn�es</p>';
    }
 
    // CE QUE VOUS DEVEZ FAIRE: 
    // Nous devons aussi penser � la situation o� l�utilisateur n�a pas
    // le droit de s�enregistrer, en v�rifiant quel type d�utilisateur essaye de
    // s�enregistrer.
 
    if (empty($error_msg)) {
        // Cr�e un salt au hasard
        $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
 
        // Cr�e le mot de passe en se servant du salt g�n�r� ci-dessus 
        $password = hash('sha512', $password . $random_salt);
 
        // Enregistre le nouvel utilisateur dans la base de donn�es
        if ($insert_stmt = $db->prepare("INSERT INTO admin (username, email, password, salt) VALUES (?, ?, ?, ?)")) {
            $insert_stmt->bindParam(1, $username);
            $insert_stmt->bindParam(2, $email);
            $insert_stmt->bindParam(3, $password);
            $insert_stmt->bindParam(4, $random_salt);
            // Ex�cute la d�claration.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }
        }
        header('Location: ./register_success.php');
    }
}
?>