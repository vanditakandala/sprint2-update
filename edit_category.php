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


// confirm that the 'id' variable has been set

if(!empty($_POST['submit'])) {
	if (isset($_GET['category_id']))
{
// get the 'id' variable from the URL
$id = $_GET['category_id'];

$oldname = $_GET['name'];

$catname=$_POST['catname'];


$sql = "UPDATE category SET name='$catname' WHERE category_id='$id'";
$result = mysqli_query($conn, $sql); 

$sqll = "UPDATE product SET Category_Name='$catname' WHERE Category_Name='$oldname'";
$result = mysqli_query($conn, $sqll); 
}
else
// if the 'id' variable isn't set, redirect the user
{
echo "Query failed";
}
	header("Location: manage_category.php");
	}
mysqli_close($conn);
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
.label-width{width: 100px;}
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
<script type="text/javascript">
function validateForm() {
    var fname = document.forms["myForm"]["fname"].value;
	var regex = /^[A-Za-z0-9_]{3,20}$/;
    if (!regex.test(fname)) {
		
		document.getElementById("fnameErr").innerHTML = "Name should contain only letters or numbers";
  		return false;
	}
	else{
		document.getElementById("fnameErr").innerHTML = "";
	}
	
	
}
</script>
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
<div class="heading">Edit Category</div>
<form name="myForm" class="form-inline" role="form" action="" method="post" onSubmit="return validateForm()">
<table>

<label class="label-width">Category:</label><input type="text" class="form-control" name="catname" id="catname" value="<?php echo $_GET['name']; ?>" required><span id="fnameErr"></span><br><br>
<a class="btn btn-default" href="manage_category.php">Cancel</a>

<input type="submit" class="btn btn-default" value="Submit" name="submit">
</table>
</form>

</div>
</div>
 <div class="footer">
 <div class="footer-position">
 <img class="branding" src="http://cdn.commlabindia.com/origin/images/logo-transparent.png" style="width: 30px; height: 30px;"><span class="copyright"> Copyright © 2000 - 2016 CommLab India</span>
 </div>    
</div>
</div>     
</body>
</html>