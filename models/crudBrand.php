<?PHP
require_once "includes/db_connect.php";
require_once "brand.php";

class crudBrand{
	function __construct(){
		
	}	
	
	public static function selectBrands(){
		$db=Db::getInstance();
		$stmt=$db->prepare('SELECT * FROM brands');
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $name);
		$stmt->execute();
		
		$brands = array();
		while($stmt->fetch()){
			$brand = new brand($name);
			$brand->setId($id);
			$brands[] = $brand;
		}
		return $brands;
	}
	
	
	public static function selectBrand($product){
		$db=Db::getInstance();
		$stmt=$db->prepare('SELECT * FROM brands where name = (SELECT brand FROM products WHERE name = ? LIMIT 1) LIMIT 1');
		$stmt->bindParam(1, $product);
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $name);
		$stmt->execute();
		
		if($stmt->fetch()){
			$brand = new brand($name);
			$brand->setId($id);
			return $brand;
		}
		else{
			$brand = new brand('Autre');
			return $brand;
		}
	}
	
}
?>