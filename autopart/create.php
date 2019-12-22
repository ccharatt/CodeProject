<!DOCTYPE html>
<link rel="stylesheet" href="create.css">
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
    <form action="create.php" method="post">
    <h1>Create Receipt</h1>
    <label>Store ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="idStore" placeholder="input ID Store" required>
    <br>
    <label>Customer ID</label>
    <input type="text" name="idCus" placeholder="input id customer" required>
    <br>
    <label>Date</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="recDate" value="<?=date ("d-m-y")?>">
    <br>
    <label>List</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="list" placeholder="input item" required>
    <br>
    <label>Amount</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="amountItem" placeholder="1" required>
    <br>
    <button class="button" name="create">Create</button>
    </form>
</div>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "systemofmobile";
    
    //create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sc = mysqli_set_charset($conn, "utf8");
    //check connection
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected succesfully"."<br>";

    if(isset($_POST['create'])){
        $sc="";
        $StoreID = (int)$_POST['idStore'];
        $CID = (int)$_POST['idCus'];
        $date = $_POST['recDate'];
        $list = $_POST['list'];
        $amount = (int)$_POST['amountItem'];
        $new = ''; 
        $sql = "INSERT INTO receipt (Receipt_no, StoreID, CID, DateCreate, List, Amount)
        VALUES ('','$StoreID','$CID','$date','$list','$amount')";
      

if ($conn->query($sql)) {

} else {
   echo "Error ".mysqli_error($conn);
   echo $sql;
}
    }
    if($conn->query($sql)){
        echo '<script language="javascript">';
        echo 'alert("Create successfully")';
        echo '</script>';

    }
     
?>