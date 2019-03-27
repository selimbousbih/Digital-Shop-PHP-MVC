<?php 
require_once('../includes/mailer.php');
require_once('../includes/db_connect.php');

if (isset($_GET['username'], $_GET['code'])){
	$username = $_GET['username'];
	$activation_salt = $_GET['code'];
}

$db = Db::getInstance();
$stmt = $db->prepare('SELECT activation_salt FROM members WHERE username = ? LIMIT 1');
$stmt->bindParam(1, $username);
$stmt->bindColumn(1, $result);
$stmt->execute();
if ($stmt->rowCount() == 1){
	$stmt->fetch();
	if ($result == $activation_salt){
		$stmt = $db->prepare('UPDATE members SET activated = 1 WHERE username = ?');
		$stmt->bindParam(1, $username);
		$stmt->execute();
	}
}




?>