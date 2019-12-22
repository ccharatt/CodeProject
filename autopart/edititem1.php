<!DOCTYPE html>
<link rel="stylesheet" href="check.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div class="sidebar">
<a class="active" href="home.php">Home</a>
  <a href="check.php">Check Stock</a>
  <a href="create.php">Create Receipt</a>
  <a href="editinfo1.php">Edit Information</a>
  <a href="edititem1.php">Edit Item</a>
  <a href="additem.php">Add Item</a>
  <a href="addcustomer.php">Add Customer</a>
  <a href="addstore.php">Add store</a>
  <a href="showitem.php">Item Stock</a>
  <a href="receipt.php">Receipt</a>
</div>
<div class="content">
    <form action="edititem2.php" method="post">
        <h1>Edit Item</h1>
        <label>ID Item</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="iditem" placeholder="123456">&nbsp;&nbsp;&nbsp;
        <button class="button">Submit</button>
    </form>
</div>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "systemofmobile";
    
    //create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //check connection
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected succesfully"."<br>";

?>