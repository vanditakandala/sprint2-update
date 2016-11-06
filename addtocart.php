<?php
error_reporting(0);
session_start();
 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if(!isset($_SESSION['userId']))
{
  	header("Location: login_page.php");

}
$username = $_SESSION['userId'];
// get the product id
$id = $_GET['item_id'];
//$name = $_GET['item_name'];
$quantity = $_GET['productQuantity'];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/*if(!empty($_POST['submit']))
{*/

else{
$sqll = "SELECT * FROM cart WHERE username='$username' and Product_id='$id'";
$result = mysqli_query($conn, $sqll); 
  if (mysqli_num_rows($result) > 0)
  {
  	
       $sql1 = "UPDATE cart SET quantity=$quantity where Product_id='$id'";
	   $conn->query($sql1);
	   header("Location: user.php");
  }
  else{
    $sql = "INSERT INTO cart
VALUES ('$username','$id', '$quantity');";
 // mysql_query($sql, $con);
if ($conn->query($sql) === TRUE) {
    	header("Location: user.php");
  //echo $fname;
  }
}

    


mysqli_close($conn);
}




?>