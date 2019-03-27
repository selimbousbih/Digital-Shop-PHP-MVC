<?PHP
require_once ("/../../includes/db_connect.php");
require_once ("/../../models/products/crudProduct.php");
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
	
		
	public static function getBill($id){
		$db=Db::getInstance();
		$req="SELECT * FROM bill WHERE id = ? LIMIT 1";
		$stmt=$db->prepare($req);

		$stmt->bindValue(1, $id);
		
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $first_name);
		$stmt->bindColumn(3, $last_name);
		$stmt->bindColumn(4, $address);
		$stmt->bindColumn(5, $city);
		$stmt->bindColumn(6, $postal);	
		$stmt->bindColumn(7, $number);	
		$stmt->bindColumn(8, $total);	
		
		$stmt->execute();
		$stmt->fetch();
		
		$bill = new bill($first_name, $last_name, $address, $city, $postal, $number);
		return $bill;
	}
	
	public static function getProducts($id){
		$db=Db::getInstance();
		$req="SELECT * FROM ordered_products WHERE id_bill = ?";
		$stmt=$db->prepare($req);

		$stmt->bindValue(1, $id);
		
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $id_product);
		$stmt->bindColumn(3, $qt_product);	
		
		$stmt->execute();
		$P = array();
		while($stmt->fetch()){
			$product = crudProduct::selectProduct($id_product);
			$product->setCartQt($qt_product);
			$P[]=$product;
		}
		return $P;
	}

}
?>