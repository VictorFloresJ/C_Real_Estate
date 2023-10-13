<?php 
require '../../includes/app.php';
is_auth();

use App\Seller;

$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
if (!$id) {
    header("Location: /admin");
}

$seller = Seller::getRecordById($id);
$seller->delete();
?>