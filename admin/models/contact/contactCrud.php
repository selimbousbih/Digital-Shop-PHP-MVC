<?PHP
require_once ("/../../includes/db_connect.php");
require_once "contact.php";

class crudContact{
	function __construct(){
		
	}	
	
	public static function All(){
		$db=Db::getInstance();
		$stmt=$db->prepare('SELECT name, email, subject, message, id FROM contacts order by id desc');
		$stmt->bindColumn(1, $name);
		$stmt->bindColumn(2, $email);
		$stmt->bindColumn(3, $subject);
		$stmt->bindColumn(4, $message);
		$stmt->bindColumn(5, $id);
		
		$stmt->execute();
		$C = array();
		while($stmt->fetch()){
			$contact = new contact($name, $email, $subject, $message);
			$contact->setId($id);
			$C[] = $contact;
		}
		return $C;
		
	}
	
	public static function getContact($id){
		$db=Db::getInstance();
		$stmt=$db->prepare('SELECT name, email, subject, message FROM contacts WHERE id = ? LIMIT 1');
		$stmt->bindValue(1, $id);
		$stmt->bindColumn(1, $name);
		$stmt->bindColumn(2, $email);
		$stmt->bindColumn(3, $subject);
		$stmt->bindColumn(4, $message);
		
		$stmt->execute();
		$stmt->fetch();
		$contact = new contact($name, $email, $subject, $message);
		return $contact;
		
	}
	
}
?>