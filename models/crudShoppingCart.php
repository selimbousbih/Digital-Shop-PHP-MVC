<?PHP
require_once "/../includes/db_connect.php";
require_once "shoppingCart.php";
require_once "crudProduct.php";
class crudShoppingCart {
	public function __construct(){
		$this->total=0;
	}

	public static function getMemberItems($id){
		$db=Db::getInstance();
		$req="SELECT product_id, product_qt FROM shopping_cart WHERE member_id=?";
		$stmt=$db->prepare($req);
		$stmt->bindParam(1, $id);
		$stmt->execute();
		
		$stmt->bindColumn(1, $product_id);
		$stmt->bindColumn(2, $product_qt);
		
		$A = array();
		while($stmt->fetch()){
			$P = crudProduct::selectProduct($product_id);
			$P->setCartQt($product_qt);
			$A[] = $P;
		}
		return $A;	
	}
	
	public static function getItemQt($mid, $pid){
		$db=Db::getInstance();
		$req="SELECT product_qt FROM shopping_cart WHERE member_id=? and product_id=? LIMIT 1";
		$stmt=$db->prepare($req);
		$stmt->bindParam(1, $mid);
		$stmt->bindParam(2, $pid);
		$stmt->execute();
		if ($stmt->rowCount() == 0){
			return 0;
		}
		$stmt->bindColumn(1, $product_qt);
		$stmt->fetch();
		
		return $product_qt;	
	}	
	public static function getItemsCount($uid){
		$db=Db::getInstance();
		$req="SELECT count(*) FROM shopping_cart WHERE member_id=? LIMIT 1";
		$stmt=$db->prepare($req);
		$stmt->bindParam(1, $uid);
		$stmt->execute();
		if ($stmt->rowCount() == 0){
			return 0;
		}
		$stmt->bindColumn(1, $itemsCount);
		$stmt->fetch();
		
		return $itemsCount;	
	}	
	public static function addItem($member_id, $product_id, $qt=1){
		$db=Db::getInstance();
		$res = crudShoppingCart::getItemQt($member_id, $product_id);
		
		$qt = $res + $qt;
		if($res>0){
			$stmt=$db->prepare('UPDATE shopping_cart SET product_qt = ? WHERE member_id = ? and product_id = ?');
			$stmt->bindParam(1, $qt);
			$stmt->bindParam(2, $member_id);
			$stmt->bindParam(3, $product_id);
			$stmt->execute();
		}
		else{
			$stmt=$db->prepare('INSERT INTO shopping_cart (member_id, product_id, product_qt) VALUES (?, ?, ?)');
			$stmt->bindParam(1, $member_id);
			$stmt->bindParam(2, $product_id);
			$stmt->bindParam(3, $qt);
			$stmt->execute();
		}
	}	
	public static function removeItem($member_id, $product_id){
		$db=Db::getInstance();
		$res = crudShoppingCart::getItemQt($member_id, $product_id);
		
		if($res>0){
			$stmt=$db->prepare('DELETE FROM shopping_cart WHERE member_id = ? and product_id = ?');
			$stmt->bindParam(1, $member_id);
			$stmt->bindParam(2, $product_id);
			$stmt->execute();
		}
	}
	
	public static function emptyCart($uid){
		$db=Db::getInstance();
		$stmt=$db->prepare('DELETE FROM shopping_cart WHERE member_id = ?');
		$stmt->bindValue(1, $uid);
		$stmt->execute();
	
	}

	
	public static function updateQt($uid, $pid, $quantity){
		$db=Db::getInstance();
		
		$req="UPDATE shopping_cart SET product_qt = ? WHERE member_id=? and product_id=?";
		$stmt=$db->prepare($req);
		$stmt->bindValue(1, $quantity);
		$stmt->bindValue(2, $uid);
		$stmt->bindValue(3, $pid);
		return $stmt->execute();	
	}		
	
}

	

?>