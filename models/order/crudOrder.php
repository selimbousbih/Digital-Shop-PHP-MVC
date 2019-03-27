<?PHP
require_once "/../../includes/db_connect.php";
require_once "order.php";

class crudOrder{
	function __construct(){	
	}	
	
	public static function insertOrder($uid, $id_bill, $method){
		$db=Db::getInstance();
		$stmt=$db->prepare('INSERT INTO orders (client_id, bill, method, status, date) VALUES (?, ?, ?, 0, NOW())');
		$stmt->bindValue(1, $uid);
		$stmt->bindValue(2, $id_bill);
		$stmt->bindValue(3, $method);
		$stmt->execute();
		
		$order = new order($uid);
		$id=$db->lastInsertId();
		$order->setId($id);
		$order->setMethod($method);
		return $order;
	}
	
}
?>