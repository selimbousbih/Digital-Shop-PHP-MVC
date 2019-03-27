<?PHP
class review {
	protected $id;
	private $product_id;
	private $review;
	private $rating;

	
	public function __construct($product_id, $review, $rating){
		$this->product_id = $product_id;
		$this->review = $review;
		$this->rating = $rating;
	}
	
	public function getId(){
		return $this->product_id;
	}
	public function getReview(){
		return $this->review;
	}
	public function getRating(){
		return $this->rating;
	}

	

}

?>