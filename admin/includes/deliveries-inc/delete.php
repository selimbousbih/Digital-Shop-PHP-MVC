<?PHP
require_once "../../models/deliveries/crudDelivery.php";

$id=$_GET['pid'];

       crudDelivery::deleteDelivery($id);

header('Location: ../../?controller=deliveries&action=show');
?>