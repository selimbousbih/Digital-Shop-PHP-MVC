<?PHP
class contact {
	protected $name;
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
	

}

?>