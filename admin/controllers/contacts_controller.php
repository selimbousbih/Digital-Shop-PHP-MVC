<?php
require_once('models/contact/contactCrud.php'); 
 
class ContatsController {
	public function show(){			
		$contacts=crudContact::All();
		require_once('views/contacts/table.php');
	}

}
?>