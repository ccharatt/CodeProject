<!DOCTYPE html>
<link rel="stylesheet" href="list.css">
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
    
    $sql = "SELECT ItemID, NameItem, Amount, Price FROM item WHERE item.ItemID='".$_POST["iditem"]."' OR item.NameItem='".$_POST["nameitem"]."'";
    $results_array = array();
    $result = mysqli_query($conn, $sql);

    if(empty($result)){
        echo "hjk";
        return;
    }

    while($row = $result->fetch_assoc()){
        $results_array[] = $row;
        echo "<div class=content>
        <form action=check.php method=post>
            <h1>Stock Detail</h1>
            <label>ID Item</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            $row[ItemID]
            <br><br><br><br>
            <label>Name Item</label>
            $row[NameItem]
            <br><br><br><br>
            <label>Amount</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            $row[Amount]
            <br><br><br><br>
            <label>Price</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            $row[Price]
            <br><br><br>
            <button class=button>Back</button>
        </form>
        </div>";
    }

    if(empty($results_array)){
        echo "<div class=content>
        <form action=check.php method=post>
            <h1>Stock Detail</h1>
            <label>ID Item</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ไม่พบข้อมูล
            <br><br><br><br>
            <label>Name Item</label>
            ไม่พบข้อมูล
            <br><br><br><br>
            <label>Amount</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ไม่พบข้อมูล
            <br><br><br><br>
            <label>Price</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ไม่พบข้อมูล
            <br><br><br>
            <button class=button>Back</button>
        </form>
        </div>";
        return;
    } else {
        echo "pa kad";
    }

    mysqli_free_result($result);
    mysqli_close($conn);
    
?>
