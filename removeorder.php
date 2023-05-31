<?php
include("db_connect.php");
session_start();
$orderID=$_GET['orderID'];

$query="delete from orderlist where orderID=$orderID";
mysqli_query($conn,$query);

header("refresh:0;url=orders.php");

?>