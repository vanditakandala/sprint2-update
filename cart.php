<?php session_start(); 
error_reporting(0);

if(!isset($_SESSION['userId']))
{
   header('Location:login_page.php');
}
$userID = $_SESSION['userId'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/*if(isset($_GET['Delete']) || isset($_GET['Update']))
{
  if(isset($_GET['Delete']))
  {
          header("Location: delete_cart.php");

  }

  if(isset($_GET['Update']))
  {
      header("Location: addtocart.php");
  }

}*/



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cart</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<style>

.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{padding: 15px;}
.table a{
font-weight: 200;
display: block;
background-color: #e66000;
text-decoration: none;
color: #fff;
padding: 4px 6px;
border-radius: 7px;
text-align: center;
}
.table a:hover{
    color: #fff;
    background-color: #e66000;
    
}

.addtocart{
  font-weight: 200;
  display: block;
  background-color: #e66000;
  text-decoration: none;
  border: none;
  box-shadow: none;
  color: #fff;
  padding: 4px 6px;
  border-radius: 7px;
  text-align: center;
  width: 100px;
}

.addbutton{font-weight: 200;
display: inline-block;
background-color: #e66000;
text-decoration: none;
margin-right: 15px;
color: #fff;
padding: 2px 6px;
width: 150px;
margin-top: 0px;
margin-bottom: 30px;
border-radius: 7px;
text-align: center;
text-decoration: none;}
.addbutton:hover{
    color: #e66000;
    background-color: #fff;
    border: 1px solid #e66000;
    text-decoration: none;
}
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

}
.buybutton{
  display: inline-block;
margin-top: 10px;
vertical-align: top;
cursor: pointer;
padding: 0px 22px;
background: rgb(255, 255, 255) none repeat scroll 0% 0%;
border: 1px solid #e66000;;
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 23px;
letter-spacing: 0.0em;
color: #e66000;;
font-size: em;
font-weight: bold;

}
</style>
<body>
<div id="wrapper">
<div class="logo">
                <img src="" alt="logo"/>
            </div>
            <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">

              <?php
            if(isset($_SESSION['userId']))
            echo  "<li><a href='user.php'>Home</a></li>"; 
             
           
            ?>  
     
      
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
    
                <li style="color: #fff; font-weight: bold; border-right: 1px solid #fefefe;"><a href="logout.php"> Log Out </a></li>
    </ul>
  </div>
</nav>

<?php 


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





$sql = "SELECT p.Name AS product_name, c.quantity as p_quantity, c.Product_id as product_id FROM cart c INNER JOIN product p on c.Product_id = p.Product_id where username='$userID'";
 $result = mysqli_query($conn, $sql); 
                        if (mysqli_num_rows($result) > 0) {
                            echo "<div class='container'>";
                            echo "<table class='table table-hover' border='0' cellpadding='10'>";


echo "<tr><th>Cart Items</th></tr>";
echo "<tr><th>Product Name</th><th>Quantity</th></tr>";
?>
<!--<form action="addtocart.php" method="get">-->

<?php

/*
while($row = mysqli_fetch_array($result)) {
                echo "<tr class='table-row'>";
                $username = $row['product_name'];
                $quantity = $row['p_quantity'];
                echo "<td>" . $category .  "</td>";
                echo "<td> <select class='productQuantity' name='productQuantity' id= 'productQuantity' >
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
</select>    </td> ";
                echo "<td><a href='edit_category.php?category_id=" . $row['category_id'] .'&name='.$row['name']."'>Update</a></td>";
                echo "<td><a href='delete_category.php?category_id=" . $row['category_id'] ."'>Delete</a></td>";

              }
              echo"</table>";
              echo "<td><a class='addbutton' href='add_category.php'>Add</a></td>";
              
              }*/






                            while($row = mysqli_fetch_array($result)) {
                                echo "<tr class='table-row'>";
                                 ?>
                                <form action="addtocart.php" method="get">
                                <?php
                                $username = $row['product_name'];
                                $quantity = $row['p_quantity'];

                                echo "<td>" . $username .  "</td>";
                               echo "<td>" . $quantity .  "</td>";
                               ?>
                               <input type="hidden" name="item_id" value="<?php echo $row['product_id'] ?>"> 
                               <td> <select class="productQuantity" name="productQuantity" id= "productQuantity" >
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
</select>    </td>  
                <?php echo "<td><a href='delete_cart.php?product_id=" . $row['product_id'] ."'>Delete</a></td>"; ?>

  <!--<td><input class="buybutton" type="button" value="Delete" name="Delete"></td>-->
<td><input class="addtocart" type="submit" value="Update" name="Update"></td>
</form>
<?php

                                //echo "<td><a href='edit_category.php?category_id=" . $row['category_id'] .'&name='.$row['name']."'>Edit</a></td>";
                                //echo "<td><a href='delete_category.php?category_id=" . $row['category_id'] ."'>Delete</a></td>";

                            }
                            echo"</table>";
                           // echo "<td><a class='addbutton' href='add_category.php'>Add</a></td>";
                            
                            }
?>
</div>
</div>
 <div class="footer">
 <div class="footer-position">
 <img class="branding" src="http://cdn.commlabindia.com/origin/images/logo-transparent.png" style="width: 30px; height: 30px;"><span class="copyright"> Copyright © 2016</span>
 </div>    
</div>

</body>
</html>