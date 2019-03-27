<?PHP
class order {
	protected $id;
	private $client_id;
	private $bill;
	private $method;
	private $status;
	private $date;
		
	public function __construct($client_id){
		$this->client_id=$client_id;
		$this->status = 0;
	}

	public function setId($id){
		$this->id=$id;
	}
		
	public function getId(){
		return $this->id;
	}		
	public function getMethod(){
		return $this->method;
	}
	
	public function setBill($bill){
		$this->bill=$bill;
	}	
	public function setMethod($method){
		$this->method=$method;
	}
	
	

}

?>