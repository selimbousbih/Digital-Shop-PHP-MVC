<?php 
if (isset($_GET['id'], $_GET['action'])){
	$id = $_GET['id'];
	$action = $_GET['action'];

if ($action == 'edit') { ?>

<h2 id="ajouter">Modifier Produit</h2>

<?php } else if ($action == 'delete') { ?>

<h2 id="supprimer">Supprimer Produit ?</h2>
<form class="form-inline" method="post" action="includes/payments-inc/edit.php?action=delete&pid=<?php echo $id; ?>" enctype="multipart/form-data">
	<input type="submit" class="btn btn-primary" value="Confirmer">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="button" class="btn btn-primary" value="Annuler">
</form>

<?php } }?>

