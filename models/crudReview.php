<?PHP
require_once "/../includes/db_connect.php";
require_once "review.php";

class crudReview{
	
	function __construct(){	
	}	
	
	public static function addReview($review){
		$db=Db::getInstance();
		$req="INSERT INTO products_reviews (product_id, review, rating) values (?, ?, ?)";
		$stmt=$db->prepare($req);
		$stmt->bindValue(1, $review->getId());
		$stmt->bindValue(2, $review->getReview());
		$stmt->bindValue(3, $review->getRating());
		$stmt->execute();
				
		return true;	
	}
	
	
}
?>