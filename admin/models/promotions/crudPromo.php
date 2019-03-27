<?PHP
require_once "/../../config.php";
require_once ROOT_DIR."/includes/db_connect.php";
require_once "classPromo.php";

class crudPromo{
	function __construct(){
	}

    public static function All(){
		$db=Db::getInstance();
		$stmt=$db->prepare('SELECT * FROM promotions');
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $attachment);
		$stmt->bindColumn(3, $description);
		$stmt->bindColumn(6, $perc);
		$stmt->execute();
		$promotions = array();

		while($stmt->fetch()){
			$promo = new Promotion($id, $description, $perc);
			$promotions[] = $promo;
		}
		return $promotions;	
	}
	
	public static function selectPromo($id){
		$db=Db::getInstance();
		$stmt=$db->prepare('SELECT * FROM promotions WHERE id = ? LIMIT 1');
		$stmt->bindValue(1, $id);
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $attachment);
		$stmt->bindColumn(3, $description);
		$stmt->bindColumn(4, $sdate);
		$stmt->bindColumn(5, $edate);
		$stmt->bindColumn(6, $perc);
		
		$stmt->execute();
		
		$stmt->fetch();
		$promo = new Promotion($id, $description, $perc);
		
		return $promo;	
	}
	
	public static function addPromo($promo){
		$db=Db::getInstance();
		$stmt=$db->prepare('INSERT INTO promotions (description,percent) VALUES (?, ?)');
		$stmt->bindValue(1, $promo->getDescription());
		$stmt->bindValue(2, $promo->getPercent());
		$stmt->execute();
		
	}
  
  	public static function updatePromo($id, $attachment, $description, $perc){
		$db=Db::getInstance();
		$stmt=$db->prepare("Update promotions SET description = ?, percent = ? WHERE id=?");
		$stmt->bindValue(1, $description);  
		$stmt->bindValue(2, $perc); 
		$stmt->bindValue(3, $id); 
		if($stmt->execute()){
			return true;
		}	
		else{
			return false;
		}
	}
  
  	public static function deletePromo($id){
		$db=Db::getInstance();
		$stmt=$db->prepare("DELETE FROM promotions WHERE id=?");
		$stmt->bindValue(1, $id);		
		$stmt->execute();
	}
}
?>