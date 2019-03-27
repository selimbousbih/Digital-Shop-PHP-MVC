<?PHP
class product {
	protected $id;
	private $category;
	private $name;
	private $description;
	private $image;
	private $date_added;
	private $price;
	private $new_price;
	private $discount;
	private $stock;
	private $brand;
	private $cartQt;
	private $featured;
	
	public function __construct($category, $name, $description, $image, $price, $discount, $stock, $brand){
		$this->category=$category;
		$this->name=$name;
		$this->description=$description;
		$this->image=$image;
		$this->price=$price;
		$this->discount=$discount;
		$this->stock=$stock;
		$this->brand=$brand;
		$this->new_price=0;
	}
	
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
	public function getDiscount(){
		return $this->discount;
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
	
	
	public function setId($id){
		$this->id = $id;
	}
	public function setNewPrice($p){
		$this->new_price=$p;
	}
	public function getNewPrice(){
		return $this->new_price;
	}
	public function setCartQt($qt){
		$this->cartQt=$qt;
	}
	public function getCartQt(){
		return $this->cartQt;
	}
	public function setBrand($brand){
		$this->brand = $brand;
	}
	public function setFeatured($featured){
		$this->featured = $featured;
	}
	

	
	public static function FilterBrand($P, $brands){
		$products = array();
		foreach($brands as $brand){
			foreach($P as $product){
				if ($product->getBrand() == $brand){
					$products[] = $product;
				}
			}
		}
		return $products;
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