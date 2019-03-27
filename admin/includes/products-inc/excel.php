<?php  
 require_once('/../../models/products/crudProduct.php');
 $output = '';

		$products = crudProduct::All();
		$output .= '  
                <table class="table" bordered="1">  
				<thead>
                     <tr>  
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Prix</th>
                        <th>Stock</th>
                    </tr>  
				</thead>
				<tbody>
           '; 
   foreach($products as $product){
	$output .= '
    <tr>
        <td>
            ' .  $product->getId() . '
        </td>
        <td>
            ' .  $product->getName() . '
        </td>
        <td>
            ' .  $product->getDescription() . '
        </td>
        <td> ' . $product->getImage() . '</td>
        <td>
            ' .  $product->getPrice() . '
        </td>

        <td>
            ' .  $product->getStock() . '
        </td>
       </tr>
	</tbody>
	';
   }

		$file = 'fiche_produits.xls';   
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$file"); 
		echo $output;	
	
 ?>  