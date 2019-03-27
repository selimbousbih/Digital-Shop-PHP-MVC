<?php
	require_once "/../../models/members/crudMember.php";
	require_once "/../../models/crudShoppingCart.php";
	require_once "/../../models/order/crudOrder.php";
	require_once "/../../models/order/crudBill.php";
	require_once "/../../models/order/crudBillProducts.php";
	require_once("/../functions.php");
	require_once("/../mailer.php");
	
	date_default_timezone_set("UTC"); 
	sec_session_start();

	if (isset($_SESSION['user_id'])){
		$uid = $_SESSION['user_id'];
		$first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
		$last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
		$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
		$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
		$postal = filter_input(INPUT_POST, 'postal', FILTER_SANITIZE_NUMBER_INT);
		$number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
		$method = filter_input(INPUT_POST, 'm', FILTER_SANITIZE_STRING);
		
		$items = crudShoppingCart::getMemberItems($uid);
		$itemsCount = crudShoppingCart::getItemsCount($uid);
		$total = 0;
		product::calculateNewPrice($items);
		foreach($items as $item)
			$total += $item->getNewPrice()*$item->getCartQt();
		
		$bill = new bill($first_name, $last_name, $address, $city, $postal, $number);
		$bill->setTotal($total);
		$id_bill = crudBill::insertBill($bill);
		crudBillProducts::insert($id_bill, $items);
		$order = crudOrder::insertOrder($uid, $id_bill, $method);
		crudShoppingCart::emptyCart($uid);
		
		$mail = Mailer::getInstance();
		$email = crudMember::getMemberEmail($uid);
		
		$mail->setFrom('garbysmatos@gmail.com', 'Garbys Matos');
		$mail->addAddress($email);               // Name is optional
		$mail->addReplyTo('garbysmatos@gmail.com', 'Information');
		
		$mail->isHTML(true);            
		$date = date("d-m-Y");
		$heure = date("h:ia");
		
		$mail->Subject = 'Commande Effectuee';
		$body    = 		"<p>Nous vous remercions pour votre commande sur garbysmatos.com <br>".
						"Garby's Matos.<br></p>".
						"<p><h4>Détailles de la commande:</h4>".
						"Numero commande: " . $order->getId() . "<br>" .
						"Facturé pour: " . $bill->getFirstName() . " " . $bill->getLastName() . "<br>" .
						"Date: " . $date . " - " . $heure . "<br></p>".
						"<h4>Produits:</h4><p>";
		foreach($items as $item){
			$body .= $item->getName() ."<br>";
		}
						
		$mail->Body = $body;
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) {
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
		
		header("Location: ../../index.php?controller=order&action=purshase&done=1");	
		
	}


?>