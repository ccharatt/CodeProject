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

<!DOCTYPE html>
<link rel="stylesheet" href="home.css">
<div id = "body">
    <h1>Welcome To System Of Auto Parts</h1>
    <div class="box">
    <form action="check.php">
        <button class="button">Check Stock</button>
        <br><br>
    </form>
    <form action="create.php">
        <button class="button">Create Receipt</button> 
        <br><br>
    </form>
    <form action="editinfo1.php">
        <button class="button">Edit Info</button>
        <br><br>
    </form>
    <form action="edititem1.php">
        <button class="button">Edit Item</button>
        <br><br>
    </form>
    <form action="additem.php">
        <button class="button">Add Item</button>
        <br><br>
    </form>
    <form action="addcustomer.php">
        <button class="button">Add Customer</button>
        <br><br>
    </form>
    <form action="addstore.php">
        <button class="button">Add Store</button>
        <br><br>
    </form>
    <form action="showitem.php">
        <button class="button">Item Stock</button><br><br>
    </form>
    <form action="receipt.php">
        <button class="button">Receipt</button>
    </form>
    </div>
</div>
