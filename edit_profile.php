<?php session_start();

 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<style>
body{ background-color: #EFEFEF;}
.container-width{max-width: 500px; margin: 0 auto; margin-top: 100px; background-color: #fff; border-radius: 5px; padding: 30px 100px 100px 100px; border: 1px solid #e66000; box-shadow: 0px 0px 6px 2px rgba(0,0,0, 0.2);}
.btn-default{background-color: #e66000; color: #fff; font-weight: 300; float: left; margin-right: 15px; margin-left: 50px; margin-top: 30px;}
.btn-default:hover{color:#e66000; background-color: #fff; border: 1px solid #e66000;}
.label-width{width: 110px;}
.label-width-image{width: 200px;}
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
<div id="wrapper">
<div class="logo">
            	<img src="http://cdn.commlabindia.com/origin/images/logo.png" alt="logo"/>
            </div>
            <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
        <?php if(isset($_SESSION['adminId']))
     echo  "<li><a href='admin.php'><strong>Home</strong></a></li>";
	  
	  if(isset($_SESSION['subadminId']))
			echo  "<li><a href='subadmin.php'><strong>Home</strong></a></li>";
			if(isset($_SESSION['paymentmgrId']))
			echo  "<li><a href='paymentmgr.php'><strong>Home</strong></a></li>";
			?>		
     
      <li><a href="http://blog.commlabindia.com/"><strong>Blogs</strong></a></li>
      <li><a href="http://www.commlabindia.com/"><strong>About</strong></a></li>
       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><strong>Administration</strong> <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <?php if(isset($_SESSION['adminId']))
     echo  "<li><a href='user_management.php'>User Management</a></li>
  		<li><a href='product_management.php'>Product Management</a></li>
		<li><a href='manage_category.php'>Manage Categories</a></li>
		<li><a href='roles.php'>Manage Roles</a></li>
  		<li><a href='payment_management.php'>Payments</a></li>";
	  if(isset($_SESSION['subadminId']))
			echo  "<li><a href='user_management.php'>User Management</a></li>
  		<li><a href='product_management.php'>Product Management</a></li>";
		if(isset($_SESSION['paymentmgrId']))
			echo  "<li><a href='payment_management.php'>Payment management</a></li>"; ?>
            <?php 
			$_SESSION['adminrights'] = "adminrights";
			$_SESSION['paymentmgrrights'] = "paymentmgrrights";
			?>
        </ul>
      </li>
    </ul>
    
  </div>
</nav>
<div class="container container-width">
<div class="heading">Edit Profile</div>

<form name="myForm" class="form-inline" role="form" action="" method="post" enctype="multipart/form-data">
<table>
<label class="label-width">First Name:</label><input type="text" name="fname" id="fname" value="<?php echo $_GET['fname']; ?>" required><br><br>
<label class="label-width">Last Name:</label><input type="text" name="lname" id="lname" value="<?php echo $_GET['lname']; ?>" required><br><br>


<!--<label class="label-width">UserName:</label><input type="text" name="email" id="email" value="<?php echo $_GET['email']; ?>" required><br><br>
<label class="label-width">New password:</label><input type="password" placeholder="*****************" name="password" id="password" value=""><br><br>
-->

<label class="label-width">Address:</label><textarea class="form-control" name="address" id="address" required><?php echo $_GET['address'] ?></textarea><span id="addErr"></span><br><br>
<label class="label-width">State:</label><input type="text" name="state" id="state" value="<?php echo $_GET['state']; ?>" required><br><br>
<label class="label-width">City:</label><input type="text" name="city" id="city" value="<?php echo $_GET['city']; ?>" required><br><br>
<label class="label-width">Zip Code:</label><input type="text" name="zip_code" id="zip_code" value="<?php echo $_GET['zip_code']; ?>" required><br><br>

<a class="btn btn-default" href="user.php">Cancel</a>
<input type="submit" class="btn btn-default" value="Update" name="submit">
</table>
</form>

</div>


<?php
error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
if(isset($_SESSION['userId']))
$username1 = $_SESSION['userId'];
//$id = $_GET['id'];
$fname=$_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
//$phone = $_POST['phone'];
$state = $_POST['state'];
$city = $_POST['city'];
$zip_code = $_POST['zip_code'];
//$password = md5($_POST['password']);
if(!empty($_POST['password'])){
$password=$_POST['password'];
}else{
$password=$_GET['password'];
}
if(!empty($_POST['submit'])) {
	$sql = "UPDATE users SET password='$password', fname='$fname', lname='$lname', addr_line1='$address', state='$state', city='$city', zip_code='$zip_code' WHERE username = '$username1'";

$result = mysqli_query($conn, $sql);
	header("Location: user.php");
	}
?>
 <div class="footer">
 <div class="footer-position">
 <img class="branding" src="http://cdn.commlabindia.com/origin/images/logo-transparent.png" style="width: 30px; height: 30px;"><span class="copyright"> Copyright © 2000 - 2016 CommLab India</span>
 </div>    
</div>
</div>
</body>
</html>