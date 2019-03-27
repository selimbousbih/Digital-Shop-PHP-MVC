<?php
require_once "models/members/crudMember.php";

class MembersController {
	public function show(){
		$members = crudMember::All();
		require_once('views/members/members.php');
	}

}
?>