<?php
include_once 'functions.php';
sec_session_start();
 
// D�truisez les variables de session 
$_SESSION = array();
 
// Retournez les param�tres de session 
$params = session_get_cookie_params();
 
// Effacez le cookie. 
setcookie(session_name(),
        '', time() - 42000, 
        $params["path"], 
        $params["domain"], 
        $params["secure"], 
        $params["httponly"]);
 
// D�truisez la session 
session_destroy();
header('Location: ../login.php');
exit;
?>