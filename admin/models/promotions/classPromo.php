<?PHP
class Promotion {
	private $id_promotion;
	private $description;
	private $start_date;
	private $end_date;
	private $percent;
	private $id_product;

	public function __construct($idprom, $desc, $perc){
		$this->id_promotion=$idprom;
		$this->description=$desc;
		$this->percent=$perc;
	}

    public function getId(){
		return $this->id_promotion;
	}
    public function getDescription(){
		return $this->description;
	}
	public function getStartDate(){
		return $this->start_date;
	}
	public function getEndDate(){
		return $this->end_date;
	}
	public function getPercent(){
		return $this->percent;
	}
	public function getIdProduct(){
		return $this->id_product;
	}
    //setters
	public function setIdPromotion($idprom){
		$this->id_promotion=$idprom;
	}
	
    public function setDescription($desc){
		$this->description=$desc;
	}
	public function setStartDate($sdate){
		$this->start_date=$sdate;
	}
	public function setEndDate($edate){
		$this->end_date=$edate;
	}
	public function setPercent($perc){
		$this->percent=$perc;
	}
	public function setIdProduct($idprod){
		$this->id_product=$idprod;
	}
}

?>