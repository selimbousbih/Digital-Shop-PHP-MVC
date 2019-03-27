<?php
  require_once('includes/functions.php');
  require_once('includes/db_connect.php');

  error_reporting(0);
  sec_session_start();

  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'pages';
    $action     = 'home';
  }

  require_once('views/layout.php');
?>