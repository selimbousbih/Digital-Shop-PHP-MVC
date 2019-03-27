<?php
	require_once('../../models/products/crudCategory.php');
	require_once('../../models/products/crudBrand.php');
	require_once('../../models/promotions/crudPromo.php');
	
	$allowed = array();
	$allowed_categories = crudCategory::selectCategoryArray();
    foreach($allowed_categories as $cat){
		$allowed[] = $cat->getName();
	}
	$main_categories = crudCategory::selectMainCategories();
	$brands = crudBrand::selectBrands();	
	$promotions = crudPromo::All();					
?>
    <h2 id="ajouter">Nouveau produit</h2>
    <form class="form-inline" method="post" action="includes/products-inc/add.php" enctype="multipart/form-data">
        <label>Nom du produit:</label>
        <br>
        <input name="name_product" class="form-control" type="text">
        <br>
        <br>
        <label>Categorie:</label>
        <br>
        <select name="cat_product" class="form-control">
			<?php foreach($main_categories as $main_category){ ?>
			<optgroup label="-- <?php echo $main_category->getDisplayName();?> --">
			<?php
			$categories = crudCategory::selectSubCategories($main_category->getName());
			foreach($categories as $sub_category){ 															 
				$value = $sub_category->getName();
				$name = $sub_category->getDisplayName();
				echo '<option ' . ($category==$value ? "selected " : "") . 'value="' . $value .'">' . $name . ' </option>';
			} 
			}
			?>
        </select>
		<br><br>
		<label>Marque:</label>
        <br>
        <select id="brands" name="brand_product" class="form-control">
			<?php
			foreach($brands as $brand){ 															 
				$value = $brand->getName();
				echo '<option value="' . $brand->getName() . '">' . $brand->getName() . '</option>';
			} 			
			?>
        </select><br><br>
		<input type="text" name="brand" class="form-control"> &nbsp&nbsp <input type="button" id="addBrand" class="btn btn-primary" value="Ajouter"> 
        <br><br>
        <label>Description:</label>
        <br>
        <textarea name="desc_product" class="form-control"></textarea>
        <br>
        <br>
        <label>Image:</label>
        <br>
        <div class="fileupload fileupload-new" data-provides="fileupload"> <span class="btn btn-primary btn-file">
                                                        <span class="fileupload-new">Ajouter Fichier</span> <span class="fileupload-exists">Fichier Choisi</span>
            <input type="file" name="filename" accept="image/gif, image/jpeg, image/png"> </span> <span class="fileupload-preview"></span> <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a> </div>
        <br>
        <label>Quantité:</label>
        <br>
        <input name="qt_product" class="form-control" type="number" value="1">
        <br>
        <br>
        <label>Prix:</label>
        <br>
        <input name="price_product" class="form-control" type="number">
        <br>
        <br>
		<label>Promotion:</label>
        <br>
        <select name="promotion" class="form-control">
			<option value="1">Aucune</option>
			<?php
			foreach($promotions as $promo){ 
				echo '<option value="' . $promo->getId() . '">' . $promo->getId() . '</option>';
			} 			
			?>
        </select><br><br>
		<input name="featured" type="checkbox">&nbsp;&nbsp;<label>Featured</label>
		<br>
        <br>
        <input class="btn btn-primary" type="button" value="Submit" onclick="add_form(this.form, this.form.name_product, 
																	this.form.cat_product, this.form.qt_product, 
																	this.form.price_product);"> </form>
		
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
function add_form(form, name_product, cat_product, qt_product, price_product){
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
	
}
</script>
