<?PHP
require_once "../../models/promotions/crudPromo.php";

if(!$_GET['pid'])
{
   echo "Aucune checkbox n'a été cochée";
}
else
{
    $id = $_GET['pid'];
	crudPromo::deletePromo($id);
}
header('Location: ../../?controller=promotions&action=show');
?>