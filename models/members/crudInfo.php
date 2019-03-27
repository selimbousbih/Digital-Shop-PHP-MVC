<?PHP
require_once ("/../../includes/db_connect.php");
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
	
	public static function insertInfo($uid, $info){
		$db=Db::getInstance();
		$req = "SELECT info from members WHERE id = ? LIMIT 1";
		$stmt=$db->prepare($req);
		$stmt->bindValue(1, $uid);
		$stmt->bindColumn(1, $info_id);
		$stmt->execute();
		$stmt->fetch();
		if ($info_id!=null){
			$req = "UPDATE client_info SET first_name = ?, last_name = ?, address = ?, city = ?, postal = ?, number = ? WHERE id = ?";
			$stmt=$db->prepare($req);

			$stmt->bindValue(1, $info->getFirstName());
			$stmt->bindValue(2, $info->getLastName());
			$stmt->bindValue(3, $info->getAddress());
			$stmt->bindValue(4, $info->getCity());
			$stmt->bindValue(5, $info->getPostal());
			$stmt->bindValue(6, $info->getNumber());
			$stmt->bindValue(7, $info_id);
			return $stmt->execute();
		}
		
		else{
			$req="INSERT INTO client_info (first_name, last_name, address, city, postal, number) VALUES (?, ?, ?, ?, ?, ?)";
			$stmt=$db->prepare($req);

			$stmt->bindValue(1, $info->getFirstName());
			$stmt->bindValue(2, $info->getLastName());
			$stmt->bindValue(3, $info->getAddress());
			$stmt->bindValue(4, $info->getCity());
			$stmt->bindValue(5, $info->getPostal());
			$stmt->bindValue(6, $info->getNumber());	
			
			$stmt->execute();
			
			$req = "UPDATE members SET info = ? WHERE id = ?";
			$stmt=$db->prepare($req);
			$id_info = $db->lastInsertId();
			$stmt->bindValue(1, $id_info);
			$stmt->bindValue(2, $uid);
			return $stmt->execute();
			
		}
	}
	
	public static function selectInfo($id){
		$db=Db::getInstance();
		$req="SELECT c.first_name, c.last_name, address, city, postal, c.number FROM client_info c inner join members m on c.id = m.info WHERE m.id = ?";
		$stmt=$db->prepare($req);
		$stmt->bindValue(1, $id);
		$stmt->execute();
		
		$stmt->bindColumn(1, $first_name);
		$stmt->bindColumn(2, $last_name);
		$stmt->bindColumn(3, $address);
		$stmt->bindColumn(4, $city);
		$stmt->bindColumn(5, $postal);
		$stmt->bindColumn(6, $number);
		
		$stmt->fetch();
		$C = new clientInfo($first_name, $last_name, $address, $city, $postal, $number);
		return $C;	
	}
}
?>