<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="showitem.css">
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

    $sql = "SELECT ItemID, NameItem, Amount, Price FROM item";
    $result = $conn->query($sql);
   
    if($result->num_rows > 0){
        echo '<div class="content" method="post">';
        echo '<h1>Item Stock</h1>';
        echo '<table id="customers">';
        echo '<tr>';
        echo '<th>ID Item</th>';
        echo '<th>Name Item</th>';
        echo '<th>Amount</th>';
        echo '<th>Price</th>';
        echo '<th>Delete Item</th>';
        echo '</tr>';
        while($row = $result->fetch_assoc()){
          echo "<tr>
                <td>$row[ItemID]</td>
                <td>$row[NameItem]</td>
                <td>$row[Amount]</td>
                <td>$row[Price]</td>";
          echo  '<td>';
          ?><form action="showitem.php" method=post>
          <button type = "submit" name="delete" value=<?php ob_start(); echo $row["ItemID"];?>>Delete</button>
          </form>
          <?php
          echo '</td>';
          echo '</tr>';
        }
        echo '</table>'; 
        echo '</div>';
        
    } else{
        echo "0 results";
    }

    if(isset($_POST['delete'])){
    $test = (int)$_POST['delete'];
    $sql = "DELETE FROM item WHERE item.ItemID=$test";
    $results_array = array();
    $result = mysqli_query($conn, $sql);
    header("Refresh:0");
   
    }else 
    if(empty($result)){
      echo "ff";
      return;
    }
 
    mysqli_close($conn);
   
?>

</html>