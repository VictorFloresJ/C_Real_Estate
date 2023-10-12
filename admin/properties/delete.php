<?php 
require '../../includes/app.php';
is_auth();

use App\Property;

$id = filter_var($_GET["id"], FILTER_VALIDATE_INT);
if (!$id) {
    header("Location: /admin");
}
$property = Property::getRecordById($id);
$property->delete();
?>