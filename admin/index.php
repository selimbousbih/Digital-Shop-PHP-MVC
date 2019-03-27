<?php

require_once("config.php");
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();

  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'products';
    $action     = 'show';
  }

  require_once('views/layout.php');
?>