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

    $sql = "UPDATE customer SET Fname = '".$_POST['fname']."', Lname = '".$_POST['lname']."', Tel = '" .$_POST['tel']. "', addr = '".$_POST['addr']."' WHERE customer.CustomerID = '".$_POST['idCus']."'" ;
    
    if ($conn->query($sql)) {
        echo '<script language="javascript">';
        echo 'alert("Update info successfully")';
        echo '</script>';
    } else {
        echo "Error ".mysqli_error($conn);
        echo $sql;
    } 
?>