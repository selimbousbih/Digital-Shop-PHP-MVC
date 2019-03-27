<?php
require_once('../../models/products/crudProduct.php');
require_once('../../models/products/crudCategory.php');
require_once('../../models/products/crudBrand.php');

	require_once('../../models/promotions/crudPromo.php');
$crud_b = new crudBrand();
	
	if (isset($_GET['action'])){
		$action = $_GET['action'];
		if ($action == 'addBrand'){
			if (isset($_GET['name'])){
				$add_brand = $_GET['name'];
				crudBrand::addBrand($add_brand);
				$brands = crudBrand::selectBrands();
				foreach($brands as $brand){ 															 
					$value = $brand->getName();
					echo '<option value="">' . $brand->getName() . '</option>';
				}
				exit();
			}
		}
	}
	else{
		$action = 'edit';
	}
$id = $_GET["id"]; //if nan -> die
$crud = new crudProduct();
$product = crudProduct::selectProduct($id);

	$crud_cat = new crudCategory();
/*	$allowed = array();
	$allowed_categories = $crud_cat->selectCategoryArray();
    foreach($allowed_categories as $cat){
		$allowed[] = $cat->getName();
	}*/
	$main_categories = crudCategory::selectMainCategories();
	$promotions = crudPromo::All();		
	
?>

<?php if ($action == 'edit') { ?>

<h2 id="ajouter">Modifier Produit</h2>
<form class="form-inline" method="post" action="includes/products-inc/edit.php?action=edit&pid=<?php echo $id; ?>" enctype="multipart/form-data">
    <label>ID PRODUIT:
        <?php echo $id; ?>
    </label>
    <br>
    <label>Nom du produit: </label>
    <br>
    <input name="name_product" class="form-control" type="text" value="<?php echo $product->getName(); ?>">
    <br>
    <br>
    <label>Categorie:</label>
    <br>
    <select name="cat_product" class="form-control">
        <?php foreach($main_categories as $main_category){ ?>
            <optgroup label="-- <?php echo $main_category->getDisplayName();?> --">
                <?php
						$categories = $crud_cat->selectSubCategories($main_category->getName());
						foreach($categories as $sub_category){ 															 
							$value = $sub_category->getName();
							$name = $sub_category->getDisplayName();
							echo '<option ' . ($product->getCategory()==$value ? "selected " : "") . 'value="' . $value .'">' . $name . ' </option>';
						} 
						}
						?>
    </select>
    <br>
    <br>
    <label>Marque:</label>
    <br>
    <select id="brands" name="brand_product" class="form-control">
        <?php
						$brands = $crud_b->selectBrands();
						
						foreach($brands as $brand){ 															 
							$value = $brand->getName();
							echo '<option ' . ($product->getBrand()==$value ? "selected " : "") . 'value="' . $brand->getName() . '">' . $brand->getName() . '</option>';
						} 			
						?>
    </select>
    <br>
    <br>
    <input type="text" name="brand" class="form-control"> &nbsp&nbsp
    <input type="button" id="addBrand" class="btn btn-primary" value="Ajouter">
    <br>
    <br>
    <label>Description:</label>
    <br>
    <textarea name="desc_product" class="form-control"><?php echo $product->getDescription();?></textarea>
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
    <input name="price_product" class="form-control" type="text" value="<?php echo $product->getPrice(); ?>">
    <br>
	<label>Promotion:</label>
        <br>
        <select name="promotion" class="form-control">
			<option value="1">Aucune</option>
			<?php
			foreach($promotions as $promo): 
				if ($promo->getId()!=1): ?>
				<option value="<?php echo $promo->getId(); ?>" <?php echo ($product->getPromo() ==  $promo->getId()) ? " selected" : "";?>><?php echo  $promo->getId(); ?></option>
			<?php endif; endforeach; ?>
        </select><br><br>
		<input name="featured" type="checkbox" <?php  echo $product->getFeatured()==1 ? 'checked ' : ' ';  ?> value="1">&nbsp;&nbsp;<label>Featured</label>
		<br>
        <br>
    
    <input class="btn btn-primary" type="button" value="Submit" onclick="add_form(this.form, this.form.name_product, 
																																							this.form.cat_product, this.form.qt_product, 
																																							this.form.price_product);"> </form>

<?php } else if ($action == 'delete') { ?>
<h2 id="supprimer">Supprimer Produit ?</h2>
<form class="form-inline" method="post" action="includes/products-inc/edit.php?action=delete&pid=<?php echo $id; ?>" enctype="multipart/form-data">
	<input type="submit" class="btn btn-primary" value="Confirmer">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="button" class="btn btn-primary" value="Annuler">
</form>

<?php } ?>

<script>
		$(document).ready(function() {
            $(function() {
				$('#addBrand').click(function(e) {
					if (document.getElementsByName("brand")[0].value != ''){
						$.get("includes/products-inc/add.php?action=addBrand&name=" + document.getElementsByName("brand")[0].value , function (data) {
                        $("#brands").html(data); alert('Marque ajoutée');
                    }); 
					}
				
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
