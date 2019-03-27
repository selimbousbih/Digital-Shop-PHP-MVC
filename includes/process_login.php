<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start(); // Démarrer la session PHP
 
if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; 
 
    if (login($email, $password, Db::getInstance()) == true) {
        header('Location: ../index.php');
    } else {
        header('Location: ../index.php?controller=members&action=login&error=1');
    }
} else {
    echo 'Invalid Request';
}

?>