<?PHP
require_once ("/../../includes/db_connect.php");
require_once "bill.php";

class crudBill{
	function __construct(){
		
	}	
	
	public static function insertBill($bill){
		$db=Db::getInstance();
		$req="INSERT INTO bill (first_name, last_name, address, city, postal, number, total) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$stmt=$db->prepare($req);

		$stmt->bindValue(1, $bill->getFirstName());
		$stmt->bindValue(2, $bill->getLastName());
		$stmt->bindValue(3, $bill->getAddress());
		$stmt->bindValue(4, $bill->getCity());
		$stmt->bindValue(5, $bill->getPostal());
		$stmt->bindValue(6, $bill->getNumber());	
		$stmt->bindValue(7, $bill->getTotal());	
		
		$stmt->execute();
		
		$id_bill = $db->lastInsertId();
		if ($stmt->execute())
			return $id_bill;
	}

}
?>