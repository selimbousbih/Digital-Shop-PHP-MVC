<?PHP
require_once("/../../config.php");
require_once (ROOT_DIR."/includes/db_connect.php");
require_once "info.php";

class crudClientInfo{
	function __construct(){
		
	}	
	
	public static function All(){
		$db=Db::getInstance();
		$req="SELECT * FROM client_info";
		$stmt=$db->prepare($req);
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $first_name);
		$stmt->bindColumn(3, $last_name);
		$stmt->bindColumn(4, $address);
		$stmt->bindColumn(5, $city);
		$stmt->bindColumn(6, $postal);
		$stmt->bindColumn(7, $number);
		$stmt->execute();
		
		$clientInfos=array();
		while($stmt->fetch()){
			$C = new clientInfo($id, $first_name, $last_name, $address, $city, $postal, $number);
			$clientInfos[] = $C;
		}
		return $clientInfos; 
	}
	
	public static function selectInfo($id){
		$db=Db::getInstance();
		$req="SELECT * FROM client_info WHERE id=?";
		$stmt=$db->prepare($req);
		$stmt->bindValue(1, $id);
		$stmt->execute();
		
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $first_name);
		$stmt->bindColumn(3, $last_name);
		$stmt->bindColumn(4, $address);
		$stmt->bindColumn(5, $city);
		$stmt->bindColumn(6, $postal);
		$stmt->bindColumn(7, $number);
		
		$stmt->fetch();
		$C = new clientInfo($id, $first_name, $last_name, $address, $city, $postal, $number);
		return $C;	
	}
}
?>