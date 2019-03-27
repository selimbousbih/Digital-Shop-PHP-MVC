<?php
	require_once('../../models/products/crudProduct.php');
	$products = crudProduct::All();
?>
<h2 id="ajouter">Nouvelle Promotion</h2>
<form class="form-inline" action="includes/promotions-inc/add.php" method="POST" enctype="multipart/form-data">
    <label>Pourcentage</label>
    <br>
    <input type="number" name="discount" id="discount" class="form-control" min="5" max="80">
    <br>
    
	<label>Description</label>
    <br>
    <textarea rows="5" name="description" id="description" class="form-control"></textarea>
    <br>
    <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
    <div class="clearfix"></div>
</form>


<script type="text/javascript">
/*function add_form(form, name_product, cat_product, qt_product, price_product){
	if (name_product.value == ''         || 
		cat_product.value == ''     || 
		qt_product.value == ''  || 
		price_product.value == '') {
 
        alert('Vous devez fournir tous les détails nécessaires. Veuillez essayer de nouveau');
        return false;
    }
	re = /^[A-Za-z0-9 _-]*$/; 
    if(!re.test(form.name_product.value)) { 
        alert("Le nom du produit ne doit contenir que des lettres, des chiffres et des tirrets. Essayez de nouveau"); 
        form.name_product.focus();
        return false; 
    }
	
	if(!re.test(form.brand.value)) { 
        alert("Le nom de la marque ne doit contenir que des lettres, des chiffres et des tirrets. Essayez de nouveau"); 
        form.name_product.focus();
        return false; 
    }
	
	form.submit();
	return true;
	
}*/
</script>

