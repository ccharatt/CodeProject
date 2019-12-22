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
    <form action="addcustomer.php" method="post">
        <h1>Add Customer</h1>
        <label>First Name</label>
        <input type="text" name="fname" placeholder="Input first name" required>
        <br><br>
        <label>Last Name</label>&nbsp;
        <input type="text" name="lname" placeholder="Input last name" required>
        <br><br>
        <label>Telephone</label>&nbsp;&nbsp;
        <input type="text" name="tel" placeholder="Input tel." required>
        <br><br>
        <label>Address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="addr" placeholder="Input address">
        <br><br>
        <button class="button" name="addCustomer">Add</button>
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
    
    if(isset($_POST['addCustomer'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $tel = $_POST['tel'];
        $add = $_POST['addr'];

        $sql = "INSERT INTO customer(CustomerID, Fname, Lname, Tel, addr) 
        VALUES ('','$fname','$lname','$tel','$add')";

        if($conn->query($sql) === TRUE){
            echo '<script language="javascript">';
            echo 'alert("Add incustomer successfully")';
            echo '</script>';
        } else{
            echo "Error: " . $sql . "<br>" . $conn->error. "<br>";
        }
    }
?>