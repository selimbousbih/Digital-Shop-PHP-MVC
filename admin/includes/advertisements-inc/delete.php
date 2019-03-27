<?PHP
require_once "../../models/advertisements/crudAdv.php";

$valeur=$_GET['id'];

       crudAdv::deleteAdvertisement($valeur);

header('Location: ../../?controller=advertisement&action=show');
?>