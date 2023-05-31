<?php
include("db_connect.php");
session_start();
$productID=$_GET['productID'];

$query="delete from orders where productID=$productID";
mysqli_query($conn,$query);

$query1="select * from orders";

if($result1=mysqli_query($conn, $query1)){
    $numrows=mysqli_num_rows($result1);
    if($numrows==0){
        unset($_SESSION['cart']);
        header("refresh:0;url=menu.php");
    }
}
if($result1=mysqli_query($conn, $query1)){
    $numrows=mysqli_num_rows($result1);
    if($numrows > 0){
        header("refresh:0;url=cart.php");
    }
}

?>