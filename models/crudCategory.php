<?PHP
require_once "includes/db_connect.php";
require_once "category.php";

class crudCategory{
	function __construct(){
		
	}	
	
	public static function selectCategoryArray(){
		$db=Db::getInstance();
		$stmt=$db->prepare("SELECT * FROM categories");
		$stmt->bindColumn(1, $name);
		$stmt->bindColumn(2, $main_cat);
		$stmt->bindColumn(3, $display_name);
		$stmt->execute();
		
		$categories = array();
		while($stmt->fetch()){
			$category = new category($name, $display_name, $main_cat);
			$categories[] = $category;
		}
		
		return $categories;	
	}
	
	public static function selectCategory($category){
		$db=Db::getInstance();
		$stmt=$db->prepare("SELECT * FROM categories WHERE name = ? LIMIT 1");
		$stmt->bindParam(1, $category);
		$stmt->bindColumn(1, $name);
		$stmt->bindColumn(2, $main_cat);
		$stmt->bindColumn(3, $display_name);
		$stmt->execute();
		
		$stmt->fetch();
		$category = new category($name, $display_name, $main_cat);
		
		return $category;	
	}
	
	public static function selectMainCategories(){
		$db=Db::getInstance();
		$stmt=$db->prepare("SELECT * FROM categories WHERE main is NULL ORDER BY display_order");
		$stmt->bindColumn(1, $name);
		$stmt->bindColumn(2, $main_cat);
		$stmt->bindColumn(3, $display_name);
		$stmt->execute();
		
		$categories = array();
		while($stmt->fetch()){
			$category = new category($name, $display_name, $main_cat);
			$categories[] = $category;
		}
		
		return $categories;	
	}
		
	public static function selectSubCategories($category){
		$db=Db::getInstance();
		$stmt=$db->prepare("SELECT * FROM categories WHERE main = ? ORDER BY display_order");
		$stmt->bindParam(1, $category);
		$stmt->bindColumn(1, $name);
		$stmt->bindColumn(2, $main_cat);
		$stmt->bindColumn(3, $display_name);
		$stmt->execute();
		
		$categories = array();
		while($stmt->fetch()){
			$cat = new category($name, $display_name, $main_cat);
			$categories[] = $cat;
		}
		
		return $categories;	
	}
	
	public static function selectMainCategory($category){
		$db=Db::getInstance();
		$stmt=$db->prepare("SELECT * FROM categories WHERE name = (SELECT main FROM categories WHERE name = ? LIMIT 1)");
		$stmt->bindParam(1, $category);
		$stmt->bindColumn(1, $name);
		$stmt->bindColumn(2, $main_cat);
		$stmt->bindColumn(3, $display_name);
		
		$stmt->execute();
		$stmt->fetch();
		$cat = new category($name, $display_name, $main_cat);
			
		return $cat;
	}
	
	public static function isSub($category){
		$db=Db::getInstance();
		$stmt=$db->prepare("SELECT main FROM categories WHERE name = ? LIMIT 1");
		$stmt->bindParam(1, $category);
		$stmt->execute();
	
		$stmt->bindColumn(1, $main_cat);
		
		$stmt->fetch();
		
		if ($main_cat != null){
			return true;
		}
		else{
			return false;
		}
		
	}
	
}
?>