<?PHP
class shoppingCart {
	private $items;
	private $qts;	
	private $cart;
	private $total;
	
	public function __construct(){
		$this->items=array();
		$this->qts=array();
		if(isset($_SESSION['user_id'])){
			$uid = $_SESSION['user_id'];
			$this->items = crudShoppingCart::getMemeberItems($uid);
			foreach($this->items as $item){
				$qts[] = crudShoppingCart::getItemQt($uid, $item->getId());
			}
			$cart = array($items, $qts);
		}
	}

	public function getCart(){
		return $this->cart;
	}
	
}

	

?>