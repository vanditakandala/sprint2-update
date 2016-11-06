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
if (isset($_GET['Product_id']) && is_numeric($_GET['Product_id']))
{
// get the 'id' variable from the URL
$id = $_GET['Product_id'];

$sql = "DELETE FROM product WHERE Product_id = '$id'";
$result = mysqli_query($conn, $sql); 

// redirect user after delete is successful
header("Location: product_management.php");
}
else
// if the 'id' variable isn't set, redirect the user
{
header("Location: product_management.php");
}
mysqli_close($conn);
?>