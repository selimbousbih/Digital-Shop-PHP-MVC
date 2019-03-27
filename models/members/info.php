<?PHP
class clientInfo {
	protected $id;
	private $first_name;
	private $last_name;
	private $address;
	private $city;
	private $postal;
	private $number;
	
	public function __construct($first_name, $last_name, $address, $city, $postal, $number){
		$this->first_name=$first_name;
		$this->last_name=$last_name;
		$this->address=$address;
		$this->city=$city;
		$this->postal=$postal;
		$this->number=$number;
	}
	
	public function getId(){
		return $this->id;
	}
	public function getFirstName(){
		return $this->first_name;
	}
	public function getLastName(){
		return $this->last_name;
	}
	public function getAddress(){
		return $this->address;
	}
	public function getCity(){
		return $this->city;
	}
	public function getPostal(){
		return $this->postal;
	}
	public function getNumber(){
		return $this->number;
	}
	
	public function setId($id){
		$this->id=$id;
	}
	public function setFirstName($first_name){
		$this->first_name=$first_name;
	}
	public function setLastName($last_name){
		$this->last_name=$last_name;
	}
	public function setAddress($address){
		$this->address=$address;
	}
	public function setCity($city){
		$this->city=$city;
	}
	public function setPostal($postal){
		$this->postal=$postal;
	}
	public function setNumber($number){
		$this->number=$number;
	}

}

?>