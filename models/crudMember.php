<?PHP
require_once("/../../config.php");
require_once (ROOT_DIR."/includes/db_connect.php");
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
	
	public static function selectMember($id){
		$db=Db::getInstance();
		$req="SELECT * FROM clients WHERE id=?";
		$stmt=$db->prepare($req);
		$stmt->bindValue(1, $id);
		$stmt->execute();
		
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $username);
		$stmt->bindColumn(3, $email);
		$stmt->bindColumn(8, $info);
		
		$stmt->fetch();
		$M = new member($id, $username, $email);
		$M->setInfoId($info);
		return $M;	
	}
}
?>