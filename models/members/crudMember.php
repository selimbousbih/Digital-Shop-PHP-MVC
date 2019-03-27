<?PHP
require_once ("/../../includes/db_connect.php");
require_once "member.php";

class crudMember{
	function __construct(){
	}	
	
	public static function All(){
		$db=Db::getInstance();
		$req="SELECT * FROM members";
		$stmt=$db->prepare($req);
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $username);
		$stmt->bindColumn(3, $email);
		$stmt->bindColumn(8, $info);
		$stmt->execute();
		
		$members=array();
		while($stmt->fetch()){
			$M = new member($id, $username, $email);
			$M->setInfoId($info);
			$members[] = $M;
		}
		return $members; 
	}
	
	public static function getMemberEmail($uid){
		$db=Db::getInstance();
		$req="SELECT email FROM members WHERE id = ? LIMIT 1";
		$stmt=$db->prepare($req);
		$stmt->bindValue(1, $uid);
		$stmt->bindColumn(1, $email);
		$stmt->execute();
		
		$stmt->fetch();
		
		return $email; 
	}
	
	public static function selectMember($id){
		$db=Db::getInstance();
		$req="SELECT * FROM members WHERE id=?";
		$stmt=$db->prepare($req);
		$stmt->bindValue(1, $id);
		$stmt->execute();
		
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $username);
		$stmt->bindColumn(3, $email);
		$stmt->bindColumn(8, $info);
		$stmt->bindColumn(9, $first_name);
		$stmt->bindColumn(10, $last_name);
		$stmt->bindColumn(11, $number);
		
		$stmt->fetch();
		$M = new member($id, $username, $email);
		$M->setFirstName($first_name);
		$M->setLastName($last_name);
		$M->setNumber($number);
		$M->setInfoId($info);
		return $M;	
	}
	
	
	public static function updatePersonalInfo($id, $first_name, $last_name, $number){
		$db=Db::getInstance();
		$req="UPDATE members SET first_name = ?, last_name = ?, number = ? WHERE id=?";
		$stmt=$db->prepare($req);
		$stmt->bindValue(1, $first_name);
		$stmt->bindValue(2, $last_name);
		$stmt->bindValue(3, $number);
		$stmt->bindValue(4, $id);
		
		return $stmt->execute();
	}
}
?>