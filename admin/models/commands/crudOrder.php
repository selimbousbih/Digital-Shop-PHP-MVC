<?PHP
require_once "/../../includes/db_connect.php";
require_once "order.php";

class crudOrder{
	function __construct(){	
	}	
	
	public static function All(){
		$db=Db::getInstance();
		$stmt=$db->prepare('SELECT * FROM orders ORDER BY id desc');
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $client_id);
		$stmt->bindColumn(3, $bill);
		$stmt->bindColumn(4, $method);
		$stmt->bindColumn(5, $status);
		$stmt->bindColumn(6, $date);
		$stmt->execute();
		
		$O = array();
		while($stmt->fetch()){
			$order = new order($id, $client_id, $bill, $status, $date);
			$order->setMethod($method);
			$O[]=$order;
		}
		return $O;
	}	
	public static function updateStatus($id, $status){
		$db=Db::getInstance();
		$stmt=$db->prepare('UPDATE orders SET status = ? WHERE id = ?');
		$stmt->bindValue(1, $status);
		$stmt->bindValue(2, $id);
	
		$stmt->execute();
		}
	
	
}
?>