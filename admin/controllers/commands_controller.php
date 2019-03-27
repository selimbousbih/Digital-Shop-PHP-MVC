<?php
require_once('models/products/crudProduct.php');
require_once('models/members/crudMember.php');
require_once('models/commands/crudOrder.php');

  class CommandsController {
    public function show() {
		
		if (isset($_GET['order_id'], $_GET['setStatus'])){
			$id = $_GET['order_id']; 
			$status = $_GET['setStatus'];
			$orders = crudOrder::updateStatus($id, $status);
		}
			$orders = crudOrder::All();
		require_once('views/commands/commands.php');
    }
  }
?>