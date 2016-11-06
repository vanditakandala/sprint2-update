<?php 

error_reporting(0);

session_start(); 

if(!isset($_SESSION['adminrights']))
{
   header('Location:login.php');
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$added_by = $_SESSION['pmId'];
if(!empty($_POST['submit'])){
	
	$categoryname = $_POST['categoryname'];
	$categoryid = $_POST['categoryid'];
	$emailid = $_POST['emailid'];
	$phone = $_POST['phone'];
	$addr = $_POST['addr'];
	$zip = $_POST['zip'];
	$city = $_POST['city'];
	$state = $_POST['state'];

	if (empty($_POST['zip']))
	{
		echo "Fill all the fields!";
		
		header("refresh: 2; url= add_supplier.php");

	}
	else {
	$sql1 = "INSERT INTO zipcode
	VALUES ('$zip', '$city', '$state');";
	$conn->query($sql1);

	$sql = "INSERT INTO supplier (name, supplier_id, email_id, phone_no, added_by, addr_line1, zip_code)
	VALUES ('$categoryname', '$categoryid', '$emailid', '$phone','$added_by', '$addr', '$zip');";
	if ($conn->query($sql) === TRUE) {
		echo "The supplier was successfully added!";}
	}
	
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Supplier Management</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<style>
body{ background-color: #EFEFEF;}
.container-width{max-width: 500px; margin: 0 auto; margin-top: 100px; background-color: #fff; border-radius: 5px; padding: 30px 70px 100px 100px; border: 1px solid #e66000; box-shadow: 0px 0px 6px 2px rgba(0,0,0, 0.2);}
.btn-default{background-color: #e66000; width: 100px; color: #fff; font-weight: 300; float: left; margin-right: 15px;  margin-top: 30px;}
.btn-default:hover{color:#e66000; background-color: #fff; border: 1px solid #e66000;}
.label-width{width: 116px;}
.heading{padding: 10px 10px 50px 0px; color: #e66000; font-weight: 600; font-size: 20px;}
.footer{
	background-color: #2C3E50;
	width: 100%;
	padding: 15px;
	margin-top: 35px;
	
	bottom: 0px;
	left: 0px;
}
.copyright{color:#fff; font-family:"Lucida Sans Unicode";}
.footer-position{    max-width: 390px;
    margin: 0 auto;
    font-size: 14px;}
.it-height{height: 800px;}
#wrapper{min-height:800px;
	position:relative;
}
</style>
<body>
<div class="container-width">
<form name="myForm" class="form-inline" role="role" method="post" action="">
<label class="label-width">New Supplier:  </label><input class="form-control" type="text" name="categoryname" id="categoryname" >
<label class="label-width">Supplier ID:  </label><input class="form-control" type="text" name="categoryid"  id="categoryid" >
<label class="label-width">Email-ID:  </label><input class="form-control" type="text" name="emailid" id="emailid" >
<label class="label-width">Phone Number:  </label><input class="form-control" type="text" name="phone" id="phone" >
<label class="label-width">Address Line1:  </label><input class="form-control" type="text" name="addr"  id="addr" > 
<label class="label-width">Zip Code:  </label><input class="form-control" type="text" name="zip"  id="zip" >
<label class="label-width">City:  </label><input class="form-control" type="text" name="city"  id="city" >
<label class="label-width">State:  </label><input class="form-control" type="text" name="state"  id="state" >

<a class="btn btn-default" href="manage_supplier.php">Back</a>
<input type="submit" class="btn btn-default" value="Add" name="submit">

</form>
</div>
</body>
</html>