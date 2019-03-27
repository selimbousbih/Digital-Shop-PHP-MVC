<?PHP
class product {
	protected $id;
	private $category;
	private $name;
	private $description;
	private $image;
	private $date_added;
	private $price;
	private $promo;
	private $stock;
	private $brand;
	private $featured;
	private $cartQt;
	private $new_price;
	/*******************************/
	public function __construct($category, $name, $description, $image, $price, $promo, $stock){
		$this->category=$category;
		$this->name=$name;
		$this->description=$description;
		$this->image=$image;
		$this->price=$price;
		$this->promo=$promo;
		$this->stock=$stock;
		$this->featured = false;
	}
	/**********************************/
	public function getId(){
		return $this->id;
	}
	public function getCategory(){
		return $this->category;
	}
	public function getName(){
		return $this->name;
	}
	public function getDescription(){
		return $this->description;
	}	
	public function getImage(){
		return $this->image;
	}
	public function getDateAdded(){
		return $this->date_added;
	}
	public function getPrice(){
		return $this->price;
	}
	public function getStock(){
		return $this->stock;
	}
	public function getBrand(){
		return $this->brand;
	}
	public function getFeatured(){
		return $this->featured;
	}
	public function getPromo(){
		return $this->promo;
	}
	public function setBrand($brand){
		$this->brand = $brand;
	}
	
	public function setFeatured($featured){
		$this->featured = $featured;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function setPromo($p){
		$this->promo=$p;
	}
	
	public function setCartQt($cartQt){
		$this->cartQt=$cartQt;
	}
	public function getCartQt(){
		return $this->cartQt;
	}
	
	public function setNewPrice($p){
		$this->new_price=$p;
	}
	public function getNewPrice(){
		return $this->new_price;
	}
	
	public static function calculateNewPrice($products){
		$P = array();
		foreach($products as $product){
			if (crudProduct::isPromoted($product->getId())){
				$newprice = crudProduct::newPrice($product->getId());
				$product->setNewPrice($newprice);
			}
			else
				$product->setNewPrice($product->getPrice());
			
			$P[] = $product;
		}
		return $P;
	}
}

?>