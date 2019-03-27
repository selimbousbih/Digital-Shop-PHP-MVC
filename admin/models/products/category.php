<?PHP
class category {
	protected $name;
	private $main_cat;
	private $display_name;

	public function __construct($name, $display_name, $main_cat=null){
		$this->name=$name;
		$this->display_name=$display_name;
		$this->main_cat=$main_cat;
	}

	public function getName(){
		return $this->name;
	}
	
	public function getDisplayName(){
		return $this->display_name;
	}
	
	public function getMainCat(){
		return $this->main_cat;
	}

	}

?>