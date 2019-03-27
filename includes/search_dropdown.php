<?php
	require_once('../models/crudProduct.php');
	if (isset($_GET['keywords'])){
		$keywords=$_GET['keywords'];
		$results = crudProduct::searchByKeywords($keywords);
	}

	foreach($results as $result):
?>
		<a href="index.php?controller=product&action=show&pid=<?php echo $result->getId();?>"><?php echo $result->getName(); ?></a>

<?php endforeach; ?>