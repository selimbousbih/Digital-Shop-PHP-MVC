<?PHP
class photo {
	protected $id;
	private $filename;
		
	public function __construct($filename){
		$this->filename=$filename;
	}
	
	public function getId(){
		return $this->id;
	}	
	public function setId($id){
		$this->id=$id;
	}	
	public function getFilename(){
		return $this->filename;
	}	
	public function setFilename($filename){
		$this->filename=$filename;
	}	


}

?>