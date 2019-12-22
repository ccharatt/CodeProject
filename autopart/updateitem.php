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
    $sql = "UPDATE item SET NameItem = '".$_POST['nameitem']."', Amount = '".$_POST['amount']."', Price = '" .$_POST['price']. "' WHERE item.ItemID = '".$_POST['iditem']."'" ;
    if ($conn->query($sql)) {
        if ($conn->query($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Update info successfully")';
            echo '</script>';
        } 
    } else {
        echo "Error ".mysqli_error($conn);
        echo $sql;
    }

    header("location: /autopart/edititem1.php");
?>