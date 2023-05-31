<?php
include("db_connect.php");
session_start();
$employeeID=$_GET['employeeID'];

$query="delete from employee where employeeID=$employeeID";
mysqli_query($conn,$query);

header("refresh:0;url=employeeadmin.php");

?>