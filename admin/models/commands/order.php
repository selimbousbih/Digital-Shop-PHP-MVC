<?PHP
class order {
	protected $id;
	private $client_id;
	private $bill;
	private $method;
	private $status;
	private $date;
		
	public function __construct($id, $client_id, $bill, $status, $date){
		$this->id=$id;
		$this->client_id=$client_id;
		$this->bill=$bill;
		$this->status=$status;
		$this->date=$date;
	}

	
	public function getId(){
		return $this->id;
	}	
	public function getClientId(){
		return $this->client_id;
	}	
	public function getBill(){
		return $this->bill;
	}	
	public function getStatus(){
		return $this->status;
	}	
	public function getDate(){
		return $this->date;
	}


	public function setId($id){
		$this->id=$id;
	}
	
	public function setBill($bill){
		$this->bill=$bill;
	}
		
	public function setStatus($status){
		$this->status=$status;
	}
	
	public function getMethod(){
		return $this->method;
	}
	public function setMethod($method){
		$this->method=$method;
	}

	
	

}

?>