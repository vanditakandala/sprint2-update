<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}


// confirm that the 'id' variable has been set
if (isset($_GET['category_id']) && is_numeric($_GET['category_id']))
{
// get the 'id' variable from the URL
$id = $_GET['category_id'];

$sql1 = "SELECT * FROM product WHERE Category_id = '$id'";
$res = mysqli_query($conn, $sql1);

if (mysqli_num_rows($res) > 0)
{
	echo "Delete all products for Category: $id first!" ;
	header("refresh:3; url= manage_category.php");
}
else {


$sql = "DELETE FROM category WHERE category_id = '$id'";
$result = mysqli_query($conn, $sql); 

// redirect user after delete is successful
header("Location: manage_category.php");
}
mysqli_close($conn);
}
?>