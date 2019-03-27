<?PHP
require_once "/../includes/db_connect.php";
require_once "product.php";

class crudProduct{
	
	function __construct(){	
	}	
	
	public static function selectProduct($id){
		$db=Db::getInstance();
		$req="SELECT * FROM products WHERE id=?";
		$stmt=$db->prepare($req);
		$stmt->bindParam(1, $id);
		$stmt->execute();
		
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $cat);
		$stmt->bindColumn(3, $name);
		$stmt->bindColumn(4, $description);
		$stmt->bindColumn(5, $image);
		$stmt->bindColumn(6, $date_added);
		$stmt->bindColumn(7, $price);
		$stmt->bindColumn(8, $discount);
		$stmt->bindColumn(9, $stock);
		$stmt->bindColumn(10, $brand);
		
		$stmt->fetch();
		$P = new product($cat, $name, $description, $image, $price, $discount, $stock, $brand);
		$P->setId($id);
		return $P;	
	}
	public static function selectCategory($category, $start=0, $end=1){
		$db=Db::getInstance();
  
        $stmt = $db->prepare("SELECT * FROM products WHERE category = ? ORDER BY id DESC"); 
        $stmt->bindParam(1, $category);

                         
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $cat);
		$stmt->bindColumn(3, $name);
		$stmt->bindColumn(4, $description);
		$stmt->bindColumn(5, $image);
		$stmt->bindColumn(6, $date_added);
		$stmt->bindColumn(7, $price);
		$stmt->bindColumn(8, $discount);
		$stmt->bindColumn(9, $stock);
		$stmt->bindColumn(10, $brand);
		
		$stmt->execute();
		$products = array();
		while ($stmt->fetch()){
			$P = new product($cat, $name, $description, $image, $price, $discount, $stock, $brand);
			$P->setId($id);
			if (crudProduct::isPromoted($id)){
				$P->setNewPrice(crudProduct::newPrice($id));
			}
			$products[] = $P;
		}
		
		return $products;
	}
	
	
	public static function selectCategorySub($category, $start=0, $end=1){
		$db=Db::getInstance();
		$products = array();
		$stmt_cat = $db->prepare("SELECT name FROM categories where main = ? ORDER BY display_order");
		$stmt_cat->bindParam(1, $category);
		$stmt_cat->bindColumn(1, $main);
		$stmt_cat->execute();
		
		while($stmt_cat->fetch()){
			$stmt = $db->prepare("SELECT * FROM products WHERE category = ?");
			$stmt->bindParam(1, $main);

			$stmt->bindColumn(1, $id);
			$stmt->bindColumn(2, $cat);
			$stmt->bindColumn(3, $name);
			$stmt->bindColumn(4, $description);
			$stmt->bindColumn(5, $image);
			$stmt->bindColumn(6, $date_added);
			$stmt->bindColumn(7, $price);
			$stmt->bindColumn(8, $discount);
			$stmt->bindColumn(9, $stock);
			$stmt->bindColumn(10, $brand);
			
			$stmt->execute();
			
			while ($stmt->fetch()){
				$P = new product($cat, $name, $description, $image, $price, $discount, $stock, $brand);
				$P->setId($id);
				$products[] = $P;
			}
		}
		return $products;
	}
	
	public static function updateProduct($id, $category, $name, $description, $image_name, $price, $discount, $stock){
		$db=Db::getInstance();
		$stmt=$db->prepare("Update products SET category = ?, name = ?, description = ?, image = ?, price = ?, discount = ?,
								stock = ? WHERE id=?");
		$stmt->bindParam(1, $category); 
		$stmt->bindParam(2, $name); 
		$stmt->bindParam(3, $description); 
		$stmt->bindParam(4, $image_name); 
		$stmt->bindParam(5, $price); 
		$stmt->bindParam(6, $discount); 
		$stmt->bindParam(7, $stock); 
		$stmt->bindParam(8, $id); 
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
		$stmt->bindParam(1, $id);
		$stmt->execute();		
	}
	
	public static function selectLatest($n){
		$db=Db::getInstance();
		$stmt=$db->prepare("SELECT * from products ORDER BY id desc LIMIT $n");
		                              
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $cat);
		$stmt->bindColumn(3, $name);
		$stmt->bindColumn(4, $description);
		$stmt->bindColumn(5, $image);
		$stmt->bindColumn(6, $date_added);
		$stmt->bindColumn(7, $price);
		$stmt->bindColumn(8, $discount);
		$stmt->bindColumn(9, $stock);
		$stmt->bindColumn(10, $brand);
		
		$stmt->execute();
		$latest = array();
		while ($stmt->fetch()){
			$P = new product($cat, $name, $description, $image, $price, $discount, $stock, $brand);
			$P->setId($id);
			$latest[] = $P;
		}
		
		return $latest;
	}
	
	public static function selectFeatured(){
		$db=Db::getInstance();
		$stmt=$db->prepare("SELECT * from products WHERE featured = 1 ORDER BY id desc LIMIT 3");
		                                                   
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $cat);
		$stmt->bindColumn(3, $name);
		$stmt->bindColumn(4, $description);
		$stmt->bindColumn(5, $image);
		$stmt->bindColumn(6, $date_added);
		$stmt->bindColumn(7, $price);
		$stmt->bindColumn(8, $discount);
		$stmt->bindColumn(9, $stock);
		$stmt->bindColumn(10, $brand);
		
		$stmt->execute();
		$featured = array();
		while ($stmt->fetch()){
			$P = new product($cat, $name, $description, $image, $price, $discount, $stock, $brand);
			$P->setId($id);
			$featured[] = $P;
		}
		
		return $featured;
	}
	
	public static function selectPromoted(){
		$db=Db::getInstance();
		$stmt=$db->prepare("SELECT * from products where promotion <> 'null' ORDER BY id desc");
		                                                   
		$stmt->bindColumn(1, $id);
		$stmt->bindColumn(2, $cat);
		$stmt->bindColumn(3, $name);
		$stmt->bindColumn(4, $description);
		$stmt->bindColumn(5, $image);
		$stmt->bindColumn(6, $date_added);
		$stmt->bindColumn(7, $price);
		$stmt->bindColumn(8, $discount);
		$stmt->bindColumn(9, $stock);
		$stmt->bindColumn(10, $brand);
		
		$stmt->execute();
		$featured = array();
		while ($stmt->fetch()){
			$P = new product($cat, $name, $description, $image, $price, $discount, $stock, $brand);
			$P->setId($id);
			$featured[] = $P;
		}
		
		return $featured;
	}
	
	public static function searchByKeywords($keywords){
		$db=Db::getInstance();
		$results = array();
		foreach(str_word_count($keywords, 1) as $word){
			$word = '%'.$word.'%';
			$stmt=$db->prepare("SELECT * from products WHERE name LIKE ? UNION SELECT * from products WHERE category LIKE ? ORDER BY id desc ");
			$stmt->bindParam(1, $word);
			$stmt->bindParam(2, $word);
			$stmt->bindColumn(1, $id);
			$stmt->bindColumn(2, $cat);
			$stmt->bindColumn(3, $name);
			$stmt->bindColumn(4, $description);
			$stmt->bindColumn(5, $image);
			$stmt->bindColumn(6, $date_added);
			$stmt->bindColumn(7, $price);
			$stmt->bindColumn(8, $discount);
			$stmt->bindColumn(9, $stock);		
			$stmt->bindColumn(10, $brand);	
			$stmt->execute();
			while($stmt->fetch()){
				$P = new product($cat, $name, $description, $image, $price, $discount, $stock, $brand);
				$P->setId($id);
				//if (!in_array($results, $P)){
					$results[] = $P;
				//}	 
			}
		}
		return $results;
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