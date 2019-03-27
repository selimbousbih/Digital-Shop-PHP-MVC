<?php
$id = $_GET['id']; 
?>
<h2 id="supprimer">Supprimer Produit ?</h2>
<form class="form-inline" method="post" action="includes/gallery-inc/delete.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
	<input type="submit" class="btn btn-primary" value="Confirmer">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="button" class="btn btn-primary" value="Annuler">
</form>
