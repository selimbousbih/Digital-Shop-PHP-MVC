<?PHP
require_once("/../../config.php");
require_once (ROOT_DIR."/includes/db_connect.php");
require_once "product.php";

class crudProduct{
	function __construct(){
		
	}	
	
	public static function All(){
		$db=Db::getInstance();
		$stmt=$db->prepare("SELECT * from products ORDER BY id desc");
		                                           
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $cat);
		$stmt->bindColumn(3, $name);
		$stmt->bindColumn(4, $description);
		$stmt->bindColumn(5, $image);
		$stmt->bindColumn(6, $date_added);
		$stmt->bindColumn(7, $price);
		$stmt->bindColumn(8, $promo);
		$stmt->bindColumn(9, $stock);
		$stmt->bindColumn(10, $brand);
		
		$stmt->execute();
		$products = array();
		while ($stmt->fetch()){
			$P = new product($cat, $name, $description, $image, $price, $promo, $stock, $brand);
			$P->setId($id);
			$products[] = $P;
		}
		
		return $products;
	}
	
	
	public static function addProduct($product){
		$db=Db::getInstance();
		if ($stmt = $db->prepare("INSERT INTO products(category, name, description, image, date_added, price, promotion, stock, brand, featured) 
		VALUES (?, ?, ?, ?, NOW(), ?, ?, ?, ?, ?)")){
			
			$stmt->bindValue(1, $product->getCategory()); 
			$stmt->bindValue(2, $product->getName()); 
			$stmt->bindValue(3, $product->getDescription()); 
			$stmt->bindValue(4, $product->getImage()); 
			$stmt->bindValue(5, $product->getPrice()); 
			$stmt->bindValue(6, $product->getpromo()); 
			$stmt->bindValue(7, $product->getStock()); 
			$stmt->bindValue(8, $product->getBrand()); 
			$stmt->bindValue(9, $product->getFeatured()); 
			
			$stmt->execute();   		
		}
	}
	
	public static function selectProduct($id){
		$db=Db::getInstance();
		$req="SELECT * FROM products WHERE id=?";
		$stmt=$db->prepare($req);
		$stmt->bindValue(1, $id);
		$stmt->execute();
		
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $cat);
		$stmt->bindColumn(3, $name);
		$stmt->bindColumn(4, $description);
		$stmt->bindColumn(5, $image);
		$stmt->bindColumn(6, $date_added);
		$stmt->bindColumn(7, $price);
		$stmt->bindColumn(8, $promo);
		$stmt->bindColumn(9, $stock);
		$stmt->bindColumn(10, $brand);
		$stmt->bindColumn(11, $featured);
		
		$stmt->fetch();
		$P = new product($cat, $name, $description, $image, $price, $promo, $stock);
		$P->setId($id);
		$P->setBrand($brand);
		$P->setFeatured($featured);
		return $P;	
	}
	public static function selectCategory($category){
		$db=Db::getInstance();
  
        $stmt = $db->prepare("SELECT * FROM Products WHERE category = ? ORDER BY Id DESC"); //php_code
        $stmt->bindValue(1, $category);
        $stmt->execute();      
                                                   
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $cat);
		$stmt->bindColumn(3, $name);
		$stmt->bindColumn(4, $description);
		$stmt->bindColumn(5, $image);
		$stmt->bindColumn(6, $date_added);
		$stmt->bindColumn(7, $price);
		$stmt->bindColumn(8, $promo);
		$stmt->bindColumn(9, $stock);
		
		$products = array();
		while ($stmt->fetch()){
			$P = new product($cat, $name, $description, $image, $price, $promo, $stock);
			$P->setId($id);
			$products[] = $P;
		}
		return $products;
	}
	
	public static function updateProduct($id, $category, $name, $description, $image_name, $price, $promo, $stock, $brand, $featured){
		$db=Db::getInstance();
		$stmt=$db->prepare("Update products SET category = ?, name = ?, description = ?, image = ?, price = ?, promotion = ?,
								stock = ?, brand = ?, featured = ? WHERE id=?");
		$stmt->bindValue(1, $category); 
		$stmt->bindValue(2, $name); 
		$stmt->bindValue(3, $description); 
		$stmt->bindValue(4, $image_name); 
		$stmt->bindValue(5, $price); 
		$stmt->bindValue(6, $promo); 
		$stmt->bindValue(7, $stock); 
		$stmt->bindValue(8, $brand); 
		$stmt->bindValue(9, $featured); 
		$stmt->bindValue(10, $id); 
		if($stmt->execute()){
			return true;
		}	
		else{
			return false;
		}
	}
	
	public static function deleteProduct($id){
		$db=Db::getInstance();
		$stmt=$db->prepare("DELETE FROM products WHERE id=?");
		$stmt->bindValue(1, $id);
		$stmt->execute();		
	}
	
		public static function isPromoted($id){
		$db=Db::getInstance();
		$stmt=$db->prepare("SELECT promotion from products where id = ? and promotion <> 'null' LIMIT 1");
		
		$stmt->bindValue(1, $id);
		$stmt->execute();
		if ($stmt->rowCount() == 1)
		return true;
		else return false;
	}
	
	public static function newPrice($id){
		$db=Db::getInstance();
		
		$stmt=$db->prepare("SELECT price, percent from products as prod inner join promotions as promo on prod.promotion = promo.id where prod.id = ? LIMIT 1");
		
		$stmt->bindValue(1, $id);
		$stmt->bindColumn(1, $price);
		$stmt->bindColumn(2, $percent);
		$stmt->execute();
		$stmt->fetch();
		if ($stmt->rowCount() == 1){
			$newPrice = $price - ($price * $percent / 100);
			return $newPrice;
		}
		else
			return 0;
			
	}
	
}
?>