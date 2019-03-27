<?PHP
class contact {
	protected $id;
	private $name;
	private $email;
	private $subject;
	private $message;
	
	public function __construct($name, $email, $subject, $message){
		$this->name=$name;
		$this->email=$email;
		$this->subject=$subject;
		$this->message=$message;
	}

	public function getName(){
		return $this->name;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getSubject(){
		return $this->subject;
	}
	public function getMessage(){
		return $this->message;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}


}

?>