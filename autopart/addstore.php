<!DOCTYPE html>
<link rel="stylesheet" href="check.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
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
    <form action="addstore.php" method="post">
        <h1>Add Store</h1>
        <label>Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="name" placeholder="Input name" required>
        <br><br>
        <label>Location</label>
        <input type="text" name="locate" placeholder="Input location" required>
        <br><br>
        <button class="button" name="addStore">Add</button>
    </form>
</div>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "systemofmobile";
    
    //create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_set_charset($conn, "utf8");

    //check connection
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected succesfully"."<br>";
    
    if(isset($_POST['addStore'])){
        $name = $_POST['name'];
        $locate = $_POST['locate'];

        $sql = "INSERT INTO store(StoreID, Name, Location) 
        VALUES ('','$name','$locate')";

        if($conn->query($sql) === TRUE){
            echo '<script language="javascript">';
            echo 'alert("Add store successfully")';
            echo '</script>';
        } else{
            echo "Error: " . $sql . "<br>" . $conn->error. "<br>";
        }
    }
?>