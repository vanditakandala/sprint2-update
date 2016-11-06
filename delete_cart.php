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

// get the 'id' variable from the URL
$id = $_GET['product_id'];

$sql = "DELETE FROM cart WHERE Product_id = '$id'";
//$result = mysqli_query($conn, $sql); 
if ($conn->query($sql) === TRUE) {
    	header("Location: user.php");
  //echo $fname;
  }



mysqli_close($conn);
?>