<!DOCTYPE html>
<link rel="stylesheet" href="check.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<!-- <div id = "body">
    <h1>Edit Information</h1>
    <label>Item Name</label>
    <input type="text" name="iditem" placeholder="123456">
    <br><br><br><br>
    <label>Price</label>
    <input type="text" name="nameitem" placeholder="aaaaaaa">
    <br><br><br><br>
    <label>Amount</label>
    <input type="text" name="nameitem" placeholder="aaaaaaa">
    <br><br><br>
    <button class="button">Submit</button>
</div> -->
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

    $sql = "SELECT ItemID, NameItem, Amount, Price FROM item WHERE item.ItemID='".$_POST["iditem"]."'";
    $results_array = array();
    $result = mysqli_query($conn, $sql);

    if(empty($result)){
        echo "hjk";
        return;
    }

    while($row = $result->fetch_assoc()){
        $results_array[] = $row;
        echo "<div class=content>
        <form action=updateitem.php method=post>
        <h1>Edit Item</h1>
        <label>Item Name</label>
        <input style=\"display:none\" type=text name=\"iditem\" value=\"".$_POST["iditem"]."\">
        <input type=text name=nameitem value=\"".$row["NameItem"]."\">
        <br>
        <label>Price</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type=text name=price value=\"".$row["Price"]."\">
        <br>
        <label>Amount</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type=text name=amount value=\"".$row["Amount"]."\">
        <br>
        <button class=button>Submit</button>
        </form>
    </div>";
    }

    if(empty($results_array)){
        echo "<div class=content>
        <form action=updateitem.php method=post>
        <h1>Edit Item</h1>
        <label>Item Name</label>
        <input type=text name=nameitem placeholder=ไม่พบข้อมูล>
        <br>
        <label>Price</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type=text name=price placeholder=ไม่พบข้อมูล>
        <br>
        <label>Amount</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type=text name=amount placeholder=ไม่พบข้อมูล>
        <br>
        <button class=button name=submit>Submit</button>
        </form>
    </div>";
        return;
    } else {
        echo "pa kad";
    }
    
    mysqli_free_result($result);
    mysqli_close($conn);
?>