<?PHP
require_once "/../../../includes/db_connect.php";
require_once "contact.php";

class crudContact{
	function __construct(){
		
	}	
	
	public static function Add($contact){
		$db=Db::getInstance();
		$stmt=$db->prepare('INSERT INTO contacts (name, email, subject, message) values (?, ?, ?, ?)');
		$stmt->bindValue(1, $contact->getName());
		$stmt->bindValue(2, $contact->getEmail());
		$stmt->bindValue(3, $contact->getSubject());
		$stmt->bindValue(4, $contact->getMessage());
		
		return ($stmt->execute());
		
	}
	
}
?>