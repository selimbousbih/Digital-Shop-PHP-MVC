<?php
require_once('/../includes/db_connect.php');
  class MemebersController {
    public function login() {
		require_once('views/members/login.php');
    }
	public function register() {
		require_once('views/members/register.php');
    }
	public function reg_success() {
		require_once('views/members/register_success.php');
    }
	public function info() {
		require_once('models/members/crudInfo.php');
		require_once('models/members/crudMember.php');
		if (isset($_SESSION['user_id'])){
			$username = $_SESSION['user_id'];
			$billingInfo = crudClientInfo::selectInfo($username);
			$member = crudMember::selectMember($username);
		} 
		require_once('views/members/personal_info.php');
    }
	public function activate() {
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
		header('Location: index.php');
	

    }
	public function logout() {
		include_once 'includes/functions.php';
		//sec_session_start();
		 
		// Détruisez les variables de session 
		$_SESSION = array();
		 
		// Retournez les paramètres de session 
		$params = session_get_cookie_params();
		 
		// Effacez le cookie. 
		setcookie(session_name(),
				'', time() - 42000, 
				$params["path"], 
				$params["domain"], 
				$params["secure"], 
				$params["httponly"]);
		 
		// Détruisez la session 
		session_destroy();
		header('Location: index.php');
		exit;
    }
	

  }
?>