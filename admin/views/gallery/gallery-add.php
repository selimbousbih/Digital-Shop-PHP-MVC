    <h2 id="ajouter">Ajouter une image</h2>
    <form class="form-inline" method="post" action="includes/gallery-inc/add.php" enctype="multipart/form-data">
        <label>Image:</label>
        <br>
        <div class="fileupload fileupload-new" data-provides="fileupload"> <span class="btn btn-primary btn-file">
                                                        <span class="fileupload-new">Ajouter Fichier</span> <span class="fileupload-exists">Fichier Choisi</span>
            <input type="file" name="filename" accept="image/gif, image/jpeg, image/png"> </span> <span class="fileupload-preview"></span> <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a> </div>
        <br>
     
        <input class="btn btn-primary" type="submit" value="Submit"></form>
		
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
