<?php  
require_once('/../header.php'); 
?>
<!-- Breadcrumb Starts -->
	<div class="breadcrumb-wrap">
		<div class="container">
		<!-- Breadcrumb Starts -->
			<ol class="breadcrumb">
				<li><a href="?controller=pages&action=home">Accueil</a></li>
				<li class="active">Panier</li>
			</ol>
		<!-- Breadcrumb Ends -->		
		</div>
	</div>
<!-- Breadcrumb Ends -->
<!-- Main Container Starts -->
	<div class="main-container container">
	<!-- Main Heading Starts -->
		<h2 class="main-heading text-center">
			Mon Panier
		</h2>
	<!-- Main Heading Ends -->
	
	<?php if (isset($_SESSION['user_id'])):?>
	<!-- Shopping Cart Table Starts -->
		<div class="table-responsive shopping-cart-table">
			<table class="table table-bordered">
				<thead>
					<tr>
						<td class="text-center">
							Image
						</td>
						<td class="text-center">
							Detailles du produit
						</td>							
						<td class="text-center">
							Quantité
						</td>
						<td class="text-center">
							Prix
						</td>
						<td class="text-center">
							Total
						</td>
						<td class="text-center">
							Action
						</td>
					</tr>
				</thead>
				<tbody>
				<?php foreach($items as $product): ?>
				<form action="includes\shoppingcart\submit.php" method="get">
				<input type="hidden" name="pid" value="<?php echo $product->getId(); ?>">
					<tr>
						<td class="text-center">
							<a href="?controller=product&action=show&pid=<?php echo $product->getId(); ?>">
								<img style="height: 160px; width: 256px;" src="images/product-images/<?php echo $product->getImage(); ?>" alt="Product Name" title="Product Name" class="img-thumbnail" />
							</a>
						</td>
						<td class="text-center">
							<a href="?controller=product&action=show&pid=<?php echo $product->getId(); ?>"><?php echo $product->getName(); ?></a>
						</td>							
						<td class="text-center">
							<div class="input-group btn-block">
								<input type="number" min="1" max="99" name="quantity" value="<?php echo $product->getCartQt();?>" size="1" class="form-control" />
							</div>								
						</td>
						<td class="text-center">
							<?php echo number_format($product->getNewPrice(), 2, ',', ' ') . ' DT' ; ?>
						</td>
						<td class="text-center">
							<?php echo number_format($product->getNewPrice()*$product->getCartQt(), 2, ',', ' ') . ' DT' ; ?>
						</td>
						<td class="text-center">
							<button type="button" onClick="update(this.form, 0);" title="Update" class="btn btn-default tool-tip">
								<i class="fa fa-refresh"></i>
							</button>
							<button type="button" onClick="update(this.form, 1);" title="Remove" class="btn btn-default tool-tip">
								<i class="fa fa-times-circle"></i>
							</button>
						</td>
					</tr>
					</form>
					<?php endforeach; ?>
					</tbody>
				<tfoot>
					<tr>
					  <td colspan="4" class="text-right">
						<strong>Total :</strong>
					  </td>
					  <td colspan="2" class="text-left">
						<?php echo number_format($total, 2, ',', ' ') . ' DT' ; ?>
					  </td>
					</tr>
					<tr>
					  <td colspan="4" class="text-center">
					  <p style="font-size: 14px">
						Appelez le numéro 97 273 809 ou visitez notre boutique à Rue Mohamed Rjiba, 7000, Bizerte.
					</p>
					  </td>
					  <td class="text-left" colspan="2">
						<a class="btn btn-primary" href="?controller=pages&action=home">Retourner à l'accueil</a>
					  </td>
					</tr>
				</tfoot>
			</table>				
		</div>
		<?php else:?>
		<p>Vous devez être connecté pour accéder à votre panier.</p>
		<?php endif?>
	<!-- Shopping Cart Table Ends -->
	</div>
	
	<script>
	function update(form, action){
		var p = document.createElement("input");
		form.appendChild(p);
		p.name = "do";
		p.type = "hidden";
		
		if(action==0)
			p.value = "update";
	   else
		   p.value = "delete";
	   
		form.submit();
		
	}
	
	</script>