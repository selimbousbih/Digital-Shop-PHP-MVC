<?php
	require_once('../../models/products/crudProduct.php');
	require_once('../../models/promotions/crudPromo.php');
    $id = $_GET["id"];
	$action = $_GET['action'];
    $promo=crudPromo::selectPromo($id);
    $products=crudProduct::All();
?>

<?php if ($action == 'edit') { ?>

<h2 id="ajouter">Modifier Promotion</h2>
<form class="form-inline" method="POST" action="includes/promotions-inc/edit.php?pid=<?php echo $id; ?>" enctype="multipart/form-data">
                                             
                                                <input type="date" name="enddate" id="enddate" class="form-control" value="<?php echo $promo->getEndDate();?>">
                                                <br>
                                                <label>Pourcentage</label>
                                                <br>
                                                <input type="number" name="discount" id="discount" class="form-control" min="0" max="99" value="<?php echo $promo->getPercent();?>">
                                                <br>
                                               
                                                <label>Description</label>
                                                <br>
                                                <textarea rows="5" name="description" id="description" class="form-control"><?php echo $promo->getDescription();?></textarea>
                                                <br>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                                    <div class="clearfix"></div>
</form>

<?php } else if ($action == 'delete') { ?>
<h2 id="supprimer">Supprimer Promotion ?</h2>
<form class="form-inline" method="post" action="includes/promotions-inc/delete.php?pid=<?php echo $id; ?>" enctype="multipart/form-data">
	<input type="submit" class="btn btn-primary" value="Confirmer">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="button" class="btn btn-primary" value="Annuler">
</form>

<?php } ?>

<script>
		$(document).ready(function() {
            $(function() {
				$('#addBrand').click(function(e) {
				$.get("dashboard/products-add.php?action=addBrand&name=" + document.getElementsByName("brand")[0].value , function (data) {
                        $("#brands").html(data); alert('Marque ajoutée');
                    }); 
				});
			 });
          });
</script>

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



<!------------------------>
