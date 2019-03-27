<?PHP
require_once "/../../includes/db_connect.php";
require_once "photo.php";

class crudPhoto{
	function __construct(){	
	}	
	
	public static function All(){
		$db=Db::getInstance();
		$stmt=$db->prepare('SELECT * FROM photos ORDER BY id desc');
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $filename);
		$stmt->execute();
		
		$P = array();
		while($stmt->fetch()){
			$photo = new photo($filename);
			$photo->setId($id);
			$P[]=$photo;
		}
		return $P;
	}	
	public static function select($id){
		$db=Db::getInstance();
		$stmt=$db->prepare('SELECT filename FROM photos WHERE id = ? LIMIT 1');
		$stmt->bindValue(1, $id);
		$stmt->bindColumn(1, $filename);
		$stmt->execute();
		
		$stmt->fetch();
			
		return $filename;
	}	
	public static function insert($photo){
		$db=Db::getInstance();
		$stmt=$db->prepare('INSERT INTO photos (filename) VALUES (?)');
		echo $photo->getFilename();
		$stmt->bindValue(1, $photo->getFilename());
	
		$stmt->execute();
	}
	public static function remove($id){
		$db=Db::getInstance();
		$stmt=$db->prepare('DELETE FROM photos WHERE id = ?');
		$stmt->bindValue(1, $id);
	
		$stmt->execute();
	}
	
	
}
?>