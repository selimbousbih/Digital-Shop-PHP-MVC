<?PHP
class brand {
	protected $name;
	private $id;
	private $_count;
	private $checked;
	
	public function __construct($name){
		$this->name=$name;
		$this->_count = 1;
	}

	public function getName(){
		return $this->name;
	}
	
	public function setId($id){
		$this->id=$id;
	}
		
	public function getId(){
		return $this->id;
	}
	
	public function setCount($count){
		$this->_count=$count;
	}
		
	public function getCount(){
		return $this->_count;
	}
	
	public function isChecked(){
		return $this->checked;
	}
	
	public function setChecked($check){
		$this->checked=$check;
	}
	

}

?>