<?PHP
require_once ("/../../includes/db_connect.php");
require_once "/../../models/product.php";

class crudBillProducts{
	function __construct(){
		
	}	
	
	public static function insert($id_bill, $items){
		$db=Db::getInstance();
		foreach($items as $item){
			$req="INSERT INTO ordered_products (id_product, qt_product, id_bill) VALUES (?, ?, ?)";
			$stmt=$db->prepare($req);

			$stmt->bindValue(1, $item->getId());
			$stmt->bindValue(2, $item->getCartQt());
			$stmt->bindValue(3, $id_bill);
			
			$stmt->execute();
		}
	}

}
?>