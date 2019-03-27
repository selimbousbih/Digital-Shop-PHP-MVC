<?PHP
class member {
	protected $id;
	private $username;
	private $email;
	private $info
	
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

}

?>