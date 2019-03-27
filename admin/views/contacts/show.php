<?php require_once('/../../models/contact/contactCrud.php'); 
if (isset($_GET['id'])):
	$id = $_GET['id'];
	$c = crudContact::getContact($id);
?>
<p>
<h4><?php echo $c->getSubject(); ?></h4>
<?php echo $c->getMessage(); ?>
</p>

<?php endif; ?>