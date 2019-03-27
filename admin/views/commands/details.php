<?php
require_once('/../../models/commands/crudOrder.php');
require_once('/../../models/commands/crudBill.php');

if (isset($_GET['cid'])):
	$id = $_GET['cid'];
	$bill = crudBill::getBill($id);
	$products = crudBill::getProducts($id);
	$products=product::calculateNewPrice($products);
?>
<style>
div.myTab table, div.myTab td, div.myTab th {    
    border: 1px solid #ddd;
    text-align: left;
}

div.myTab table {
    border-collapse: collapse;
    width: 100%;
}

div.myTab th, div.myTab td {
    padding: 15px;
}
</style>

	<h4>Détails de la facture:</h4>
	<p>Facture numéro:  <?php echo $id; ?> <br>
 	 Mr/Mme: <?php echo $bill->getFirstName() ." ". $bill->getLastName(); ?>. <br>
	 Adresse: <?php echo $bill->getAddress(); ?>. <br>
	 Numero: <?php echo $bill->getNumber(); ?>. <br>
	 
	 <br>
	
	<div class="myTab">
	<table>
	  <tr>
		<th>Nom du produit</th>
		<th>Quantité</th> 
		<th>Prix unitaire</th>
		<th>Prix total</th>
	  </tr>
	<?php 
	$T = 0;
	foreach($products as $product):
	$T += $product->getNewPrice() * $product->getCartQt();
	?>
	
  <tr>
    <td><?php echo $product->getName();?> </td>
    <td><?php echo $product->getCartQt();?> </td> 
    <td><?php echo number_format($product->getNewPrice(), 3, ',', ' ') . ' DT';?> </td> 
    <td><?php echo number_format(($product->getNewPrice() * $product->getCartQt()), 3, ',', ' ') . ' DT';?> </td>
  </tr>
	
	<?php
	endforeach;	
	?>

	</table>
	<br>
	<label>Total: <label><?php echo number_format($T, 3, ',', ' ') . ' DT';?>
	</div>
	
<?php
else:
	die("Une erreur s'est produite.");
endif;
?>