<?PHP
class member {
	protected $id;
	private $username;
	private $email;
	private $first_name;
	private $last_name;
	private $number;
	private $info;
	
	public function __construct($id, $username, $email){
		$this->id=$id;
		$this->username=$username;
		$this->email=$email;
	}
	
	public function getId(){
		return $this->id;
	}
	public function getUsername(){
		return $this->username;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getInfoId(){
		return $this->info;
	}
	
	public function setInfoId($id){
		$this->info = $id;
	}	
	public function setFirstName($first_name){
		$this->first_name = $first_name;
	}	
	public function setLastName($last_name){
		$this->last_name = $last_name;
	}
	public function setNumber($number){
		$this->number = $number;
	}
		
	public function getFirstName(){
		return $this->first_name;
	}	
	public function getLastName(){
		return $this->last_name;
	}
	public function getNumber(){
		return $this->number;
	}

}

?>