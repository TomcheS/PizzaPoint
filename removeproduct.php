<?php
include("db_connect.php");
session_start();
$productID=$_GET['productID'];

$query="delete from product where productID=$productID";
mysqli_query($conn,$query);

header("refresh:0;url=menuadmin.php");

?>