<?php 
$id = $_GET["id"];

require "../../includes/config/database.php";
$db = connectDB();

$query = "SELECT * FROM properties WHERE id = '$id'";
$property = mysqli_fetch_assoc(mysqli_query($db, $query));

$folder_images = "../../images/";
unlink($folder_images . $property["image"]);

$query = "DELETE FROM properties WHERE id = '$id'";
mysqli_query($db, $query);



header("Location: /admin?message=3");
?>