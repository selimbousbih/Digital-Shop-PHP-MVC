<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
 
$error_msg = "";
 
if (isset($_POST['username'], $_POST['email'], $_POST['p'])) {
    // Nettoyez et validez les données transmises au script
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // L’adresse email n’est pas valide
        $error_msg .= '<p class="error">L’adress email que vous avez entrée n’est pas valide</p>';
    }
 
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // Le mot de passe hashé ne doit pas dépasser les 128 caractères
        // Si ce n’est aps le cas, quelque chose de vraiment bizarre s’est produit
        $error_msg .= '<p class="error">Mot de passe invalide.</p>';
    }
 
    // La forme du nom d’utilisateur et du mot de passe a été vérifiée côté client
    // Cela devrait suffire, car personne ne tire avantage
    // à briser ce genre de règles.
    //
 
    $prep_stmt = "SELECT id FROM admin WHERE email = ? LIMIT 1";
    $db=Db::getInstance();
	$stmt = $db->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bindParam(1, $email);
        $stmt->execute();
 
        if ($stmt->rowCount() == 1) {
            // Il y a déjà un utilisateur avec ce nom-là
            $error_msg .= '<p class="error">Il existe déjà un utilisateur avec le même nom.</p>';
        }
    } else {
        $error_msg .= '<p class="error">Erreur de base de données</p>';
    }
 
    // CE QUE VOUS DEVEZ FAIRE: 
    // Nous devons aussi penser à la situation où l’utilisateur n’a pas
    // le droit de s’enregistrer, en vérifiant quel type d’utilisateur essaye de
    // s’enregistrer.
 
    if (empty($error_msg)) {
        // Crée un salt au hasard
        $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
 
        // Crée le mot de passe en se servant du salt généré ci-dessus 
        $password = hash('sha512', $password . $random_salt);
 
        // Enregistre le nouvel utilisateur dans la base de données
        if ($insert_stmt = $db->prepare("INSERT INTO admin (username, email, password, salt) VALUES (?, ?, ?, ?)")) {
            $insert_stmt->bindParam(1, $username);
            $insert_stmt->bindParam(2, $email);
            $insert_stmt->bindParam(3, $password);
            $insert_stmt->bindParam(4, $random_salt);
            // Exécute la déclaration.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }
        }
        header('Location: ./register_success.php');
    }
}
?>